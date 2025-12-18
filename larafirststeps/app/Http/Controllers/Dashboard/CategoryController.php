<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use Illuminate\Http\Request;

use Symfony\Component\HttpKernel\HttpCache\Store;

use function Symfony\Component\String\u;
use function Symfony\Component\Translation\t;

use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use PhpParser\Node\Scalar\String_;

class CategoryController extends Controller
{

    public function all()
    {
        return response()->json(Category::get());

        // $categories = Category::paginate(2);
        // return view('dashboard.category.index', compact('categories')); 
    }
    public function index()
    {
        return response()->json(Category::paginate(10));

        // $categories = Category::paginate(2);
        // return view('dashboard.category.index', compact('categories')); 
    }
 
   

    public function store(StoreRequest $request)
    {

        return response()->json(Category::create($request->validated())); 
        //Category::create($request->validated());        
        // return to_route('category.index')->with('status', 'Category created successfully!');
   
    }

 
    public function show(Category $category)
    {

        return response()->json($category);
        // return view('dashboard.category.show', compact('category'));
    }
    // public function slug(String $slug)
    public function slug(Category $category)
    {
        // $category = Category::where('slug', $slug)->firstOrFail();
        return response()->json($category);
        // return view('dashboard.category.show', compact('category'));
    }


    

    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
        // $category->update($request->validated());
        // return to_route('category.index')->with('status', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {

        $category->delete();
        return response()->json('ok');

            // $category->delete();
            // return to_route('category.index')->with('status', 'Category deleted');


    }
}
