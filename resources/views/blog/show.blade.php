@extends('layouts.app')

@section('content')

    <div class="text-center pt-16 md:pt-32">
        <p class="text-sm md:text-base text-green-500 font-bold">
            Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
            <span class="text-gray-900">/</span> {{ $post->user->name }}
        </p>
        <h1 class="container mx-auto mt-6 font-bold break-normal text-3xl md:text-5xl">
            {{ $post->title }}
        </h1>
    </div>

    <div class="container w-full max-w-6xl mx-auto bg-white bg-cover mt-8 rounded">
        <img src="{{ asset('images/' . $post->image_path) }}" alt="" class="h-4/5">
    </div>

    <div class="container max-w-5xl mx-auto -mt-32">
        <div class="mt-10 mx-0 sm:mx-6">
            <div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal">
                <p class="py-6">
                    {{ $post->description }}
                </p>
            </div>
        </div>

        <!--Author-->
        <div class="shadow-inner flex w-full items-center font-sans p-8 md:p-24">
            <img class="w-10 h-10 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author">
            <div class="flex-1">
                <p class="mb-2 font-bold text-base md:text-xl leading-none">
                    Suraiya Kawsar
                </p>
                <p class="mr-2 text-gray-600 text-xs md:text-base">2nd year IT Student at UCSI University, trying to code her way
                    into the tech industry. Still trying to determine her skillsets!
                </p>
            </div>
            <div class="justify-end">
                <button
                    class="shadow-inner bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full focus:shadow-outline focus:outline-none">
                    View Profile
                </button>
            </div>
        </div>
        <!--/Author-->

    </div>

@endsection
