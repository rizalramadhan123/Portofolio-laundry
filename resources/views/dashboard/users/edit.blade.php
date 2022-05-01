@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-center">
    <h1 class="h2">Edit User</h1>
</div>
<div class="col-lg-8 m-auto">
    <form action="/dataUser/{{ $users->id }}" method="post" class="mb-5" enctype="multipart/form-data">
        {{-- bisa put atau patch --}}
        @method('put')
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name',$users->name) }}">
            @error('name')
              <div class="invalid-feedback">
                 {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email',$users->email) }}">
            @error('email')
              <div class="invalid-feedback">
                 {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="mb-3">
              <label for="category" class="form-label">akses</label>
              <select class="form-select" name="is_admin">
                  @if (old('users',$users->is_admin) == 1)
                  <option value="{{ 1 }}" selected>admin</option>
                  <option value="{{ 0 }}" >petugas</option>
                  @else
                  <option value="{{ 0 }}" selected>petugas</option>
                  <option value="{{ 1 }}">admin</option>
                  @endif
                </select>
            </div>
            
            <div class="mb-3">
              <label for="password" class="form-label">password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
              @error('password')
                <div class="invalid-feedback">
                   {{ $message }}
                </div>
              @enderror
            </div>

          <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
</div>
@endsection