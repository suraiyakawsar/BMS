@extends('layouts.app')

@section('content')
    <div class="background-image h-auto grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-32">
            <div class="m-auto pt-4 pb-8 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-4xl uppercase font-bold text-shadow-md pb-10">
                    Welcome to my blog!
                </h1>
                <p class="w-3/6 m-auto mb-10 text-base text-indigo-100 md:text-lg">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                    rem aperiam, eaque ipsa quae. explicabo. Sed ut perspiciatis unde omnis.
                </p>
                <a href="/blog"
                    class="inline-flex items-center justify-center w-3/6 h-12 px-6 font-semibold tracking-wide text-white transition duration-200 rounded shadow-md md:w-auto bg-yellow-400 hover:bg-yellow-700 focus:shadow-outline focus:outline-none">
                    Read More
                </a>
            </div>
        </div>

        <div>
            <form class="flex flex-row items-center justify-center w-2/6 mb-4 mx-auto">
                <input placeholder="Email" required="" type="text"
                    class="shadow-2xl flex-grow w-3/6 h-12 px-4 mb-3 text-white transition duration-200 border-b-2 appearance-none md:mr-2 md:mb-0 bg-transparent focus:outline-none focus:ring focus:border-yellow-300" />

                <a href="/"
                    class="inline-flex items-center justify-center w-3/6 h-12 px-6 font-semibold tracking-wide text-white transition duration-200 rounded shadow-md md:w-auto bg-yellow-400 hover:bg-yellow-700 focus:shadow-outline focus:outline-none">
                    Subscribe
                </a>
            </form>
            <p class="text-center mb-6 text-xs tracking-wide text-white">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.
            </p>
        </div>

        <a href="/" aria-label="Scroll down"
            class="flex items-center justify-center mb-20 mt-10 w-10 h-10 mx-auto text-white duration-300 transform border border-gray-400 rounded-full hover:text-teal-accent-400 hover:border-teal-accent-400 hover:shadow hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
                <path
                    d="M10.293,3.293,6,7.586,1.707,3.293A1,1,0,0,0,.293,4.707l5,5a1,1,0,0,0,1.414,0l5-5a1,1,0,1,0-1.414-1.414Z">
                </path>
            </svg>
        </a>

    </div>



    <div class="text-center py-10">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis sint quae cum dolor dignissimos consectetur,
            facilis odit inventore quam.
        </p>
    </div>



    <div class="px-4 py-6 m-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
            @foreach ($posts as $post)
                <div class="overflow-hidden transition-shadow duration-300 bg-white rounded shadow-sm">
                    <img src="{{ asset('images/' . $post->image_path) }}" class="object-cover w-full h-64" alt="" />
                    <div class="shadow-inner p-5 border border-t-0">
                        <p class="mb-3 text-xs font-semibold tracking-wide uppercase">
                            <a href="/" class="transition-colors duration-200 text-blue-900 hover:text-purple-700"
                                aria-label="Category" title="traveling">Gaming</a>
                            <span class="text-gray-600">
                                // {{ date('jS M Y', strtotime($post->updated_at)) }}
                            </span>
                        </p>
                        <a href="/" aria-label="Category" title="Visit the East"
                            class="inline-block mb-3 text-2xl font-bold leading-5 transition-colors duration-200 hover:text-purple-700">
                            {{ $post->title }}
                        </a>
                        <p class="truncate-3 mb-2 text-gray-700">
                            {{ $post->description }}
                        </p>
                        <a href="/blog/{{ $post->slug }}" aria-label=""
                            class="inline-flex items-center font-semibold transition-colors duration-200 text-purple-400 hover:text-purple-800">
                            Read more
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="h-40 background-image mt-10">
    </div>
@endsection
