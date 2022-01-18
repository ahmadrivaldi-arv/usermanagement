@extends('layouts.main')


@section('container')
    
<div class="row justify-content-center align-items-center vh-100 mt-5">
    <div class="col-md-5">
        <div class="card shadow-sm border-bottom">
            <div class="card-body p-3">
                <form action="/user-register" method="POST" >
                    @csrf
                    <div class="mb-3">
                      <h4 for="exampleInputEmail1" class="form-label text-center text-dark">Sign Up</h4>
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Full Name</label>
                      <input type="text"  placeholder="Joe Mama" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name')}}">

                      @error('name')
                      <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror

                    </div>
                    <div class="mb-3">
                      <label for="username" class="form-label">Choose Username</label>
                      <input type="text"  placeholder="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" >
                      @error('username')
                      <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email"  placeholder="myemailaddress@org.com" class="@error('email') is-invalid @enderror form-control" id="email"  name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                      @error('email')
                      <div id="validationServerUsernameFeedback" class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" placeholder="*********" class="form-control @error('password') is-invalid @enderror" id="password1" name="password">
                      @error('password')
                      <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    {{-- <div class="mb-3">
                      <label for="password2" class="form-label">Confirm Password</label>
                      <input type="password" placeholder="*********" class="form-control" id="password2" name="password2">
                    </div> --}}
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary py-2" style="width: 100%;">Submit</button>
                    </div>
                    <div class="mb-3">
                        <small>Sudah memiliki akun?<a href="/user-login" class="text-decoration-none"> Login</a>.</small>
                    </div>
                    
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection