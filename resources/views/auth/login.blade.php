@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
      <div class="login-wrapper d-flex align-items-center">
            <div class="col-6 mx-auto text-white p-3 background-login rounded">
                @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{session('status')}}
                  </div>
                   
                @endif
                <form action="{{route('login')}}" method="POST">
                    @csrf
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
                
                      <div class="form-group form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Check me out</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Login</button>
                    </form>
            </div>
        </div>
    </div>
@endsection