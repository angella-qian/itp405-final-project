@extends('layout')

<!-- Don't need closing tag with 2nd argument -->
@section('title', 'SCRAPS | Signup')

@section('main')
  <header style="padding: 8rem;">
    <h1 class="text-center"><strong><a href="/recipes" style="text-decoration:none;font-size:1.25em;">{ s c r a p s }</a></strong></h1>
    <h5 class="text-center">quick & easy recipes for students!</h5>
  </header><hr/>

  <h2 class="text-center">Create an Account</h2>
  <p class="text-center">Already have one? <a href="/">Sign in here</a>.</p>
  <form method="post">
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" class="form-control">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control">
    </div>
    <input type="submit" value="Sign Up" class="btn btn-primary">
  </form>


 @endsection