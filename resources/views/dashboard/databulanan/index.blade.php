@extends('dashboard.layouts.main')

@section('container')
  <div class="row justify-content-center">
    <h1>Data Bulanan</h1>
      <div class="col-lg-8">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
      </div>
  </div>
@endsection
