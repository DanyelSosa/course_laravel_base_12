<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\PutRequest;
use Symfony\Component\HttpKernel\HttpCache\Store;

class PostController extends Controller
{
        public function all()
    {
        return response()->json(Post::get());

        // $categories = Category::paginate(2);
        // return view('dashboard.category.index', compact('categories')); 
    }

    public function index()
    {
                return response()->json(Post::with('category')->paginate(10));

    }

  
    public function store(StoreRequest $request)
    {
                return response()->json(Post::create($request->validated())); 

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
                return response()->json($post);

    }

        public function slug(String $slug)
    {
        $category = Post::where('slug', $slug)->firstOrFail();
        return response()->json($category);
        // return view('dashboard.category.show', compact('category'));
    }


    public function update(PutRequest $request, Post $post)
    {
                $post->update($request->validated());
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
           $post->delete();
        return response()->json('ok');
    }
}
