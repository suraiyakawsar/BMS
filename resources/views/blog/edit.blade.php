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
            Edit Post
        </div>

        <form action="/blog/{{ $post->slug }}" method="POST" enctype="multipart/form-data">

            <button type="submit"
                class="py-3 px-4 rounded-3xl shadow-inner border-yellow-800 bg-yellow-500 uppercase bg-transparent text-gray-100 text-base font-bold transition duration-200 md:w-auto hover:bg-yellow-700 focus:shadow-outline focus:outline-none tracking-wide leading-normal cursor-pointer">
                Update Post
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
                        class="w-auto inline-block py-3 px-4 rounded-3xl shadow-inner border-teal-800 bg-red-700 uppercase bg-transparent text-gray-100 text-base font-bold transition duration-200 md:w-auto tracking-wide leading-normal">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-3/4 m-auto pt-10">
        <!-- csrf token - cross site request forgery - needs to be added in case one website pretends to be another (saves you from hijackers) -->
        @csrf
        <!--This will transfer the post method I added to the form to a put request-->
        @method('PUT')

        <input type="text" name="title" value="{{ $post->title }}"
            class="shadow-lg shadow-inner rounded-lg bg-transparent block border-b-2 border-gray-300 p-4 mb-3 w-full h-1/2 text-4xl outline-none focus:outline-none focus:ring focus:border-blue-300">

        <textarea name="description" placeholder="Description..."
            class="shadow-lg shadow-inner rounded-3xl border-b-2 border-gray-300 p-6 bg-transparent block w-full h-60 mb-10 text-xl outline-none focus:outline-none focus:ring focus:border-yellow-300">
                        {{ $post->description }}
                    </textarea>
        </form>
    </div>

@endsection
