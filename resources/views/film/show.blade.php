@extends('layouts.master')
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1 class="h5">{{$film->title}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@isset($film)
<div class="single-product my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-img">
                    <img src="{{ Storage::url($film->image)}}" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div class="single-product-content">
                    <h3>{{$film->title}}</h3>
                    <strong>({{ $film?->salle?->cinema->ville->name }})</strong>
                    <p>{{$film->description}}</p>


                    <ul class="list-group mb-2">
                        <li
                            class="list-group-item bg-card d-flex justify-content-between align-items-center row m-0 px-2">
                            <div class="col-6">Movie name</div>
                            <div class="col-6 fw-bold">{{$film->title}} </div>
                        </li>
                        <li
                            class="list-group-item bg-card d-flex justify-content-between align-items-center row m-0 px-2">
                            <div class="col-6">Cinema</div>
                            <div class="col-6 fw-bold">{{$film?->salle?->cinema->name}}</div>
                        </li>
                        <li
                            class="list-group-item bg-card d-flex justify-content-between align-items-center row m-0 px-2">
                            <div class="col-6">Cateogry</div>
                            <div class="col-6 fw-bold">{{$film->category}}</div>
                        </li>

                        <li
                            class="list-group-item bg-card d-flex justify-content-between align-items-center row m-0 px-2">
                            <div class="col-6">Room</div>
                            <div class="col-6 fw-bold">{{$film?->salle?->name}}</div>
                        </li>

                        <li
                            class="list-group-item bg-card d-flex justify-content-between align-items-center row m-0 px-2">
                            <div class="col-6">Show date</div>
                            <div class="col-6 fw-bold">{{$film->start_at}}</div>
                        </li>
                        <li
                            class="list-group-item bg-card d-flex justify-content-between align-items-center row m-0 px-2">
                            <div class="col-6">City</div>
                            <div class="col-6 fw-bold">{{$film?->salle?->cinema->ville->name}}</div>
                        </li>
                    </ul>

                    <!-- Button trigger modal -->

                    @auth
                    <button type="button" class="btn btn-danger rounded-pill w-100 mt-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Book a ticket now
                    </button>
                    @endauth
                    @guest
                    <div class="d-flex gap-2">
                        <a href="{{ route("login") }}" class="btn btn-danger rounded-pill w-100 mt-3">
                            Login
                        </a>
                        <a href="{{ route("register") }}" class="btn btn-info text-white rounded-pill w-100 mt-3">
                            Signup
                        </a>
                    </div>

                    @endguest
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Book now</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('ticket.store') }}">
                                        @csrf
                                        <div class="row">
                                            @foreach ($film->filmPlaces as $item)
                                            <div class="col-md-6">
                                                <input type="radio" value="{{ $film->id }}" class="btn-check"
                                                    name="film_place_id" id="option{{ $item->id }}" autocomplete="off"
                                                    checked>
                                                <label class="btn card" for="option{{ $item->id }}">
                                                    <h5>{{ $item->placeType->name }}</h5>
                                                    <h6>{{ $item->price }} MAD</h6>
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="mt-3">
                                            <label for="places"><strong>Number of places</strong></label>
                                            <select name="places" id="places" class="form-select">
                                                <option value="1">1 place</option>
                                                <option value="2">2 places</option>
                                                <option value="4">3 places</option>
                                                <option value="5">4 places</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-danger w-100 rounded-pill mt-4" type="submit">Book
                                            now</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset
@endsection
