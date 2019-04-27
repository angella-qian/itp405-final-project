<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class DetailsController extends Controller
{
    public function index(Request $request) {

    	// Database driven stuff
    	$query = DB::table('recipes')
            ->join('categories', 'recipes.category_id', '=', 'categories.category_id')
            ->join('times', 'recipes.time_id', '=', 'times.time_id');

        if ($request->query('id')) {
            $query->where('recipe_id', '=', $request->query('id'));
        }

        $recipe = $query->first();

    	return view('details', [
    		'recipe' => $recipe
    	]);
    }
}
