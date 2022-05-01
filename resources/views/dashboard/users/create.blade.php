@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-center">
    <h1 class="h2">Tambah User Baru</h1>
</div>
<div class="col-lg-8 m-auto">
<form action="/dataUser" method="post" class="mb-5">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
      @error('name')
        <div class="invalid-feedback">
           {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">email</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
      @error('email')
        <div class="invalid-feedback">
           {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="category" class="form-label">akses</label>
      <select class="form-select" name="is_admin">
         <option value="{{ 1 }}" selected>admin</option>
         <option value="{{ 0 }}">petugas</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required value="{{ old('password') }}">
      @error('password')
        <div class="invalid-feedback">
           {{ $message }}
        </div>
      @enderror
    </div>
      
    <button type="submit" class="btn btn-primary">Tambah</button>
  </form>
</div>
@endsection