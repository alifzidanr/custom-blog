@extends('layouts.app')

@section('content')
<head>
  <!-- Add the Swiper CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<div class="swiper-container">
  <div class="swiper-wrapper">
    @foreach ($latestPosts as $index => $post)
      <div class="swiper-slide">
        <a href="/blog/{{ $post['slug'] }}">
          <img
            src="/post_images/{{ $post['post_image'] }}"
            alt="{{ $post['title'] }}"
            class="block w-full carousel-image"
          />
        </a>
      </div>
    @endforeach
  </div>

  <!-- Add Pagination -->
  <div class="swiper-pagination"></div>

  <!-- Add Navigation -->
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  // Initialize Swiper
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  // Automatically transition to the next slide every 5 seconds
  setInterval(() => {
    swiper.slideNext();
  }, 5000);
</script>

<div class="sm:grid grid-cols-1 md:grid-cols-2 gap-4 w-11/12 mx-auto py-8 border-b border-gray-200">
    <div class="m-auto text-left w-full">
        <h2 class="text-2xl font-extrabold text-gray-600">
            Penasaran dengan semua kegiatan KORMI Depok?
        </h2>
        <p class="py-4 text-gray-500 text-s">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
        </p>
        <p class="font-extrabold text-gray-600 text-s pb-4">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente magnam vero nostrum! Perferendis eos molestias porro vero. Vel alias.
        </p>
        <a href="/blog" class="uppercase bg-blue-500 text-gray-100 text-sm font-extrabold py-2 px-6 rounded-3xl transition duration-300 ease-in-out transform hover:shadow-lg hover:scale-105">
        Lihat Semua Post
    </a>

    </div>
</div>

<div class="text-center p-8 bg-black text-white">
    <h2 class="text-xl pb-4"> 
       Fokus KORMI Depok...
    </h2>
    <span class="font-extrabold block text-2xl py-1">
        Olahraga
    </span>
    <span class="font-extrabold block text-2xl py-1">
        Kepemudaan
    </span>
    <span class="font-extrabold block text-2xl py-1">
        Rekreasi
    </span>
    <span class="font-extrabold block text-2xl py-1">
        Kemasyarakatan
    </span>
</div>

<div class="text-center py-8">
    <span class="uppercase text-xs text-gray-400">
        Sobat Sehat
    </span>
    <h2 class="text-2xl font-bold py-6">
        Postingan Terakhir
    </h2>
    <div class="container mx-auto px-4">
        {{-- Display the six latest posts --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($latestPosts as $post)
                <a href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="card-link">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden card">
                        <img src="{{ asset('post_images/' . $post->post_image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover object-center">
                        <div class="p-4 card-content">
                            <h5 class="text-lg font-bold mb-2">{{ $post->title }}</h5>
                            <p class="text-gray-700 text-sm text-justify">{{ Illuminate\Support\Str::limit(strip_tags($post->description), 150) }}</p>
                            @if ($post->categories->isNotEmpty())
                                <div class="mt-2">
                                    @foreach ($post->categories as $category)
                                        <span class="inline-block bg-green-500 text-white px-2 py-1 rounded">{{ $category->name }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
<div class="flex items-center justify-center">
    <a href="/blog" class="uppercase bg-blue-500 text-gray-100 text-sm font-extrabold py-2 px-6 rounded-3xl transition duration-300 ease-in-out transform hover:shadow-lg hover:scale-105">
        Lihat Semua Post
    </a>
</div>


@endsection
