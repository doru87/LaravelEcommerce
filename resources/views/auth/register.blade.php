@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
      <div class="register-wrapper d-flex align-items-center">
            <div class="col-6 background-register mx-auto text-white rounded p-3">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') border border-danger @enderror" id="name" value="{{old('name')}}">
                    @error('name')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    @enderror  
                    </div>
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control @error('username') border border-danger @enderror" id="username" value="{{old('username')}}" >
                    @error('username')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    @enderror  
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control @error('email') border border-danger @enderror" id="email" value="{{old('email')}}" >
                        @error('email')
                        <div class="alert alert-danger mt-1">
                            {{$message}}
                        </div>
                        @enderror 
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error('password') border border-danger @enderror" id="password" >
                        @error('password')
                        <div class="alert alert-danger mt-1">
                            {{$message}}
                        </div>
                        @enderror 
                      </div>
                      <div class="form-group">
                        <label for="password_confirmation">Password again</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') border border-danger @enderror" id="password_confirmation" >
                        @error('password_confirmation')
                        <div class="alert alert-danger mt-1">
                            {{$message}}
                        </div>
                        @enderror   
                    </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Register</button>
                    </form>
            </div>
   
      </div>
    </div>
@endsection