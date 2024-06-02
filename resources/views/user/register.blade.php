@extends('layouts.master')


@section('content')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="text-white">
                    <h1 class="h2 text-white">Create new account</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center my-3 bg-light">
    <div class="col-md-5 rounded mt-3 card p-3">
        <h1 class="h3 text-center my-3">Create a New Account</h1>
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger p-2"> {{ $error }} </div>
        @endforeach
        <form action="{{ route('store_user') }}" method="POST">
            @csrf
            <input type="text" name="first_name" id="first_name" class="form-control mt-2 fs-4"  placeholder="First Name">
            <input type="text" name="last_name" id="last_name" class="form-control mt-2 fs-4" placeholder="Last Name">
            <input type="email" name="email" id="email" class="form-control mt-2 fs-4" placeholder="Email">
            <input type="password" name="password" id="password" class="form-control mt-2 fs-4" placeholder="Password">
            <input type="password" name="password_1" id="password_1" class="form-control mt-2 fs-4" placeholder="Confirm Password">
            <button class="btn btn-primary mt-4 w-100">Register</button>
        </form>
        <a class="my-2" href="{{ route('login') }}">Already have an account?</a>
    </div>
</div>


@endSection
