@extends('layout.app')
@section('content')

<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
      
        <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ $product->image}}">
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name}}</h1>
         
          <p class="leading-relaxed">{{ $product->description}}</p>
          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
            
            
          </div>
          <div class="flex">
            <span class="title-font font-medium text-2xl text-gray-900">${{ $product->price}}</span>
            <button class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-2 focus:outline-none hover:bg-blue-600 rounded-full"><i class="fa-solid fa-pen-to-square"></i></button>
            {{-- <button class="flex ml-5 text-white bg-red-500 border-0 py-2 px-2 focus:outline-none hover:bg-red-600 rounded-full"><i class="fa-solid fa-trash-can"></i></button> --}}
            <form action="{{route('product@destroy', $product)}}" method="POST" >
                @csrf
                @method('DELETE')
            <button type="submit" class="flex ml-5 text-white bg-red-500 border-0 py-2 px-2 focus:outline-none hover:bg-red-600 rounded-full">
                <i class="fa-solid fa-trash-can"></i>   
            </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection