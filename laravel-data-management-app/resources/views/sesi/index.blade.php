@extends('layout/template')
@section('content')
<div class="w-50 mx-auto border rounded px-4 py-4" style="background-color: #f0f8ff; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
    <h1 class="text-center" style="color: #007bff;">Login</h1>


    <form action="/sesi/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label" style="color: #007bff;">Email</label>
            <input type="email" name="email" value="{{Session::get('email')}}" class="form-control" style="border: 2px solid #007bff; border-radius: 5px;">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label" style="color: #007bff;">Password</label>
            <input type="password" name="password" class="form-control" style="border: 2px solid #007bff; border-radius: 5px;">
        </div>
        <div class="d-grid">
            <button name="submit" type="submit" class="btn btn-primary" style="background-color: #007bff; border-color: #0056b3;">Login</button>
        </div>
    </form>
</div>
@endsection
