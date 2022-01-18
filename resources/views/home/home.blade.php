@extends('layouts.main')

@section('container')
<div class="row">
  <div class="col-md-4">
    @if (session()->has('success'))
    <div class="alert d-flex align-items-center alert-success alert-dismissible fade show" role="alert">
      <p class="text-center">{{ session('success')}}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  </div>
</div>
<div class="row justify-content-end align-items-center">
  <div class="col-md-1 d-flex align-items-center justify-content-end mb-3">
    {{-- <a href="" class="btn btn-primary "><i class="bi bi-plus-square"></i></a> --}}
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class="bi bi-plus-square" style="font-size: 1.5rem;font-weight: bold"></i>
    </button>
  </div>
</div>
<div class="row align-items-center">

  <div class="col-md-12">

    <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $d)

          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $d->name }}</td>
            <td>{{ $d->username }}</td>
            <td>{{ $d->email }}</td>
            <td class="d-flex justify-content-center">
              @csrf
              <a href="/user-update/{{  $d->id }}" class="btn btn-primary mx-1"><i class="bi bi-pencil-square"></i></a>
              <a href="/user-remove/{{ $d->id }}" onclick="return confirm('apakah yakin ingin menghapus data?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </td>
          </tr>
          @endforeach


        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/user-register" method="POST">
          @csrf
          {{-- <div class="mb-3">
            <h4 for="exampleInputEmail1" class="form-label text-center text-dark">Sign Up</h4>
          </div> --}}
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" placeholder="Joe Mama" class="form-control @error('name') is-invalid @enderror" id="name"
              name="name" value="{{ old('name')}}">

            @error('name')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror

          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Choose Username</label>
            <input type="text" placeholder="username" class="form-control @error('username') is-invalid @enderror"
              id="username" name="username" value="{{ old('username') }}">
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
              aria-describedby="emailHelp" value="{{ old('email') }}">
            @error('email')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" placeholder="*********" class="form-control @error('password') is-invalid @enderror"
              id="password1" name="password">
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

        </form>

      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div> --}}
    </div>
  </div>
</div>