@extends('layout.app')

@section('content')

<div class="flex flex-col justify-center max-w-3xl p-6 space-y-4 sm:p-10 ">
	<h2 class="text-xl font-semibold">Products</h2>
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
						<button type="button" class="flex items-center px-2 py-1 space-x-1">
							<i class="fa-solid fa-pen-to-square"></i>
							<span>edit </span>
						</button>
					</div>
				</div>
			</div>
			</a>
		</li>
		@endforeach
		{{-- <li class="flex flex-col py-6 sm:flex-row sm:justify-between">
			<div class="flex w-full space-x-2 sm:space-x-4">
				<img class="flex-shrink-0 object-cover w-20 h-20  rounded outline-none sm:w-32 sm:h-32 " src="https://images.unsplash.com/photo-1504274066651-8d31a536b11a?ixlib=rb-1.2.1&amp;ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;auto=format&amp;fit=crop&amp;w=675&amp;q=80" alt="Replica headphones">
				<div class="flex flex-col justify-between w-full pb-4">
					<div class="flex justify-between w-full pb-2 space-x-2">
						<div class="space-y-1">
							<h3 class="text-lg font-semibold leading-snug sm:pr-8">Replica headphones</h3>
						</div>
						<div class="text-right">
							<p class="text-lg font-semibold">99.95€</p>
							
						</div>
					</div>
					<div class="flex text-sm divide-x">
						<button type="button" class="flex items-center px-2 py-1 pl-0 space-x-1">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
								<path d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z"></path>
								<rect width="32" height="200" x="168" y="216"></rect>
								<rect width="32" height="200" x="240" y="216"></rect>
								<rect width="32" height="200" x="312" y="216"></rect>
								<path d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z"></path>
							</svg>
							<span>Remove</span>
						</button>
						<button type="button" class="flex items-center px-2 py-1 space-x-1">
							<i class="fa-solid fa-pen-to-square"></i>
							<span>edit</span>
						</button>
					</div>
				</div>
			</div>
		</li> --}}
		{{-- <li class="flex flex-col py-6 sm:flex-row sm:justify-between">
			<div class="flex w-full space-x-2 sm:space-x-4">
				<img class="flex-shrink-0 object-cover w-20 h-20  rounded outline-none sm:w-32 sm:h-32 " src="https://images.unsplash.com/phodark:to-1594549181132-9045fed330ce?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=675&amp;q=80" alt="Set of travel chargers">
				<div class="flex flex-col justify-between w-full pb-4">
					<div class="flex justify-between w-full pb-2 space-x-2">
						<div class="space-y-1">
							<h3 class="text-lg font-semibold leading-snug sm:pr-8">Set of travel chargers</h3>
						</div>
						<div class="text-right">
							<p class="text-lg font-semibold">8.99€</p>
							
						</div>
					</div>
					<div class="flex text-sm divide-x">
						<button type="button" class="flex items-center px-2 py-1 pl-0 space-x-1">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
								<path d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z"></path>
								<rect width="32" height="200" x="168" y="216"></rect>
								<rect width="32" height="200" x="240" y="216"></rect>
								<rect width="32" height="200" x="312" y="216"></rect>
								<path d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z"></path>
							</svg>
							<span>Remove</span>
						</button>
						<button type="button" class="flex items-center px-2 py-1 space-x-1">
							<i class="fa-solid fa-pen-to-square"></i>
							<span>edit</span>
						</button>
					</div>
				</div>
			</div>
		</li> --}}
	</ul>
	
	
</div>
@endsection