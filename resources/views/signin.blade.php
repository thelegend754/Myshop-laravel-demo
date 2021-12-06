@extends('master')

@section('content')

<form class="form-signin" method="post" action="{{url('user/signin')}}">
      @csrf
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" class="form-control"  required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" class="form-control"  required>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      
    </form>
@endsection