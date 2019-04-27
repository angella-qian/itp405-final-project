<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class RecipesController extends Controller
{
    public function index(Request $request) {

    	// Database driven stuff
    	$query_recipes = DB::table('recipes')
            ->join('categories', 'recipes.category_id', '=', 'categories.category_id')
            ->join('times', 'recipes.time_id', '=', 'times.time_id');

        if ($request->query('category') != NULL) {
            $query_recipes->where('recipes.category_id', '=', $request->query('category'));
        }

        if ($request->query('total-time') != NULL) {
            $query_recipes->where('recipes.time_id', '=', $request->query('total-time'));
        }

        $search = '%' . $request->query('search') . '%';

    	if ($request->query('search')) {
    		$query_recipes->where('Title', 'LIKE', $search)
            ->orwhere('Ingredient01', 'LIKE', $search)
            ->orwhere('Ingredient02', 'LIKE', $search)
            ->orwhere('Ingredient03', 'LIKE', $search)
            ->orwhere('Ingredient04', 'LIKE', $search)
            ->orwhere('Ingredient05', 'LIKE', $search)
            ->orwhere('Ingredient06', 'LIKE', $search)
            ->orwhere('Ingredient07', 'LIKE', $search)
            ->orwhere('Ingredient08', 'LIKE', $search)
            ->orwhere('Ingredient09', 'LIKE', $search)
            ->orwhere('Ingredient10', 'LIKE', $search)
            ->orwhere('Ingredient11', 'LIKE', $search)
            ->orwhere('Ingredient12', 'LIKE', $search)
            ->orwhere('Ingredient13', 'LIKE', $search)
            ->orwhere('Ingredient14', 'LIKE', $search)
            ->orwhere('Ingredient15', 'LIKE', $search)
            ->orwhere('Ingredient16', 'LIKE', $search)
            ->orwhere('Ingredient17', 'LIKE', $search)
            ->orwhere('Ingredient18', 'LIKE', $search)
            ->orwhere('Ingredient19', 'LIKE', $search);
    	}
    	$recipes = $query_recipes->get();

        $query_categories = DB::table('categories');
        $categories = $query_categories->get();

        $query_times = DB::table('times');
        $times = $query_times->get();

    	return view('recipes', [
    		'recipes' => $recipes,
            'categories' => $categories,
            'times' => $times,
    		'search' => $request->query('search')
    	]);
    }

    public function create() {
        $categories = DB::table('categories')->get();
        $times = DB::table('times')->get();

        return view('create', [
            'categories' => $categories,
            'times' => $times
        ]);
    }

    // public function edit($id = null) {
        
    //     $genres = DB::table('genres')->get();

    //     if($id) {
    //         $genresList = DB::table('genres')
    //             ->where('GenreId', '=', $id)
    //             ->first();
    //     } else {
    //         $genresList = [];
    //     }

    //     return view('edit', [
    //         'genres' => $genresList
    //     ]);
    // }

    // public function store(Request $request) {

    //     $input = $request->all();

        // Validate input based on these rules:
        // - The genre name is required
        // - The genre name is at least 3 characters long
        // - The genre name doesn’t already exist in the genres 
        //   table. (See the unique rule)
    //     $validation = Validator::make($input, [
    //         'genre' => 'required|min:3|unique:genres,Name'
    //     ]);

    //     // If validation fails,redirect back to form with previous input and errors
    //     if ($validation->fails()) {
    //         return redirect()
    //             ->back()
    //             ->withInput()
    //             ->withErrors($validation);
    //     }

    //     // Otherwise, update the genre name in the database
    //     DB::table('genres')
    //         ->where('GenreId', $request->genreID)
    //         ->update(['Name' => $request->genre]);

    //     // Redirect back to /genres
    //     return redirect('/genres');
    // }
}
