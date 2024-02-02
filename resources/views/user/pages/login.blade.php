@extends('user.layouts.default')
@section('content')
    <div class="container pt-5">
        <div class="col-6">
            <h2>Login</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('loginUser') }}">
                @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
              <div class="mb-3 d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Login</button>
              </div>

               <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="{{ route('registerPage') }}">Register</a></p>
                </div>
            </form>
        </div>
        
    </div>
@stop