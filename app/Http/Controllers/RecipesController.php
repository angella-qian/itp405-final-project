<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Auth;

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

    public function edit($id = null) {
        
        $recipes = DB::table('recipes')->get();
        $categories = DB::table('categories')->get();
        $times = DB::table('times')->get();

        if($id != NULL) {
            $recipesList = DB::table('recipes')
                ->where('recipe_id', '=', $id)
                ->first();
        } else {
            $recipesList = [];
        }

        return view('edit', [
            'recipes' => $recipesList,
            'categories' => $categories,
            'times' => $times
        ]);
    }

    public function store(Request $request) {

        $input = $request->all();

        // Validate input based on these rules:
        // - Title is required, unique
        // - Category is required
        // - Total Time is required
        // - Directions is required
        // - Quantity01 is required, decimal
        // - All quantities must be decimal
        // - Unit01 is required
        // - Ingredient01 is required

        $validation = Validator::make($input, [
            'title' => 'required|unique:recipes,Title',
            'categories' => 'required',
            'times' => 'required',
            'directions' => 'required',
            'quantity1' => 'required|between:0,99.99',
            'unit1' => 'required',
            'ingredient1' => 'required',
            'quantity2' => 'nullable|between:0,99.99',
            'quantity3' => 'nullable|between:0,99.99',
            'quantity4' => 'nullable|between:0,99.99',
            'quantity5' => 'nullable|between:0,99.99',
            'quantity6' => 'nullable|between:0,99.99',
            'quantity7' => 'nullable|between:0,99.99',
            'quantity8' => 'nullable|between:0,99.99',
            'quantity9' => 'nullable|between:0,99.99',
            'quantity10' => 'nullable|between:0,99.99',
            'quantity11' => 'nullable|between:0,99.99',
            'quantity12' => 'nullable|between:0,99.99',
            'quantity13' => 'nullable|between:0,99.99',
            'quantity14' => 'nullable|between:0,99.99',
            'quantity15' => 'nullable|between:0,99.99',
            'quantity16' => 'nullable|between:0,99.99',
            'quantity17' => 'nullable|between:0,99.99',
            'quantity18' => 'nullable|between:0,99.99',
            'quantity19' => 'nullable|between:0,99.99'
        ]);

        // If validation fails,redirect back to form with previous input and errors
        if ($validation->fails('/create')) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        // Otherwise, insert the recipe in the database
        // Insert when 19 ingredients provided
        if ($request->unit19) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
                'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8,
                'Quantity09' => $request->quantity9,'Unit09' => $request->unit9,'Ingredient09' => $request->ingredient9,
                'Quantity10' => $request->quantity10,'Unit10' => $request->unit10,'Ingredient10' => $request->ingredient10,
                'Quantity11' => $request->quantity11,'Unit11' => $request->unit11,'Ingredient11' => $request->ingredient11,
                'Quantity12' => $request->quantity12,'Unit12' => $request->unit12,'Ingredient12' => $request->ingredient12,
                'Quantity13' => $request->quantity13,'Unit13' => $request->unit13,'Ingredient13' => $request->ingredient13,
                'Quantity14' => $request->quantity14,'Unit14' => $request->unit14,'Ingredient14' => $request->ingredient14,
                'Quantity15' => $request->quantity15,'Unit15' => $request->unit15,'Ingredient15' => $request->ingredient15,
                'Quantity16' => $request->quantity16,'Unit16' => $request->unit16,'Ingredient16' => $request->ingredient16,
                'Quantity17' => $request->quantity17,'Unit17' => $request->unit17,'Ingredient17' => $request->ingredient17,
                'Quantity18' => $request->quantity18,'Unit18' => $request->unit18,'Ingredient18' => $request->ingredient18,
                'Quantity19' => $request->quantity19,'Unit19' => $request->unit19,'Ingredient19' => $request->ingredient19
            ]);
        }

        // Insert when 18 ingredients provided
        else if ($request->unit18) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
                'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8,
                'Quantity09' => $request->quantity9,'Unit09' => $request->unit9,'Ingredient09' => $request->ingredient9,
                'Quantity10' => $request->quantity10,'Unit10' => $request->unit10,'Ingredient10' => $request->ingredient10,
                'Quantity11' => $request->quantity11,'Unit11' => $request->unit11,'Ingredient11' => $request->ingredient11,
                'Quantity12' => $request->quantity12,'Unit12' => $request->unit12,'Ingredient12' => $request->ingredient12,
                'Quantity13' => $request->quantity13,'Unit13' => $request->unit13,'Ingredient13' => $request->ingredient13,
                'Quantity14' => $request->quantity14,'Unit14' => $request->unit14,'Ingredient14' => $request->ingredient14,
                'Quantity15' => $request->quantity15,'Unit15' => $request->unit15,'Ingredient15' => $request->ingredient15,
                'Quantity16' => $request->quantity16,'Unit16' => $request->unit16,'Ingredient16' => $request->ingredient16,
                'Quantity17' => $request->quantity17,'Unit17' => $request->unit17,'Ingredient17' => $request->ingredient17,
                'Quantity18' => $request->quantity18,'Unit18' => $request->unit18,'Ingredient18' => $request->ingredient18
            ]);
        }

        // Insert when 17 ingredients provided
        else if ($request->unit17) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
                'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8,
                'Quantity09' => $request->quantity9,'Unit09' => $request->unit9,'Ingredient09' => $request->ingredient9,
                'Quantity10' => $request->quantity10,'Unit10' => $request->unit10,'Ingredient10' => $request->ingredient10,
                'Quantity11' => $request->quantity11,'Unit11' => $request->unit11,'Ingredient11' => $request->ingredient11,
                'Quantity12' => $request->quantity12,'Unit12' => $request->unit12,'Ingredient12' => $request->ingredient12,
                'Quantity13' => $request->quantity13,'Unit13' => $request->unit13,'Ingredient13' => $request->ingredient13,
                'Quantity14' => $request->quantity14,'Unit14' => $request->unit14,'Ingredient14' => $request->ingredient14,
                'Quantity15' => $request->quantity15,'Unit15' => $request->unit15,'Ingredient15' => $request->ingredient15,
                'Quantity16' => $request->quantity16,'Unit16' => $request->unit16,'Ingredient16' => $request->ingredient16,
                'Quantity17' => $request->quantity17,'Unit17' => $request->unit17,'Ingredient17' => $request->ingredient17
            ]);
        }

        // Insert when 16 ingredients provided
        else if ($request->unit16) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
                'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8,
                'Quantity09' => $request->quantity9,'Unit09' => $request->unit9,'Ingredient09' => $request->ingredient9,
                'Quantity10' => $request->quantity10,'Unit10' => $request->unit10,'Ingredient10' => $request->ingredient10,
                'Quantity11' => $request->quantity11,'Unit11' => $request->unit11,'Ingredient11' => $request->ingredient11,
                'Quantity12' => $request->quantity12,'Unit12' => $request->unit12,'Ingredient12' => $request->ingredient12,
                'Quantity13' => $request->quantity13,'Unit13' => $request->unit13,'Ingredient13' => $request->ingredient13,
                'Quantity14' => $request->quantity14,'Unit14' => $request->unit14,'Ingredient14' => $request->ingredient14,
                'Quantity15' => $request->quantity15,'Unit15' => $request->unit15,'Ingredient15' => $request->ingredient15,
                'Quantity16' => $request->quantity16,'Unit16' => $request->unit16,'Ingredient16' => $request->ingredient16
            ]);
        }

        // Insert when 15 ingredients provided
        else if ($request->unit15) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
                'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8,
                'Quantity09' => $request->quantity9,'Unit09' => $request->unit9,'Ingredient09' => $request->ingredient9,
                'Quantity10' => $request->quantity10,'Unit10' => $request->unit10,'Ingredient10' => $request->ingredient10,
                'Quantity11' => $request->quantity11,'Unit11' => $request->unit11,'Ingredient11' => $request->ingredient11,
                'Quantity12' => $request->quantity12,'Unit12' => $request->unit12,'Ingredient12' => $request->ingredient12,
                'Quantity13' => $request->quantity13,'Unit13' => $request->unit13,'Ingredient13' => $request->ingredient13,
                'Quantity14' => $request->quantity14,'Unit14' => $request->unit14,'Ingredient14' => $request->ingredient14,
                'Quantity15' => $request->quantity15,'Unit15' => $request->unit15,'Ingredient15' => $request->ingredient15
            ]);
        }

        // Insert when 14 ingredients provided
        else if ($request->unit14) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
                'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8,
                'Quantity09' => $request->quantity9,'Unit09' => $request->unit9,'Ingredient09' => $request->ingredient9,
                'Quantity10' => $request->quantity10,'Unit10' => $request->unit10,'Ingredient10' => $request->ingredient10,
                'Quantity11' => $request->quantity11,'Unit11' => $request->unit11,'Ingredient11' => $request->ingredient11,
                'Quantity12' => $request->quantity12,'Unit12' => $request->unit12,'Ingredient12' => $request->ingredient12,
                'Quantity13' => $request->quantity13,'Unit13' => $request->unit13,'Ingredient13' => $request->ingredient13,
                'Quantity14' => $request->quantity14,'Unit14' => $request->unit14,'Ingredient14' => $request->ingredient14
            ]);
        }

        // Insert when 13 ingredients provided
        else if ($request->unit13) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
                'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8,
                'Quantity09' => $request->quantity9,'Unit09' => $request->unit9,'Ingredient09' => $request->ingredient9,
                'Quantity10' => $request->quantity10,'Unit10' => $request->unit10,'Ingredient10' => $request->ingredient10,
                'Quantity11' => $request->quantity11,'Unit11' => $request->unit11,'Ingredient11' => $request->ingredient11,
                'Quantity12' => $request->quantity12,'Unit12' => $request->unit12,'Ingredient12' => $request->ingredient12,
                'Quantity13' => $request->quantity13,'Unit13' => $request->unit13,'Ingredient13' => $request->ingredient13
            ]);
        }

        // Insert when 12 ingredients provided
        else if ($request->unit12) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
                'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8,
                'Quantity09' => $request->quantity9,'Unit09' => $request->unit9,'Ingredient09' => $request->ingredient9,
                'Quantity10' => $request->quantity10,'Unit10' => $request->unit10,'Ingredient10' => $request->ingredient10,
                'Quantity11' => $request->quantity11,'Unit11' => $request->unit11,'Ingredient11' => $request->ingredient11,
                'Quantity12' => $request->quantity12,'Unit12' => $request->unit12,'Ingredient12' => $request->ingredient12
            ]);
        }

        // Insert when 11 ingredients provided
        else if ($request->unit11) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
                'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8,
                'Quantity09' => $request->quantity9,'Unit09' => $request->unit9,'Ingredient09' => $request->ingredient9,
                'Quantity10' => $request->quantity10,'Unit10' => $request->unit10,'Ingredient10' => $request->ingredient10,
                'Quantity11' => $request->quantity11,'Unit11' => $request->unit11,'Ingredient11' => $request->ingredient11
            ]);
        }

        // Insert when 10 ingredients provided
        else if ($request->unit10) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
                'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8,
                'Quantity09' => $request->quantity9,'Unit09' => $request->unit9,'Ingredient09' => $request->ingredient9,
                'Quantity10' => $request->quantity10,'Unit10' => $request->unit10,'Ingredient10' => $request->ingredient10
            ]);
        }

        // Insert when 9 ingredients provided
        else if ($request->unit9) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
                'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8,
                'Quantity09' => $request->quantity9,'Unit09' => $request->unit9,'Ingredient09' => $request->ingredient9
            ]);
        }

        // Insert when 8 ingredients provided
        else if ($request->unit8) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
                'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8
            ]);
        }

        // Insert when 7 ingredients provided
        else if ($request->unit7) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
                'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7
            ]);
        }

        // Insert when 6 ingredients provided
        else if ($request->unit6) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
                'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6
            ]);
        }

        // Insert when 5 ingredients provided
        else if ($request->unit5) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
                'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5
            ]);
        }

        // Insert when 4 ingredients provided
        else if ($request->unit4) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
                'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4
            ]);
        }

        // Insert when 3 ingredients provided
        else if ($request->unit3) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
                'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3
            ]);
        }

        // Insert when 2 ingredients provided
        else if ($request->unit2) {
            DB::table('recipes')->insert([
                'Title' => $request->title,
                'category_id' => $request->categories,
                'time_id' => $request->times,
                'Directions' => $request->directions,
                'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
                'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2
            ]);
        }

        // Insert when 1 ingredient provided
        else {
        DB::table('recipes')->insert([
            'Title' => $request->title,
            'category_id' => $request->categories,
            'time_id' => $request->times,
            'Directions' => $request->directions,
            'Quantity01' => $request->quantity1,
            'Unit01' => $request->unit1,
            'Ingredient01' => $request->ingredient1
        ]);

        }
        

        // Redirect back to /recipes
        return redirect('/recipes');
    }


    public function update(Request $request) {

        $input = $request->all();
        $id = $request->id;

        // Validate input based on these rules:
        // - Title is required
        // - Category is required
        // - Total Time is required
        // - Directions is required
        // - Quantity01 is required, decimal
        // - All quantities must be decimal
        // - Unit01 is required
        // - Ingredient01 is required

        $validation = Validator::make($input, [
            'title' => 'required',
            'categories' => 'required',
            'times' => 'required',
            'directions' => 'required',
            'quantity1' => 'required|between:0,99.99',
            'unit1' => 'required',
            'ingredient1' => 'required',
            'quantity2' => 'nullable|between:0,99.99',
            'quantity3' => 'nullable|between:0,99.99',
            'quantity4' => 'nullable|between:0,99.99',
            'quantity5' => 'nullable|between:0,99.99',
            'quantity6' => 'nullable|between:0,99.99',
            'quantity7' => 'nullable|between:0,99.99',
            'quantity8' => 'nullable|between:0,99.99',
            'quantity9' => 'nullable|between:0,99.99',
            'quantity10' => 'nullable|between:0,99.99',
            'quantity11' => 'nullable|between:0,99.99',
            'quantity12' => 'nullable|between:0,99.99',
            'quantity13' => 'nullable|between:0,99.99',
            'quantity14' => 'nullable|between:0,99.99',
            'quantity15' => 'nullable|between:0,99.99',
            'quantity16' => 'nullable|between:0,99.99',
            'quantity17' => 'nullable|between:0,99.99',
            'quantity18' => 'nullable|between:0,99.99',
            'quantity19' => 'nullable|between:0,99.99'
        ]);

        // If validation fails,redirect back to form with previous input and errors
        if ($validation->fails('/recipes/{{}}/edit/')) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        // Otherwise, insert the recipe in the database
        DB::table('recipes')
        ->where('recipe_id', $id)
        ->update([
            'Title' => $request->title,
            'category_id' => $request->categories,
            'time_id' => $request->times,
            'Directions' => $request->directions,
            'Quantity01' => $request->quantity1,'Unit01' => $request->unit1,'Ingredient01' => $request->ingredient1,
            'Quantity02' => $request->quantity2,'Unit02' => $request->unit2,'Ingredient02' => $request->ingredient2,
            'Quantity03' => $request->quantity3,'Unit03' => $request->unit3,'Ingredient03' => $request->ingredient3,
            'Quantity04' => $request->quantity4,'Unit04' => $request->unit4,'Ingredient04' => $request->ingredient4,
            'Quantity05' => $request->quantity5,'Unit05' => $request->unit5,'Ingredient05' => $request->ingredient5,
            'Quantity06' => $request->quantity6,'Unit06' => $request->unit6,'Ingredient06' => $request->ingredient6,
            'Quantity07' => $request->quantity7,'Unit07' => $request->unit7,'Ingredient07' => $request->ingredient7,
            'Quantity08' => $request->quantity8,'Unit08' => $request->unit8,'Ingredient08' => $request->ingredient8,
            'Quantity09' => $request->quantity9,'Unit09' => $request->unit9,'Ingredient09' => $request->ingredient9,
            'Quantity10' => $request->quantity10,'Unit10' => $request->unit10,'Ingredient10' => $request->ingredient10,
            'Quantity11' => $request->quantity11,'Unit11' => $request->unit11,'Ingredient11' => $request->ingredient11,
            'Quantity12' => $request->quantity12,'Unit12' => $request->unit12,'Ingredient12' => $request->ingredient12,
            'Quantity13' => $request->quantity13,'Unit13' => $request->unit13,'Ingredient13' => $request->ingredient13,
            'Quantity14' => $request->quantity14,'Unit14' => $request->unit14,'Ingredient14' => $request->ingredient14,
            'Quantity15' => $request->quantity15,'Unit15' => $request->unit15,'Ingredient15' => $request->ingredient15,
            'Quantity16' => $request->quantity16,'Unit16' => $request->unit16,'Ingredient16' => $request->ingredient16,
            'Quantity17' => $request->quantity17,'Unit17' => $request->unit17,'Ingredient17' => $request->ingredient17,
            'Quantity18' => $request->quantity18,'Unit18' => $request->unit18,'Ingredient18' => $request->ingredient18,
            'Quantity19' => $request->quantity19,'Unit19' => $request->unit19,'Ingredient19' => $request->ingredient19
        ]);

        // Redirect to recipes
        return redirect('/details?id=' . $id);
    }

    public function destroy($id = null) {
        
        if($id != NULL) {
            $recipe = DB::table('recipes')
                ->where('recipe_id', $id)
                ->delete();
        }
        return redirect('/recipes');
    }
}
