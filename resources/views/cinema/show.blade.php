@extends('layouts.master')
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>See more Details</p>
                    <h1>Single Cinemas</h1>
                </div>
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
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Cinema :{{$cinema->name}}</span> </h3>
					</div>
				</div>
			</div>

            <div class="row">
                @foreach ($films as $obj)
                <div class="col-lg-3 col-md-6 text-center">
                    <a href="{{ route('film', $obj->id) }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                    <img src="{{ Storage::url($obj->image)}}" alt="">
                            </div>
                            <h3>{{$obj->title}}</h3>
                            <a href="{{ route('film', $obj->id) }}" class="cart-btn"> Book a ticket</a>
                        </div>
                    </a>
				</div>
                @endforeach
			</div>
		</div>
	</div>
@endisset


{{-- end content --}}

@endsection
