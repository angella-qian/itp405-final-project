@extends('layout')

@section('title', 'SCRAPS | Edit')

@section('main')

  <header style="padding: 8rem;">
    <h1 class="text-center"><strong><a href="/" style="text-decoration:none;font-size:1.25em;">{ s c r a p s }</a></strong></h1>
    <h5 class="text-center">quick & easy recipes for students!</h5>
  </header>

  <!-- NAV -->
  <ul class="nav nav-pills nav-fill" style="background-color: #e9ecef;border-radius:5px;">
    <li class="nav-item">
        <a class="nav-link" href="/recipes">All Recipes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/create">Add Recipe</a>
    </li>
  </ul><br/>

  <header class="text-center p-2 mb-4">
    <h3>Edit the recipe:&nbsp;&nbsp;<strong>{{$recipes->Title}}</strong></h3>
    <div><span class="text-danger">*</span> = required field</div>
  </header>

  <div class="row">
    <div class="col">
      <form action="/recipes/update" method="POST" style="width:750px;margin:auto;">
        @csrf

        <input type="hidden" id="id" name="id" value="{{$recipes->recipe_id}}">


        <div class="form-group mb-3">
          <!-- text input for title -->
          <div>
            <label for="title">Recipe Title<span class="text-danger">*</span></label>
            <input type="text" id="title" name="title" class="form-control" value="{{$recipes->Title}}">
            <small class="text-danger">{{$errors->first('title')}}</small>
          </div>&nbsp;&nbsp;&nbsp;

          <!-- select menu populated with all available categories -->
          <div>
            <label for="categories">Category<span class="text-danger">*</span></label>
            <select id="categories" name="categories" class="form-control">
              @foreach($categories as $category)
              <option value="{{$category->category_id}}" {{$category->category_id == $recipes->category_id ? "selected" : ""}} >
                {{$category->category}}
              </option>
              @endforeach
            </select>
            <small class="text-danger">{{$errors->first('categories')}}</small>
          </div>&nbsp;&nbsp;&nbsp;

          <!-- a select menu populated with all available total times -->
          <div>
            <label for="times">Total Time<span class="text-danger">*</span></label>
            <select id="times" name="times" class="form-control">
              @foreach($times as $time)
              <option value="{{$time->time_id}}" {{$time->time_id == $recipes->time_id ? "selected" : ""}} >
                {{$time->total_time}}
              </option>
              @endforeach
            </select>
            <small class="text-danger">{{$errors->first('times')}}</small>
          </div>&nbsp;&nbsp;&nbsp;
        
          <!-- text area for directions -->
          <div>
            <label for="directions">Recipe Directions<span class="text-danger">*</span></label>
            <textarea rows="6" id="directions" name="directions" class="form-control">{{$recipes->Directions}}</textarea>
            <small class="text-danger">{{$errors->first('directions')}}</small>
          </div>

        </div>

        
        <table class="mb-3">
          <tr>
            <td><strong class="p-3"><br/>Ingredient #1:</strong></td>
            <td>
              <label for="quantity1">Quantity<span class="text-danger">*</span></label>
              <input type="text" id="quantity1" name="quantity1" class="form-control" value="{{$recipes->Quantity01}}">
              <small class="text-danger">{{$errors->first('quantity1')}}</small>
            </td>
            <td>
              <label for="unit1">Unit<span class="text-danger">*</span></label>
              <input type="text" id="unit1" name="unit1" class="form-control" value="{{$recipes->Unit01}}">
              <small class="text-danger">{{$errors->first('unit1')}}</small>
            </td>
            <td>
              <label for="ingredient1">Ingredient Name<span class="text-danger">*</span></label>
              <input type="text" id="ingredient1" name="ingredient1" class="form-control" value="{{$recipes->Ingredient01}}">
              <small class="text-danger">{{$errors->first('ingredient1')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #2:</strong></td>
            <td>
              <label for="quantity2">Quantity</label>
              <input type="text" id="quantity2" name="quantity2" class="form-control" value="{{$recipes->Quantity02}}">
              <small class="text-danger">{{$errors->first('quantity2')}}</small>
            </td>
            <td>
              <label for="unit2">Unit</label>
              <input type="text" id="unit2" name="unit2" class="form-control" value="{{$recipes->Unit02}}">
              <small class="text-danger">{{$errors->first('unit2')}}</small>
            </td>
            <td>
              <label for="ingredient2">Ingredient Name</label>
              <input type="text" id="ingredient2" name="ingredient2" class="form-control" value="{{$recipes->Ingredient02}}">
              <small class="text-danger">{{$errors->first('ingredient2')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #3:</strong></td>
            <td>
              <label for="quantity3">Quantity</label>
              <input type="text" id="quantity3" name="quantity3" class="form-control" value="{{$recipes->Quantity03}}">
              <small class="text-danger">{{$errors->first('quantity3')}}</small>
            </td>
            <td>
              <label for="unit3">Unit</label>
              <input type="text" id="unit3" name="unit3" class="form-control" value="{{$recipes->Unit03}}">
              <small class="text-danger">{{$errors->first('unit3')}}</small>
            </td>
            <td>
              <label for="ingredient3">Ingredient Name</label>
              <input type="text" id="ingredient3" name="ingredient3" class="form-control" value="{{$recipes->Ingredient03}}">
              <small class="text-danger">{{$errors->first('ingredient3')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #4:</strong></td>
            <td>
              <label for="quantity4">Quantity</label>
              <input type="text" id="quantity4" name="quantity4" class="form-control" value="{{$recipes->Quantity04}}">
              <small class="text-danger">{{$errors->first('quantity4')}}</small>
            </td>
            <td>
              <label for="unit4">Unit</label>
              <input type="text" id="unit4" name="unit4" class="form-control" value="{{$recipes->Unit04}}">
              <small class="text-danger">{{$errors->first('unit4')}}</small>
            </td>
            <td>
              <label for="ingredient4">Ingredient Name</label>
              <input type="text" id="ingredient4" name="ingredient4" class="form-control" value="{{$recipes->Ingredient04}}">
              <small class="text-danger">{{$errors->first('ingredient4')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #5:</strong></td>
            <td>
              <label for="quantity5">Quantity</label>
              <input type="text" id="quantity5" name="quantity5" class="form-control" value="{{$recipes->Quantity05}}">
              <small class="text-danger">{{$errors->first('quantity5')}}</small>
            </td>
            <td>
              <label for="unit5">Unit</label>
              <input type="text" id="unit5" name="unit5" class="form-control" value="{{$recipes->Unit05}}">
              <small class="text-danger">{{$errors->first('unit5')}}</small>
            </td>
            <td>
              <label for="ingredient5">Ingredient Name</label>
              <input type="text" id="ingredient5" name="ingredient5" class="form-control" value="{{$recipes->Ingredient05}}">
              <small class="text-danger">{{$errors->first('ingredient5')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #6:</strong></td>
            <td>
              <label for="quantity6">Quantity</label>
              <input type="text" id="quantity6" name="quantity6" class="form-control" value="{{$recipes->Quantity06}}">
              <small class="text-danger">{{$errors->first('quantity6')}}</small>
            </td>
            <td>
              <label for="unit6">Unit</label>
              <input type="text" id="unit6" name="unit6" class="form-control" value="{{$recipes->Unit06}}">
              <small class="text-danger">{{$errors->first('unit6')}}</small>
            </td>
            <td>
              <label for="ingredient6">Ingredient Name</label>
              <input type="text" id="ingredient6" name="ingredient6" class="form-control" value="{{$recipes->Ingredient06}}">
              <small class="text-danger">{{$errors->first('ingredient6')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #7:</strong></td>
            <td>
              <label for="quantity7">Quantity</label>
              <input type="text" id="quantity7" name="quantity7" class="form-control" value="{{$recipes->Quantity07}}">
              <small class="text-danger">{{$errors->first('quantity7')}}</small>
            </td>
            <td>
              <label for="unit7">Unit</label>
              <input type="text" id="unit7" name="unit7" class="form-control" value="{{$recipes->Unit07}}">
              <small class="text-danger">{{$errors->first('unit7')}}</small>
            </td>
            <td>
              <label for="ingredient7">Ingredient Name</label>
              <input type="text" id="ingredient7" name="ingredient7" class="form-control" value="{{$recipes->Ingredient07}}">
              <small class="text-danger">{{$errors->first('ingredient7')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #8:</strong></td>
            <td>
              <label for="quantity8">Quantity</label>
              <input type="text" id="quantity8" name="quantity8" class="form-control" value="{{$recipes->Quantity08}}">
              <small class="text-danger">{{$errors->first('quantity8')}}</small>
            </td>
            <td>
              <label for="unit8">Unit</label>
              <input type="text" id="unit8" name="unit8" class="form-control" value="{{$recipes->Unit08}}">
              <small class="text-danger">{{$errors->first('unit8')}}</small>
            </td>
            <td>
              <label for="ingredient8">Ingredient Name</label>
              <input type="text" id="ingredient8" name="ingredient8" class="form-control" value="{{$recipes->Ingredient08}}">
              <small class="text-danger">{{$errors->first('ingredient8')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #9:</strong></td>
            <td>
              <label for="quantity9">Quantity</label>
              <input type="text" id="quantity9" name="quantity9" class="form-control" value="{{$recipes->Quantity09}}">
              <small class="text-danger">{{$errors->first('quantity9')}}</small>
            </td>
            <td>
              <label for="unit9">Unit</label>
              <input type="text" id="unit9" name="unit9" class="form-control" value="{{$recipes->Unit09}}">
              <small class="text-danger">{{$errors->first('unit9')}}</small>
            </td>
            <td>
              <label for="ingredient9">Ingredient Name</label>
              <input type="text" id="ingredient9" name="ingredient9" class="form-control" value="{{$recipes->Ingredient09}}">
              <small class="text-danger">{{$errors->first('ingredient9')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #10:</strong></td>
            <td>
              <label for="quantity10">Quantity</label>
              <input type="text" id="quantity10" name="quantity10" class="form-control" value="{{$recipes->Quantity10}}">
              <small class="text-danger">{{$errors->first('quantity10')}}</small>
            </td>
            <td>
              <label for="unit10">Unit</label>
              <input type="text" id="unit10" name="unit10" class="form-control" value="{{$recipes->Unit10}}">
              <small class="text-danger">{{$errors->first('unit10')}}</small>
            </td>
            <td>
              <label for="ingredient10">Ingredient Name</label>
              <input type="text" id="ingredient10" name="ingredient10" class="form-control" value="{{$recipes->Ingredient10}}">
              <small class="text-danger">{{$errors->first('ingredient10')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #11:</strong></td>
            <td>
              <label for="quantity11">Quantity</label>
              <input type="text" id="quantity11" name="quantity11" class="form-control" value="{{$recipes->Quantity11}}">
              <small class="text-danger">{{$errors->first('quantity11')}}</small>
            </td>
            <td>
              <label for="unit11">Unit</label>
              <input type="text" id="unit11" name="unit11" class="form-control" value="{{$recipes->Unit11}}">
              <small class="text-danger">{{$errors->first('unit11')}}</small>
            </td>
            <td>
              <label for="ingredient11">Ingredient Name</label>
              <input type="text" id="ingredient11" name="ingredient11" class="form-control" value="{{$recipes->Ingredient11}}">
              <small class="text-danger">{{$errors->first('ingredient11')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #12:</strong></td>
            <td>
              <label for="quantity12">Quantity</label>
              <input type="text" id="quantity12" name="quantity12" class="form-control" value="{{$recipes->Quantity12}}">
              <small class="text-danger">{{$errors->first('quantity12')}}</small>
            </td>
            <td>
              <label for="unit12">Unit</label>
              <input type="text" id="unit12" name="unit12" class="form-control" value="{{$recipes->Unit12}}">
              <small class="text-danger">{{$errors->first('unit12')}}</small>
            </td>
            <td>
              <label for="ingredient12">Ingredient Name</label>
              <input type="text" id="ingredient12" name="ingredient12" class="form-control" value="{{$recipes->Ingredient12}}">
              <small class="text-danger">{{$errors->first('ingredient10')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #13:</strong></td>
            <td>
              <label for="quantity13">Quantity</label>
              <input type="text" id="quantity13" name="quantity13" class="form-control" value="{{$recipes->Quantity13}}">
              <small class="text-danger">{{$errors->first('quantity13')}}</small>
            </td>
            <td>
              <label for="unit13">Unit</label>
              <input type="text" id="unit13" name="unit13" class="form-control" value="{{$recipes->Unit13}}">
              <small class="text-danger">{{$errors->first('unit13')}}</small>
            </td>
            <td>
              <label for="ingredient13">Ingredient Name</label>
              <input type="text" id="ingredient13" name="ingredient13" class="form-control" value="{{$recipes->Ingredient13}}">
              <small class="text-danger">{{$errors->first('ingredient13')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #14:</strong></td>
            <td>
              <label for="quantity14">Quantity</label>
              <input type="text" id="quantity14" name="quantity14" class="form-control" value="{{$recipes->Quantity14}}">
              <small class="text-danger">{{$errors->first('quantity14')}}</small>
            </td>
            <td>
              <label for="unit14">Unit</label>
              <input type="text" id="unit14" name="unit14" class="form-control" value="{{$recipes->Unit14}}">
              <small class="text-danger">{{$errors->first('unit14')}}</small>
            </td>
            <td>
              <label for="ingredient14">Ingredient Name</label>
              <input type="text" id="ingredient14" name="ingredient14" class="form-control" value="{{$recipes->Ingredient14}}">
              <small class="text-danger">{{$errors->first('ingredient14')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #15:</strong></td>
            <td>
              <label for="quantity15">Quantity</label>
              <input type="text" id="quantity15" name="quantity15" class="form-control" value="{{$recipes->Quantity15}}">
              <small class="text-danger">{{$errors->first('quantity15')}}</small>
            </td>
            <td>
              <label for="unit15">Unit</label>
              <input type="text" id="unit15" name="unit15" class="form-control" value="{{$recipes->Unit15}}">
              <small class="text-danger">{{$errors->first('unit15')}}</small>
            </td>
            <td>
              <label for="ingredient15">Ingredient Name</label>
              <input type="text" id="ingredient15" name="ingredient15" class="form-control" value="{{$recipes->Ingredient15}}">
              <small class="text-danger">{{$errors->first('ingredient15')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #16:</strong></td>
            <td>
              <label for="quantity16">Quantity</label>
              <input type="text" id="quantity16" name="quantity16" class="form-control" value="{{$recipes->Quantity16}}">
              <small class="text-danger">{{$errors->first('quantity16')}}</small>
            </td>
            <td>
              <label for="unit16">Unit</label>
              <input type="text" id="unit16" name="unit16" class="form-control" value="{{$recipes->Unit16}}">
              <small class="text-danger">{{$errors->first('unit16')}}</small>
            </td>
            <td>
              <label for="ingredient16">Ingredient Name</label>
              <input type="text" id="ingredient16" name="ingredient16" class="form-control" value="{{$recipes->Ingredient16}}">
              <small class="text-danger">{{$errors->first('ingredient16')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #17:</strong></td>
            <td>
              <label for="quantity17">Quantity</label>
              <input type="text" id="quantity17" name="quantity17" class="form-control" value="{{$recipes->Quantity17}}">
              <small class="text-danger">{{$errors->first('quantity17')}}</small>
            </td>
            <td>
              <label for="unit17">Unit</label>
              <input type="text" id="unit17" name="unit17" class="form-control" value="{{$recipes->Unit17}}">
              <small class="text-danger">{{$errors->first('unit17')}}</small>
            </td>
            <td>
              <label for="ingredient17">Ingredient Name</label>
              <input type="text" id="ingredient17" name="ingredient17" class="form-control" value="{{$recipes->Ingredient17}}">
              <small class="text-danger">{{$errors->first('ingredient17')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #18:</strong></td>
            <td>
              <label for="quantity18">Quantity</label>
              <input type="text" id="quantity18" name="quantity18" class="form-control" value="{{$recipes->Quantity18}}">
              <small class="text-danger">{{$errors->first('quantity18')}}</small>
            </td>
            <td>
              <label for="unit18">Unit</label>
              <input type="text" id="unit18" name="unit18" class="form-control" value="{{$recipes->Unit18}}">
              <small class="text-danger">{{$errors->first('unit18')}}</small>
            </td>
            <td>
              <label for="ingredient18">Ingredient Name</label>
              <input type="text" id="ingredient18" name="ingredient18" class="form-control" value="{{$recipes->Ingredient18}}">
              <small class="text-danger">{{$errors->first('ingredient18')}}</small>
            </td>
          </tr>

          <tr>
            <td><strong class="p-3"><br/>Ingredient #19:</strong></td>
            <td>
              <label for="quantity19">Quantity</label>
              <input type="text" id="quantity19" name="quantity19" class="form-control" value="{{$recipes->Quantity19}}">
              <small class="text-danger">{{$errors->first('quantity19')}}</small>
            </td>
            <td>
              <label for="unit19">Unit</label>
              <input type="text" id="unit19" name="unit19" class="form-control" value="{{$recipes->Unit19}}">
              <small class="text-danger">{{$errors->first('unit19')}}</small>
            </td>
            <td>
              <label for="ingredient19">Ingredient Name</label>
              <input type="text" id="ingredient19" name="ingredient19" class="form-control" value="{{$recipes->Ingredient19}}">
              <small class="text-danger">{{$errors->first('ingredient19')}}</small>
            </td>
          </tr>


        </table>






        <div class="form-group">
          <button type="submit" class="btn btn-primary">Edit Recipe</button>
        </div>

      </form>
    </div>
  </div>
@endsection