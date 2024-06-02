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
           <div class="row">
            <form method="get" class="mb-4 col-md-6">

                <div class="input-group ">
                    <select name="ville" class="form-select" id="">
                        @foreach ($villes as $ville)
                        <option value="{{ $ville->name }}">{{$ville->name}}</option>
                        @endforeach

                    </select>
                    <button type="submit" class="btn btn-danger">Search</button>
                </div>
            </form>
           </div>
            <div class="row">
                @isset($cinemas)
                @foreach ($cinemas as $cinema)
                <div class="col-md-4 text-center">
					<div class="card shadow-sm">
						<div class="product-image p-0 pt-2">
							<a href="{{ route('cinema.show', $cinema->id) }}"><img src="{{ Storage::url($cinema->image)}}" height="200px" alt=""></a>
						</div>
                        <div class="mb-3 px-3">
                            <a class="text-start" href="{{ route('cinema.show', $cinema->id) }}">
                               <div>
                                <h3 class="h5">{{$cinema->name}}</h3> ({{ $cinema->ville->name }})
                               </div>
                            </a>
                        </div>

					</div>
				</div>
                @endforeach
                @endisset

			</div>
            {{ $cinemas->links() }}
		</div>
	</div>


@endsection





