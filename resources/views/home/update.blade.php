@extends('layouts.main')


@section('container')

<div class="row justify-content-center align-items-center vh-100 mt-5">
    <div class="col-md-5">
        <div class="card shadow-sm border-bottom">
            <div class="card-body p-3">
                <form action="/user-update" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" placeholder="Joe Mama"
                            class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ old('name',$data->name)}}">

                        @error('name')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Choose Username</label>
                        <input type="text" placeholder="username"
                            class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                            value="{{ old('username',$data->username) }}">
                        @error('username')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" placeholder="myemailaddress@org.com"
                            class="@error('email') is-invalid @enderror form-control" id="email" name="email"
                            aria-describedby="emailHelp" value="{{ old('email',$data->email) }}">
                        @error('email')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary py-2" style="width: 100%;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection