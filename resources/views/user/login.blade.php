@extends('layouts.master')


@section('content')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1 class="h5">Login to your account</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-light">


    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5 card  p-4">
                <h1 class="h2 text-center">Login</h1>
                <form action="{{ route('login.store') }}?next={{ request()->query('next') }}" method="POST">
                    @csrf
                    @error('email')
                    <div class="p-1 alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="email"> Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="form-control fs-3 my-2" placeholder="Email...">
                    <label for="password"> Password</label>
                    <input type="password" name="password" id="password" class="form-control fs-3 mt-2"
                        placeholder="Password...">
                    <button class="btn btn-danger rounded-pill mt-4 fs-5 w-100">Login</button>
                    <a href="{{ route('register') }}" class="btn rounded-pill btn-outline-primary mt-4 fs-4 w-100">Create new
                        account</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endSection
