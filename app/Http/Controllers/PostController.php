<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", compact("posts"));
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            "title" => "required",
            "content" => "required",
        ]);

        Post::create([
            "title" => $validated["title"],
            "content" => $validated["content"],
            "published_at" => now()
        ]);
        return redirect("/posts");
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view("posts.edit", compact("post"));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "title" => "required",
            "content" => "required",
        ]);

        $post = Post::findOrFail($id);
        $post->update($validated);
        return redirect("/posts");
    }
    public function delete($id)
    {
        $post = Post::findOrFail($id)->delete();
        return redirect("/posts");
    }

}
