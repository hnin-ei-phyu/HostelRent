<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(8);
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create(
            [
                'name'=>$request->name,
            ]
        );
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category=Category::findOrFail($id);
        $category->name=$request->name;
        $category->save();

        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index');
    }

    public function search(Request $request){

        $str=$request->search;

        $categories = Category::where('name', 'LIKE', '%' . $str . '%')
                     ->paginate(8);
        $categories->appends(['categories' => $str]);

        return view('category.index',compact('categories'));

    }
}
