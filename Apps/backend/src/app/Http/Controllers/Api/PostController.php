<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
      try {
        $posts = Post::all();

        // image url
        $posts->map(function ($post) {
          $post->image = url('storage/' . $post->image);
          $post->user = $post->user;
        });


        return response()->json([
          'success' => true,
          'message' => 'Post List',
          'data' => $posts
        ], 200);
      } catch (\Exception $e) {
        return response()->json([
          'success' => false,
          'message' => $e->getMessage()
        ], 500);
      }
    }
    
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'data' => $post
            ], 200);
        }
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required',
            'slug' => 'required|unique:posts',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('uploads/posts', 'public');
        }
        
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'image' => $path,
            'slug' => $request->slug,
            'category' => $request->category,
            'tags' => $request->tags,
        ]);
        
        return response()->json($post, 201);
    }
    
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        }
        
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required',
            'slug' => 'required|unique:posts,slug,' . $id,
        ]);
        
        $path = $post->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('uploads/posts', 'public');
        }
        
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $path;
        $post->slug = $request->slug;
        $post->category = $request->category;
        $post->tags = $request->tags;
        $post->save();

        return response()->json($post, 200);

    
    }
}
