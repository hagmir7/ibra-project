@extends('layouts.master')
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>See more Details</p>
                    <h1>Single Movie</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@isset($film)
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ Storage::url($film->image)}}"  alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{$film->title}}</h3>
                        <p>{{$film->description}}</p>
                        <div class="single-product-form">
                            <p><strong>Categories: </strong>{{$film->category}}</p>
                            <p><strong>Cinema: </strong>{{$film->salle->cinema->name}}</p>
                            <p><strong>Salle: </strong>{{$film->salle->name}}</p>
                            <p>{{$film->start_at}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <form action="">
                       <select name="" class="form-select" id="">
                        @foreach ($film->villes as $ville)
                            <option value="{{ $ville->id }}">{{ $ville->name }}</option>
                        @endforeach
                       </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endisset
@endsection
