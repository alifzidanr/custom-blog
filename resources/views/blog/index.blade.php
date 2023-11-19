@extends('layouts.app')

@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>



<div class="max-w-full mx-auto"> <!-- Increased max-width for a wider search bar -->
    <div class="bg-white p-4 rounded shadow-md">
        <form action="{{ route('blog.index') }}" method="GET">
            <div class="mb-3">
                <div class="flex items-stretch"> <!-- Removed unnecessary width classes -->
                <input
    type="search"
    class="relative m-0 flex-1 rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary font-bold"
    placeholder="Cari Judul Berita..."
    aria-label="Search"
    aria-describedby="button-addon1"
    name="title"
    id="title"
    value="{{ request('title') }}"
/>

                    <!-- Search button -->
                    <button
      class="relative z-[2] rounded-r border-2 border-primary px-6 py-2 text-xs font-medium uppercase text-primary transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
      type="submit"
      id="button-addon3"
      data-te-ripple-init>
      Cari
    </button>
                </div>
            </div>
        </form>
        
        <div class="flex justify-center space-x-4">
<div class="relative" data-te-dropdown-ref>
<button class="flex items-center whitespace-nowrap rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] motion-reduce:transition-none dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
    type="button" id="dropdownMenuButton1" data-te-dropdown-toggle-ref aria-expanded="false" data-te-ripple-init data-te-ripple-color="light">
   Kecamatan
    <span class="ml-2 w-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
            <path fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                clip-rule="evenodd" />
        </svg>
    </span>
</button>
    <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
    aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
    @foreach($tags as $tag)
    <li>
        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-black hover:bg-gray-200 active:text-gray-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-gray-600"
            href="{{ route('blog.index', ['tag' => $tag->id]) }}" data-te-dropdown-item-ref>{{ $tag->name }}</a>
    </li>
    @endforeach
</ul>
</div>

<div class="relative" data-te-dropdown-ref>
<button class="flex items-center whitespace-nowrap rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] motion-reduce:transition-none dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
    type="button" id="dropdownMenuButton2" data-te-dropdown-toggle-ref aria-expanded="false" data-te-ripple-init data-te-ripple-color="light">
    Kategori
    <span class="ml-2 w-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
            <path fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                clip-rule="evenodd" />
        </svg>
    </span>
</button>
    <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
    aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
    @foreach($categories as $category)
    <li>
        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-black hover:bg-gray-200 active:text-gray-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-gray-600"
            href="{{ route('blog.index', ['category' => $category->id]) }}" data-te-dropdown-item-ref>{{ $category->name }}</a>
    </li>
    @endforeach
</ul>


</div>

</div>
<div class="flex justify-center space-x-4">
<a 
    href="/blog"
    class="mt-4 sm:mt-0 uppercase bg-black text-white text-xs font-extrabold py-3 px-6 rounded-lg">
    Refresh
</a>



</div>


</div>

    </div>
</div>


   <!-- Flash messages -->
   @if (session()->has('message') || session()->has('filter_message'))
        <div class="w-4/5 m-auto mt-4 text-center">
            @if (session()->has('message'))
                <p class="w-full mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 font-bold">
                    {{ session()->get('message') }}
                </p>
            @endif

            @if (session()->has('filter_message'))
                <p class="w-full mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 font-bold">
                    {{ session()->get('filter_message') }}
                </p>
            @endif
        </div>
    @endif


    <!-- <div class="w-4/5 m-auto text-center py-2 border-b border-gray-200">
    <h1 class="text-3xl md:text-4xl font-bold py-2">Daftar Berita</h1>
</div> -->


<!-- @if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif -->

@if (Auth::check())
<div class="pt-10 w-4/5 m-auto">
    <a 
        href="/blog/create"
        class="bg-blue-500 uppercase text-gray-100 text-xs font-extrabold py-3 px-5 rounded-md">
        Buat Postingan
    </a>
</div>

@endif

<div class="container mx-auto mt-6 sm:mt-10">
    @foreach ($posts as $post)
        <div class="max-w-6xl mx-auto bg-white shadow-md rounded-md overflow-hidden my-4 sm:my-8">
            <div class="sm:grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-8">
                <div class="flex items-center justify-center w-full">
                    <a href="/blog/{{ $post->slug }}"> <!-- Wrap the image in an anchor tag with the link to the post -->
                    <div class="w-1080 h-566 overflow-hidden"> <!-- Set the width and height for the container -->
    <img src="{{ asset('post_images/' . $post->post_image) }}" alt="{{ $post->title }}" class="post-image object-cover w-full h-full">
</div>


                    </a>
                </div>
                <div class="p-4 sm:p-6">
                    <h2 class="text-gray-700 font-bold text-xl sm:text-2xl mb-2 sm:mb-4">
                        {{ $post->title }}
                    </h2>

                    <p class="text-sm text-gray-500 mt-2 sm:mt-4">
    By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
</p>


                    @if ($post->tags->isNotEmpty())
    <div class="mt-4 sm:mt-4">
        Lokasi:
        @foreach ($post->tags as $tag)
            <span class="px-2 py-1 bg-gray-200 text-sm md:text-base text-gray-800 rounded-full mr-2">{{ $tag->name }}</span>
        @endforeach
    </div>
@endif

@if ($post->categories->isNotEmpty())
    <div class="mt-4 sm:mt-4">
        Kategori:
        @foreach ($post->categories as $category)
            <span class="px-2 py-1 bg-gray-200 text-sm md:text-base text-gray-800 rounded-full mr-2">{{ $category->name }}</span>
        @endforeach
    </div>
@endif

<div class="mt-4 sm:mt-4">
    Jadwal:
    <span class="px-2 py-1 bg-gray-200 text-sm md:text-base text-gray-800 rounded-full">
        {{ $post->scheduled_at_formatted }}
    </span>
</div>

    <div class="mt-4 sm:mt-4">
        <p class="text-gray-700 text-base text-justify">{{ Illuminate\Support\Str::limit(strip_tags($post->description), 150) }}</p>
    </div>

                    <div class="mt-3 sm:mt-4 text-center">
  <a href="/blog/{{ $post->slug }}" class="bg-blue-500 text-gray-100 btn rounded-md">
    Baca
  </a>
</div>

<!-- Second Button -->
@if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
  <div class="flex justify-end space-x-2 mt-2 sm:mt-4">
    <a href="/blog/{{ $post->slug }}/edit" class="bg-gray-300 text-gray-700 btn rounded-md hover:bg-gray-400 transition duration-300 ease-in-out">
      Edit
    </a>

    <!-- Third Button -->
    <form action="/blog/{{ $post->slug }}" method="POST">
      @csrf
      @method('delete')

      <button class="bg-red-500 text-white btn rounded-md hover:bg-red-600 transition duration-300 ease-in-out" type="submit">
        Delete
      </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>



    <div class="mt-10">
        {{ $posts->links() }}
    </div>
</div>

<script>
  
  document.addEventListener('DOMContentLoaded', function () {
    const dropdowns = document.querySelectorAll('[data-te-dropdown-ref]');

    dropdowns.forEach(function (dropdown) {
        const toggleButton = dropdown.querySelector('[data-te-dropdown-toggle-ref]');
        const dropdownMenu = dropdown.querySelector('[data-te-dropdown-menu-ref]');

        toggleButton.addEventListener('click', function () {
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function (event) {
            if (!dropdown.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });

});


</script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>


@endsection