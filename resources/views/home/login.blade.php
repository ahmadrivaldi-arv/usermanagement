@extends('layouts.main')


@section('container')

<div class="row justify-content-center flex-column align-items-center vh-100">
    <div class="col-md-4">
        @if (session()->has('success'))
        <div class="alert d-flex align-items-center alert-success alert-dismissible fade show" role="alert">
            <p class="text-center">{{ session('success')}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('login_error'))
        <div class="alert d-flex align-items-center alert-warning alert-dismissible fade show" role="alert">
            <p class="text-center">{{ session('login_error')}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="col-md-5">

        <div class="card shadow-sm border-bottom">
            <div class="card-body p-3">
                <form action="/user-login" method="POST">
                    @csrf

                    <div class="mb-3">
                        <h4 for="exampleInputEmail1" class="form-label text-center text-dark">Sign In</h4>

                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" placeholder="myemailaddress@org.com"
                            class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                            value="{{ old('email') }}" aria-describedby="emailHelp">


                        @error('email')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="passsword" class="form-label">Password</label>
                        <input type="password" placeholder="*********"
                            class="form-control @error('password') is-invalid @enderror" id="password" name="password">


                        @error('password')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary py-2" style="width: 100%;">LOGIN</button>
                    </div>

                    <div class="mb-3">
                        <small>Belum memiliki akun?<a href="/user-register" class="text-decoration-none">
                                Daftar</a>.</small>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection