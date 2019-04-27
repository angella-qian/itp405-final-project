@extends('layout')

<!-- Don't need closing tag with 2nd argument -->
@section('title', 'SCRAPS | Recipes')

@section('main')
  <header style="padding: 8rem;">
    <h1 class="text-center"><strong><a href="/" style="text-decoration:none;font-size:1.25em;">{ s c r a p s }</a></strong></h1>
    <h5 class="text-center">quick & easy recipes for students!</h5>
  </header>

  <!-- NAV -->
  <ul class="nav nav-pills nav-fill" style="background-color: #e9ecef;border-radius:5px;">
    <li class="nav-item">
        <a class="nav-link active" href="/recipes">Recipes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/create">Add Recipe</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/convert-units">Convert Units</a>
    </li>
  </ul><br/>

  <form class="form-inline" action="/recipes/" method="GET" style="margin-bottom:1rem;">
    <div class="form-group" style="margin-bottom:0.5rem;">
      <label for="category" style="margin-left:2rem;">Category:&nbsp;</label>
      <select class="form-control" id="category"
         name="category">
          <option value="">Any</option>
          @foreach($categories as $category)
            <option value="{{$category->category_id}}">{{$category->category}}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group" style="margin-bottom:0.5rem;">
      <label for="total-time" style="margin-left:2rem;">Total Time:&nbsp;</label>
      <select class="form-control" id="total-time" name="total-time">
        <option value="">Any</option>
        @foreach($times as $time)
          <option value="{{$time->time_id}}">
            {{$time->total_time}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group" style="margin-bottom:0.5rem;">
      <label for="search" style="margin-left:2rem;">Enter an Ingredient or Recipe:&nbsp;</label>
      <input class="form-control" id="search" type="text" placeholder="i.e. eggs"
         name="search"
         value=""
         >
    </div>
    <div class="form-group" style="margin-bottom:0.5rem;">
      <button class="btn btn-secondary type="submit" style="margin-left:2rem;">Search</button>&nbsp;
      <a href="/recipes/" class="btn btn-outline-secondary">Clear</a>
    </div>
  </form>
  We found <strong>{{$recipes->count()}}</strong> recipes for you to check out.
  <table class="table table-hover" style="border: 1px solid #e9ecef;">
    <thead class="thead-light">
    <tr>
      <th>Title</th>
      <th>Category</th>
      <th>Total Time</th>
      <th>Directions & Ingredients</th>
      <th>Update Recipe</th>
    </tr>
  </thead>

    <tbody>
      @forelse($recipes as $recipe)
      <tr>
        <td>{{$recipe->Title}}</td>
        <td>{{$recipe->category}}</td>
        <td>{{$recipe->total_time}}</td>
        <td>
          <a href="/details?id={{$recipe->recipe_id}}" class="btn btn-outline-secondary">View Details</a>
        </td>
        <td>
          <a href="/recipes/{{$recipe->recipe_id}}/edit" class="btn btn-secondary">Edit</a>
          <a href="/recipes/{{$recipe->recipe_id}}/delete" class="btn btn-outline-secondary">Delete</a>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="12">No recipes were found.</td>
      </tr>
      @endforelse
    </tbody>

  </table>

@endsection

  