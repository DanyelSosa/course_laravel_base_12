<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function all()
    {
        return response()->json(Post::get());
    }   

    public function index()
    {
        return response()->json(Post::with('category')->paginate(10));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'description' => 'required',
            'category_id' => 'required|integer|exists:categories,id',
            'posted' => 'required'
        ]);

        // fuerza que posted sea solo yes o no
        $validated['posted'] = $validated['posted'] === 'yes' ? 'yes' : 'no';

        return response()->json(Post::create($validated));
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }

    public function slug(String $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return response()->json($post);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'description' => 'required',
            'category_id' => 'required|integer|exists:categories,id',
            'posted' => 'required'
        ]);

        // fuerza que posted sea solo yes o no
        $validated['posted'] = $validated['posted'] === 'yes' ? 'yes' : 'no';

        $post->update($validated);

        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json('ok');
    }

    function upload(Request $request, Post $post){
        $data ['image'] = $filename = time() . '.'. $request->image->extension();

        $request->image->move(public_path('image'), $filename);

        $post->update($data);
        return response()->json($post);
    }





}
