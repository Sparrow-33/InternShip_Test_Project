@extends('layout.app')

@section('content')


<div class="container mx-auto px-4 sm:px-8 max-w-3xl">
    <div class="py-8">
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                User
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                email
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                created at
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                last update
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                   
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$user->name}}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$user->email}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$user->created_at->format('d/m/Y')}}
                                </p>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$user->updated_at->diffForHumans()}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="relative inline-block px-3 py-1 mr-2 font-semibold text-green-900 leading-tight">
                                    <a href="{{route('user@showProfile',$user)}}">
                                    <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                    </span>
                                    <span class="relative">
                                        edit
                                    </span>
                                </a>
                                </span>

                                
                                <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                    <a href="{{route('user@destroy', $user)}}" >

                                    <span aria-hidden="true" class="absolute inset-0 bg-red-200 opacity-50 rounded-full">
                                    </span>
                                    <span class="relative">
                                        remove
                                    </span>
                                </a>   
                                </span>
                            </td>
                                           
                        </tr>
                    
                        @endforeach
                        
                       
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection