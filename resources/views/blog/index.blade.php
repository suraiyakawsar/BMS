@extends('layouts.app')

@section('content')

    <div class="mx-auto pt-24 pb-5 flex flex-row justify-between w-3/4 text-center">
        <div class="flex gap-2 items-center text-5xl mx-0 my-auto">
            <span class="material-icons-round md-48">library_books</span>
            Blog Posts
        </div>

        @if (Auth::check())
            <div class="pt-5">
                <a href="/blog/create"
                    class="py-3 px-4 rounded-3xl shadow-inner border-yellow-800 bg-yellow-500 uppercase text-gray-100 text-base font-bold transition duration-200 md:w-auto hover:text-white hover:bg-yellow-700 focus:shadow-outline focus:outline-none tracking-wide leading-normal cursor-pointer">
                    Create Post
                </a>
            </div>
        @endif

    </div>


    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-1/3 text-gray-50 bg-green-500 rounded-2xl py-2 px-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif


    @foreach ($posts as $post)
        <div class="px-4 py-6 w-4/5 mx-auto">
            <div
                class="flex flex-col max-w-screen-lg overflow-hidden bg-white border rounded shadow-sm lg:flex-row sm:mx-auto">

                <div class="relative lg:w-1/2">
                    <img src="{{ asset('images/' . $post->image_path) }}" alt=""
                        class="object-cover w-full lg:absolute h-80 lg:h-full" />
                    <svg class="absolute top-0 right-0 hidden h-full text-white lg:inline-block" viewBox="0 0 20 104"
                        fill="currentColor">
                        <polygon points="17.3036738 5.68434189e-14 20 5.68434189e-14 20 104 0.824555778 104"></polygon>
                    </svg>
                </div>

                <div class="flex flex-col justify-center p-8 bg-white lg:p-16 lg:pl-10 lg:w-1/2">

                    <h5 class="mb-3 text-3xl font-extrabold leading-none sm:text-4xl">
                        {{ $post->title }}
                    </h5>
                    <!-- Added truncate so the description shown is limited -->
                    <p class="truncate-3 mb-5 text-gray-800">
                        {{ $post->description }}
                    </p>


                    <div>
                        <a href="/blog/{{ $post->slug }}"
                            class="inline-flex items-center justify-center h-10 px-6 mr-6 font-medium tracking-wide text-white transition duration-200 rounded-3xl shadow-inner bg-yellow-400 hover:bg-yellow-700 focus:shadow-outline focus:outline-none leading-normal">
                            Keep Reading
                        </a>

                        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                            <span class="float-right">
                                <a href="/blog/{{ $post->slug }}/edit"
                                    class="inline-flex items-center justify-center h-10 px-4 mr-6 font-medium tracking-wide text-white transition duration-200 rounded-3xl shadow-inner bg-green-400 hover:bg-green-700 focus:shadow-outline focus:outline-none leading-normal">
                                    <span class="material-icons-round">
                                        edit
                                    </span>
                                </a>
                            </span>

                            <span class="float-right">
                                <form action="/blog/{{ $post->slug }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button
                                        class="inline-flex items-center justify-center h-10 px-4 mr-6 font-medium tracking-wide text-white transition duration-200 rounded-3xl shadow-inner bg-red-400 hover:bg-red-700 focus:shadow-outline focus:outline-none leading-normal"
                                        type="submit">
                                        <span class="material-icons-round">
                                            delete
                                        </span>
                                    </button>

                                </form>
                            </span>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
