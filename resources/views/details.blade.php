@extends('layout')

<!-- Don't need closing tag with 2nd argument -->
<title>SCRAPS | {{$recipe->Title}} Recipe</title>

@section('main')
  <br/><br/><br/>
  <h1 class="text-center"><strong><a href="/recipes" style="text-decoration:none;font-size:1.25em;">{ s c r a p s }</a></strong></h1>
  <h5 class="text-center">quick & easy recipes for students!</h5>
  <br/><br/><br/><br/>

  <!-- NAV -->
  <ul class="nav nav-pills nav-fill" style="background-color: #e9ecef;border-radius:5px;">
    <li class="nav-item">
        <a class="nav-link" href="/recipes">All Recipes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/create">Add Recipe</a>
    </li>
    @if (Auth::check())
    <li class="nav-item">
        <a class="nav-link" href="/profile">Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/logout">Logout</a>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link" href="/signup">Create Account</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
    </li>
    @endif
  </ul><br/>

  <h3 class="text-center bg-dark text-white p-2" style="margin:1rem 0;border-radius:5px;">{{$recipe->Title}}</h3>

  <table class="table text-center">
    <tr class="bg-light">
      <th>Total Time</th>
      <th>Category</th>
    </tr>
    <tr>
      <td>{{$recipe->total_time}}</td>
      <td>{{$recipe->category}}</td>
    </tr>
    <tr class="bg-light">
      <th>Ingredients</th>
      <th>Directions</th>
    </tr>
    <tr>
      <td>
        <ul style="list-style-type: none;width:300px;margin:auto;">

          <li class="text-left"><input type="checkbox" value="" id="item1">&nbsp;&nbsp;<label for="item1">
            {{$recipe->Quantity01}}
            {{$recipe->Unit01}}
            {{$recipe->Ingredient01}}
          </label></li>
          @if($recipe->Quantity02)
           <li class="text-left"><input type="checkbox" value="" id="item2">&nbsp;&nbsp;<label for="item2">
            {{$recipe->Quantity02}}
            {{$recipe->Unit02}}
            {{$recipe->Ingredient02}}
          </label></li>
          @endif
          @if($recipe->Quantity03)
           <li class="text-left"><input type="checkbox" value="" id="item3">&nbsp;&nbsp;<label for="item3">
            {{$recipe->Quantity03}}
            {{$recipe->Unit03}}
            {{$recipe->Ingredient03}}
          </label></li>
          @endif
          @if($recipe->Quantity04)
           <li class="text-left"><input type="checkbox" value="" id="item4">&nbsp;&nbsp;<label for="item4">
            {{$recipe->Quantity04}}
            {{$recipe->Unit04}}
            {{$recipe->Ingredient04}}
          </label></li>
          @endif
          @if($recipe->Quantity05)
           <li class="text-left"><input type="checkbox" value="" id="item5">&nbsp;&nbsp;<label for="item5">
            {{$recipe->Quantity05}}
            {{$recipe->Unit05}}
            {{$recipe->Ingredient05}}
          </label></li>
          @endif
          @if($recipe->Quantity06)
           <li class="text-left"><input type="checkbox" value="" id="item6">&nbsp;&nbsp;<label for="item6">
            {{$recipe->Quantity06}}
            {{$recipe->Unit06}}
            {{$recipe->Ingredient06}}
          </label></li>
          @endif
          @if($recipe->Quantity07)
           <li class="text-left"><input type="checkbox" value="" id="item7">&nbsp;&nbsp;<label for="item7">
            {{$recipe->Quantity07}}
            {{$recipe->Unit07}}
            {{$recipe->Ingredient07}}
          </label></li>
          @endif
          @if($recipe->Quantity08)
           <li class="text-left"><input type="checkbox" value="" id="item8">&nbsp;&nbsp;<label for="item8">
            {{$recipe->Quantity08}}
            {{$recipe->Unit08}}
            {{$recipe->Ingredient08}}
          </label></li>
          @endif
          @if($recipe->Quantity09)
           <li class="text-left"><input type="checkbox" value="" id="item9">&nbsp;&nbsp;<label for="item9">
            {{$recipe->Quantity09}}
            {{$recipe->Unit09}}
            {{$recipe->Ingredient09}}
          </label></li>
          @endif
          @if($recipe->Quantity10)
           <li class="text-left"><input type="checkbox" value="" id="item10">&nbsp;&nbsp;<label for="item10">
            {{$recipe->Quantity10}}
            {{$recipe->Unit10}}
            {{$recipe->Ingredient10}}
          </label></li>
          @endif
          @if($recipe->Quantity11)
          <li class="text-left"><input type="checkbox" value="" id="item11">&nbsp;&nbsp;<label for="item11">
            {{$recipe->Quantity11}}
            {{$recipe->Unit11}}
            {{$recipe->Ingredient11}}
          </label></li>
          @endif
          @if($recipe->Quantity12)
          <li class="text-left"><input type="checkbox" value="" id="item12">&nbsp;&nbsp;<label for="item12">
            {{$recipe->Quantity12}}
            {{$recipe->Unit12}}
            {{$recipe->Ingredient12}}
          </label></li>
          @endif
          @if($recipe->Quantity13)
          <li class="text-left"><input type="checkbox" value="" id="item13">&nbsp;&nbsp;<label for="item13">
            {{$recipe->Quantity13}}
            {{$recipe->Unit13}}
            {{$recipe->Ingredient13}}
          </label></li>
          @endif
          @if($recipe->Quantity14)
          <li class="text-left"><input type="checkbox" value="" id="item14">&nbsp;&nbsp;<label for="item14">
            {{$recipe->Quantity14}}
            {{$recipe->Unit14}}
            {{$recipe->Ingredient14}}
          </label></li>
          @endif
          @if($recipe->Quantity15)
          <li class="text-left"><input type="checkbox" value="" id="item15">&nbsp;&nbsp;<label for="item15">
            {{$recipe->Quantity15}}
            {{$recipe->Unit15}}
            {{$recipe->Ingredient15}}
          </label></li>
          @endif
          @if($recipe->Quantity16)
          <li class="text-left"><input type="checkbox" value="" id="item16">&nbsp;&nbsp;<label for="item16">
            {{$recipe->Quantity16}}
            {{$recipe->Unit16}}
            {{$recipe->Ingredient16}}
          </label></li>
          @endif
          @if($recipe->Quantity17)
          <li class="text-left"><input type="checkbox" value="" id="item17">&nbsp;&nbsp;<label for="item17">
            {{$recipe->Quantity17}}
            {{$recipe->Unit17}}
            {{$recipe->Ingredient17}}
          </label></li>
          @endif
          @if($recipe->Quantity18)
          <li class="text-left"><input type="checkbox" value="" id="item18">&nbsp;&nbsp;<label for="item18">
            {{$recipe->Quantity18}}
            {{$recipe->Unit18}}
            {{$recipe->Ingredient18}}
          </label></li>
          @endif
          @if($recipe->Quantity19)
          <li class="text-left"><input type="checkbox" value="" id="item19">&nbsp;&nbsp;<label for="item19">
            {{$recipe->Quantity19}}
            {{$recipe->Unit19}}
            {{$recipe->Ingredient19}}
          </label></li>
          @endif
        </ul>
      </td>
      <td style="width:600px;padding:1rem 3rem;">
        {{$recipe->Directions}}
      </td>
    </tr>
    @if (Auth::check())
    <tr class="bg-light">
      <th colspan="2">Manage Recipe</th>
    </tr>
    <tr>
      <td colspan="2">
        <a href="/recipes/{{$recipe->recipe_id}}/edit" class="btn btn-secondary">Edit</a>
        <a onclick="return confirm('Are you sure you want to delete {{$recipe->Title}}?');" href="/recipes/{{$recipe->recipe_id}}/delete" class="btn btn-outline-secondary">Delete</a>
      </td>
    </tr>
    @else
    @endif
  </table><br/>


@endsection

  