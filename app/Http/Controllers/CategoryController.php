<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  Category::all();
        return view('category.index', compact('categories'));
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
    public function store(CategoryRequest $request)
    {
        $validatedCategoryInfo = Arr::except($request->validated(), ['image']);

        $image = $request->file('image');
        $createBlog = CategoryService::addCategory($image, $validatedCategoryInfo);

        if ($createBlog)
            return redirect(route('category.index'))->with('success', 'Category Successfully Created');
        else
            return redirect(route('category.index'))->with('failed', 'Failed To Create Category ');
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
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $validatedCategoryInfo = Arr::except($request->validated(), ['image']);
        $image = $request->file('image');

        $update_category = CategoryService::updateCategory($category, $image, $validatedCategoryInfo);
        if ($update_category)
            return redirect(route('category.index'))->with('success', 'Category Successfully Updated');
        else
            return redirect(route('category.index'))->with('failed', 'Failed To Update category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->delete())
            return back()->with('success', 'Category Successfully Deleted');
        else
            return back()->with('failed', 'Failed To Delete Category');
    }
}
