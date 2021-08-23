@extends('layouts.app')

@section('content')
    <div class="mx-auto pt-32 pb-5 flex flex-row justify-between w-3/4 text-center">
        <div
            class="flex flex-row gap-3 overflow-auto outline-none text-5xl leading-10 m-13 overflow-y-hidden resize-none mx-0 my-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#000000"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
            </svg>
            Create Post
        </div>

        <form action="/blog" method="POST" enctype="multipart/form-data">

            <button type="submit"
                class="py-3 px-4 rounded-3xl shadow-inner border-yellow-800 bg-yellow-500 uppercase bg-transparent text-gray-100 text-base font-bold transition duration-200 md:w-auto hover:bg-yellow-700 focus:shadow-outline focus:outline-none tracking-wide leading-normal cursor-pointer">
                Submit Post
            </button>
    </div>

    <!--
        Check what the error is
        -->
    @if ($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li
                        class="w-auto inline-block py-3 px-4 rounded-3xl shadow-inner border-red-800 bg-red-700 uppercase bg-transparent text-gray-100 text-base font-bold transition duration-200 md:w-auto tracking-wide leading-normal">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-3/4 m-auto pt-10">
        <form action="/blog" method="POST" enctype="multipart/form-data" class="">
            <!-- csrf token - cross site request forgery - needs to be added in case one website pretends to be another (saves you from hijackers) -->
            @csrf

            <input type="text" name="title" placeholder="Title..."
                class="shadow-lg shadow-inner rounded-lg bg-transparent block border-b-2 border-gray-300 p-4 mb-3 w-full h-1/2 text-4xl outline-none focus:outline-none focus:ring focus:border-yellow-300">

            <textarea name="description" placeholder="Description..."
                class="shadow-lg shadow-inner rounded-3xl border-b-2 border-gray-300 p-6 bg-transparent block w-full h-60 text-xl outline-none focus:outline-none focus:ring focus:border-yellow-300"></textarea>

            <div class="w-1/6 bg-gray-lighter pt-10">
                <label
                    class="flex flex-col items-center mb-10 px-4 py-3 tracking-wide rounded-3xl shadow-inner border-yellow-800 bg-yellow-500 uppercase bg-transparent text-gray-100 text-xl font-bold transition duration-200 md:w-auto hover:text-white hover:bg-yellow-700 focus:shadow-outline focus:outline-none cursor-pointer">
                    <span class="text-base leading-normal">
                        Select a file
                    </span>
                    <input type="file" name="image" class="hidden">
                </label>
            </div>
        </form>
    </div>
@endsection
