<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048', // 2MB max
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];

         if ($request->hasFile('image')) {
             $imagePath = $request->file('image')->store('featured_images', 'public');
             $post->featured_image = $imagePath;
        }


        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $filename = time() . '.' . $image->getClientOriginalExtension();

        //     // Resize image to 600x800 (you can change this)
        //     $resizedImage = Image::make($image)->resize(600, 800, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     })->encode();

        //     // Store it
        //     Storage::put("public/posts/$filename", $resizedImage);

        //     $imagePath = "posts/$filename";
        // }


        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['featured_image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }
}