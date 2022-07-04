@extends('layout.app')

@section('content')

<section class="flex justify-center items-center">
    <div class="flex flex-col w-full max-w-md px-4 py-8 bg-white rounded-lg shadow  sm:px-6 md:px-8 lg:px-10">
      <div class="self-center mb-6 text-xl font-light text-gray-600 sm:text-2xl ">
          Add user
      </div>
      <div class="mt-8">
          <form action="{{ route('users@addUser')}}" autoComplete="off" method="POST">
            @csrf
              <div class="flex flex-col mb-6">
                  <div class="flex relative ">
                      
                      <input type="name" name="name" id="sign-in-email" class=" rounded-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" placeholder="name"/>
                      @error('name')
                      <p class="text-medium text-red-500 mt-2"> {{$message}}</p>
                  @enderror
                      </div>
                  </div>
                  <div class="flex flex-col mb-6">
                      <div class="flex relative ">
                       
                          <input type="email" name="email" id="sign-in-email" class=" rounded-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" placeholder="email"/>
                          </div>
                      </div>
                      
                      <div class="flex flex-col mb-6">
                        <div class="flex relative ">
                           
                            <input type="password" name="password" id="sign-in-email" class=" rounded-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" placeholder=" password"/>
                            </div>
                        </div>
    
                        <div class="flex flex-col mb-6">
                            <div class="flex relative ">
                                <input type="password" name="password_confirmation" id="sign-in-email" class=" rounded-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" placeholder=" confirm password"/>
                                @error('password_confirmation')
                                    <p class="text-medium text-red-500 mt-2"> {{$message}}</p>
                                @enderror
                                </div>
                            </div>
    
    
                      <div class="flex w-full">
                          <button type="submit" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-purple-500 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                              Add the user
                          </button>
                      </div>
                  </form>
              </div>
              
          </div>
        </section>
@endsection