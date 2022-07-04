@extends('layout.app')

@section('content')
{{-- <section class="w-full flex justify-center">
<div class="flex flex-col justify-center max-w-4xl border-2 p-6 space-y-4 sm:p-10 ">
	<h2 class="text-3xl font-bold text-center">Products</h2>
	<ul class="flex flex-col divide-y divide-gray-700">
		@foreach ($product as $product)
		<li class="flex flex-col py-6 sm:flex-row sm:justify-between" >
			<a href="{{ route('product@show', $product)}}">
			<div class="flex w-full space-x-2 sm:space-x-4">
				<img class="flex-shrink-0 object-cover w-20 h-20  rounded outline-none sm:w-32 sm:h-32 " src="{{$product->image}}" alt="Polaroid camera">
				<div class="flex flex-col justify-between w-full pb-4">
					<div class="flex justify-between w-full pb-2 space-x-2">
						<div class="space-y-1">
							<h3 class="text-lg font-semibold leading-snug sm:pr-8">{{$product->name}}</h3>
						</div>
						<div class="text-right">
							<p class="text-lg font-semibold">{{$product->price}} $</p>
							
						</div>
					</div>
                     @auth
					@if (Auth::user()->role == 'admin' )
					<div class="flex text-sm divide-x">
						<form action="{{route('product@destroy', $product)}}" method="POST" >
							@csrf
							@method('DELETE')
						<button type="submit" class="flex items-center px-2 py-1 pl-0 space-x-1">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
								<path d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z"></path>
								<rect width="32" height="200" x="168" y="216"></rect>
								<rect width="32" height="200" x="240" y="216"></rect>
								<rect width="32" height="200" x="312" y="216"></rect>
								<path d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z"></path>
							</svg>
							<span>Remove</span>
						</button>
						</form>
						<a href="{{ route('product@edit', $product)}}" class="flex items-center px-2 py-1 space-x-1">
							<i class="fa-solid fa-pen-to-square"></i>
							<span>edit </span>
						</a>
					</div>
                @endif
				@endauth

				</div>
			</div>
			</a>
		</li>
		@endforeach
	
	</ul>
	
	
</div>
</section> --}}

<section class="text-gray-600 body-font">
	<div class="container px-5 py-24 mx-auto">
	  <div class="flex flex-col text-center w-full mb-20">
		<h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">OUR Product</h1>
	  </div>
	 
	  <div class="flex flex-wrap -m-4">
		@foreach ($product as $product)
		<a href="{{ route('product@show', $product)}}">
		<div class="p-4 lg:w-1/2 hover:bg-gray-100 rounded transition-ease duration-300">
		  <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
			<img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="{{$product->image}}">
			<div class="flex-grow sm:pl-8">
			  <h2 class="title-font font-bold text-2xl text-gray-900">{{$product->name}}</h2>
			  <span class="inline-flex">
				<a class="text-gray-500 text-lg mt-5">
					{{$product->price}} $
				</a>
				@auth
				@if (Auth::user()->role == 'admin' )
				<div class="flex text-sm divide-x  mt-10">
					<form action="{{route('product@destroy', $product)}}" method="POST" >
						@csrf
						@method('DELETE')
					<button type="submit" class="flex items-center px-2 py-1 pl-0 space-x-1">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
							<path d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z"></path>
							<rect width="32" height="200" x="168" y="216"></rect>
							<rect width="32" height="200" x="240" y="216"></rect>
							<rect width="32" height="200" x="312" y="216"></rect>
							<path d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z"></path>
						</svg>
						<span>Remove</span>
					</button>
					</form>
					<a href="{{ route('product@edit', $product)}}" class="flex items-center px-2 py-1 space-x-1">
						<i class="fa-solid fa-pen-to-square"></i>
						<span>edit </span>
					</a>
				</div>
			@endif
			@endauth
			  </span>
			</div>
		  </div>
		</div>
		</a>
		@endforeach
	  </div>
	
	</div>
  </section>
@endsection