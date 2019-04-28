@extends('layout')

<!-- Don't need closing tag with 2nd argument -->
@section('title', 'SCRAPS | Login')

@section('main')
  <header style="padding: 8rem;">
    <h1 class="text-center"><strong><a href="/recipes" style="text-decoration:none;font-size:1.25em;">{ s c r a p s }</a></strong></h1>
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
    @if (Auth::check())
    <li class="nav-item">
        <a class="nav-link active" href="/profile">Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/logout">Logout</a>
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

  <h2 class="text-center">Good to see you!</h2>
  <p class="text-center">Your email address is {{$user}}.</p>


 @endsection