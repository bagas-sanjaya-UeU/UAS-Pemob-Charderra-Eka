<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // paginate posts
        $posts = Post::where('user_id', auth()->user()->id)->latest()->paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }
    
    public function create()
    {
        return view('dashboard.posts.create');
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


        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'image' => $path,
            'slug' => $request->slug,
            'category' => $request->category,
            'tags' => $request->tags,
        ]);

        
        return redirect()->route('dashboard.posts.index');
    }
    
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.posts.show', compact('post'));
    }
    
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('dashboard.posts.edit', compact('post'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required',
            'slug' => 'required|unique:posts,slug,'.$id,
        ]);
        
        $post = Post::findOrFail($id);
        
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($post->image);
            $image = $request->file('image');
            $path = $image->store('uploads/posts', 'public');
        } else {
            $path = $post->image;
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'image' => $path,
            'slug' => $request->slug,
            'category' => $request->category,
            'tags' => $request->tags,
        ]);
        
        return redirect()->route('dashboard.posts.index');
    }
    
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        
        return redirect()->route('dashboard.posts.index');
    }
}
