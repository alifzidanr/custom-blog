@extends('layouts.app')

@section('content')
<div class="w-full mx-4 my-4 text-left"> 
<div class="py-8 px-4 md:px-8 flex items-center justify-between">
<h1 class="text-3xl font-bold mb-4">
            Buat Postingan
        </h1>
    </div>
    <div class="py-8 px-4 md:px-0 flex items-center justify-between">
    <a href="{{ url('/blog') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full ml-auto mr-10">
    &larr; Daftar Berita
</a>
    </div>
</div>

@if ($errors->any())
    <div class="w-full mx-auto mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-full mb-4 text-white bg-red-700 rounded-lg py-2 px-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-full mx-auto pt-4">
    <div class="bg-white rounded-lg shadow-lg p-8 md:p-12 mx-4">
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Title..." class="w-full mb-4 p-3 border border-gray-300 rounded-md">
                
            <div class="mb-4">
                <textarea name="description" id="description" class="w-full mb-4 p-3 border border-gray-300 rounded-md" rows="6"></textarea>
            </div>


            <div class="mb-4">
                <label for="post_image" class="block text-lg mb-2">Upload Header Image:</label>
                <input type="file" name="post_image" id="post_image" class="w-full py-2 px-3 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="tags" class="block text-lg mb-2">Select Tags:</label>
                <select name="tags[]" id="tags" class="w-full py-2 px-3 border border-gray-300 rounded-md" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="categories" class="block text-lg mb-2">Select Category:</label>
                <select name="categories[]" id="categories" class="w-full py-2 px-3 border border-gray-300 rounded-md" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="scheduled_at" class="block text-lg mb-2">Select Publish Date and Time:</label>
                <input type="text" name="scheduled_at" id="scheduled_at" class="w-full py-2 px-3 border border-gray-300 rounded-md" placeholder="Select Date and Time">
            </div>

            <button type="submit" class="bg-blue-500 text-white text-base font-semibold py-2 px-4 rounded-full hover:bg-blue-600">
    Buat Post
</button>

        </form>
    </div>
</div>

<script>
    flatpickr("#scheduled_at", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
    $(document).ready(function() {
  $('#description').summernote();
});
</script>
@endsection
