@extends('layouts.app')

@section('content')
<div class="w-11/12 m-auto text-left">
    <div class="py-8 sm:py-15">
        <h1 class="text-2xl sm:text-4xl">{{ $post->title }}</h1>
    </div>
</div>

<div class="w-11/12 m-auto text-left">
    <a href="{{ url('/blog') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full float-right mt-2 text-sm sm:text-base">
        &larr; Daftar Berita
    </a>
</div>

<div class="w-11/12 m-auto pt-10 sm:pt-20">
    <span class="text-gray-500 text-xs sm:text-sm">
        Oleh <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Dibuat pada {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <div class="mt-2 sm:mt-4">
        @if ($post->tags->isNotEmpty())
            <div class="mb-2">
                Diselenggarakan di:
                @foreach ($post->tags as $tag)
                    <span class="d-inline-block px-2 py-1 bg-gray-200 text-gray-800 rounded-full mr-2 mb-2 text-xs sm:text-sm">{{ $tag->name }}</span>,
                @endforeach
            </div>
        @endif
        <div class="mb-2 mt-2 sm:mt-4">
            Pada
            <span class="d-inline-block px-2 py-1 bg-gray-200 text-gray-800 rounded-full text-xs sm:text-sm">
                {{ $post->scheduled_at_formatted }}
            </span>
        </div>
    </div>

    <!-- Display post image -->
    <!-- <img src="{{ url('post_images/' . $post->post_image) }}" alt="Post Image" class="my-8 w-full h-auto"> -->

    <p class="text-sm sm:text-base text-gray-700 mt-4 leading-6 sm:leading-7 font-light text-justify">
    {!! $post->description !!}
</p>

</div>

<div class="w-11/12 m-auto pt-10 sm:pt-20">
    @if ($post->categories->isNotEmpty())
        <div class="mt-4">
            Kategori    :
            @foreach ($post->categories as $category)
                <span class="px-2 py-1 bg-gray-200 text-gray-800 rounded-full mr-2 text-xs sm:text-sm">{{ $category->name }}</span>
            @endforeach
        </div>
    @endif
</div>

@endsection
