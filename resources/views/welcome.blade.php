@extends('layouts.master')
@section('content')

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Movies & Organic</p>
							<h1>Welcome to Cinimatics</h1>
							<div class="hero-btns">
							<form action="{{route('index')}}" method="GET">
                                <input type="text" class="bar-searsh" name="query" id=""  value="{{request()->search}}" placeholder="Rechercher par titre" />
                                    <button type="submit" class="boxed-btn" ><i class="fas fa-search"></i></button>
                            </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->



	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Our</span> Cinemas</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
            <form  method="get">

                <select name="ville" class="form-select" id="">
                    @foreach ($villes as $ville)
                        <option value="{{ $ville->name }}">{{$ville->name}}</option>
                    @endforeach

                </select>
                <button type="submit">Search</button>
            </form>
            <div class="row">
                @isset($cinemas)
                @foreach ($cinemas as $cinema)
                <div class="col-lg-3 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="{{ route('cinema.show', $cinema->id) }}"><img src="{{ Storage::url($cinema->image)}}" height="200px" alt=""></a>
						</div>
                        <a href="{{ route('cinema.show', $cinema->id) }}">
						     <h3>{{$cinema->name}}</h3>
                        </a>

					</div>
				</div>
                @endforeach
                @endisset

			</div>
            {{ $cinemas->links() }}
		</div>
	</div>


@endsection





