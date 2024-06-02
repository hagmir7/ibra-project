@extends('layouts.master')
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <h1 class="h2 text-white">{{$cinema->name}}</h1>
            </div>
        </div>
    </div>
</div>
@isset($cinema)
@php
$films = $cinema->films ;
@endphp
{{-- start content --}}
	<!-- product section -->
	<div class="product-section py-5">
		<div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ Storage::url($cinema->image)}}"  alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{$cinema->name}} <small>({{ $cinema->ville->name }})</small></h3>
                        <p>{{$cinema->description}}</p>
                    <ul class="list-group mb-2">
                        <li class="list-group-item bg-card d-flex justify-content-between align-items-center row m-0 px-2">
                            <div class="col-6">Name</div>
                            <div class="col-6 fw-bold">{{$cinema?->name}}</div>
                        </li>

                        <li class="list-group-item bg-card d-flex justify-content-between align-items-center row m-0 px-2">
                            <div class="col-6">Rooms</div>
                            <div class="col-6 fw-bold">{{$cinema?->salles->count()}}</div>
                        </li>

                        <li class="list-group-item bg-card d-flex justify-content-between align-items-center row m-0 px-2">
                            <div class="col-6">Movies</div>
                            <div class="col-6 fw-bold">{{$cinema->films->count()}}</div>
                        </li>
                        <li class="list-group-item bg-card d-flex justify-content-between align-items-center row m-0 px-2">
                            <div class="col-6">City</div>
                            <div class="col-6 fw-bold">{{$cinema?->ville->name}}</div>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>

            <h4 class="my-3">Latest movies and series</h4>
            <div class="row">
                @foreach ($films as $film)
                <div class="m-0 mb-3 col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 p-1">
                    <div class="movie-card m-0">
                        <div class="p-0 overflow-hidden border position-relative">
                            <a href="{{ route('film', $film->id) }}">
                                <img width="100%" src="{{ Storage::url($film->image)}}" class="cover movie-image lazy loaded" />
                            </a>
                            <div class="movie-card-shadow"> </div>
                        </div>
                        <div class="rounded p-0 overflow-hidden pt-2">
                            <a href="{{ route('film', $film->id) }}">
                                <h2 class="card-title mb-0 h6" dir="auto">{{$film->title}}</h2>
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('film', $film->id) }}" class="btn btn-danger p-2 w-100 rounded-pill">Book a ticket</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
		</div>
	</div>
@endisset


{{-- end content --}}

@endsection
