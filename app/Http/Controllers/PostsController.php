<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;


class PostsController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $query = Post::orderBy('updated_at', 'DESC');

    // Filter by title if the 'title' parameter is present in the request
    if ($request->has('title')) {
        $query->where('title', 'like', '%' . $request->input('title') . '%');
    }

    if ($request->has('tag')) {
        $tag = Tag::find($request->input('tag'));
        if ($tag) {
            $query->whereHas('tags', function ($query) use ($tag) {
                $query->where('tags.id', $tag->id);
            });
            session()->flash('filter_message', 'Berita Daerah ' . $tag->name);
        }
    }

    if ($request->has('category')) {
        $category = Category::find($request->input('category'));
        if ($category) {
            $query->whereHas('categories', function ($query) use ($category) {
                $query->where('categories.id', $category->id);
            });
            session()->flash('filter_message', 'Berita Kategori ' . $category->name);
        }
    }

    // Use paginate instead of get to enable pagination
    $posts = $query->paginate(6);

    // Format the scheduled_at attribute for each post
    $posts->each(function ($post) {
        $post->scheduled_at_formatted = $post->scheduled_at ? $post->scheduled_at->format('F j, Y H:i') : null;
    });

    // Get the selected tag and category from the request
    $selectedTag = $request->input('tag');
    $selectedCategory = $request->input('category');

    // Get all available tags and categories
    $tags = Tag::all();
    $categories = Category::all();

    return view('blog.index')->with([
        'posts' => $posts,
        'selectedTag' => $selectedTag,
        'selectedCategory' => $selectedCategory,
        'tags' => $tags,
        'categories' => $categories,
    ]);

}

/**
     * Handle CKEditor image uploads.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
    
        return view('blog.create', ['tags' => $tags, 'categories' => $categories]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'post_image' => 'required|image|mimes:jpg,png,jpeg|max:5048',
        ]);
    
        // Handle the header image upload
        if ($request->hasFile('post_image')) {
            $newPostImageName = uniqid() . '-' . $request->title . '.' . $request->post_image->getClientOriginalExtension();
            $request->post_image->move(public_path('post_images'), $newPostImageName);
        } else {
            // Handle case where no file is uploaded (optional)
            return redirect('/blog/create')->with('error', 'Please upload a post image.');
        }
    
        
        // Create the post
        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            // 'image_path' => $newImageName,
            'post_image' => $newPostImageName,
            'user_id' => auth()->user()->id,
            'scheduled_at' => $request->input('scheduled_at'),
        ]);
    
        // Attach selected tags to the post
        if ($request->has('tags')) {
            $tags = $request->input('tags');
            $post->tags()->attach($tags);
        }

        // Attach selected categories to the post
        if ($request->has('categories')) {
            $categories = $request->input('categories');
            $post->categories()->attach($categories);
        }

    
        return redirect('/blog')->with('message', 'Your post has been added!');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blog.show')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
{
    $post = Post::where('slug', $slug)->first();
    $tags = Tag::all();
    $categories = Category::all();

    return view('blog.edit', [
        'post' => $post,
        'tags' => $tags,
        'categories' => $categories,
    ]);
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    // Find the post by slug
    $post = Post::where('slug', $slug)->firstOrFail();

    // Update the post fields
    $post->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
        'user_id' => auth()->user()->id,
        'scheduled_at' => $request->input('scheduled_at'),
    ]);

    // Sync the tags and categories for the post
    if ($request->has('tags')) {
        $tags = $request->input('tags');
        $post->tags()->sync($tags);
    } else {
        $post->tags()->detach();
    }

    if ($request->has('categories')) {
        $categories = $request->input('categories');
        $post->categories()->sync($categories);
    } else {
        $post->categories()->detach();
    }

    return redirect('/blog')
        ->with('message', 'Your post has been updated!');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')
            ->with('message', 'Your post has been deleted!');
    }
}

