<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Services\BlogService;
use Illuminate\Support\Arr;


class BlogController extends Controller
{

    public function index()
    {
        $blogs =  Blog::latest()->with('user')->get();
        return view('blogs.index', compact(['blogs']));
    }


    public function create()
    {
        $category = Category::all();
        return view('blogs.create', compact('category'));
    }


    public function store(BlogRequest $request)
    {
        $validatedBlogInfo = $request->validated();
        $validatedBlogInfo['image'] = $request->file('image');

        $createBlog = BlogService::addBlog($validatedBlogInfo['image'], $validatedBlogInfo);
        $createBlog->category()->attach($validatedBlogInfo['category']);

        if ($createBlog)
            return redirect(route('blogs.index'))->with('success', 'Blog Successfully Created');
        else
            return redirect(route('blogs.index'))->with('failed', 'Failed To Create Blog ');
    }


    public function show(Blog $blog)
    {
        // return view('blogs.blog_details');
    }


    public function edit(Blog $blog)
    {
        $category = Category::all();
        return view('blogs.edit', compact(['blog', 'category']));
    }



    public function update(BlogRequest $request, Blog $blog)
    {
        $validatedBlogInfo = $request->validated();
        $validatedBlogInfo['image'] = $request->file('image');

        $updateBlog = BlogService::updateBlog($blog, $validatedBlogInfo['image'], $validatedBlogInfo);

        if ($updateBlog)
            return redirect(route('blogs.index'))->with('success', 'Blog Successfully Updated');
        else
            return redirect(route('blogs.index'))->with('failed', 'Failed To Update Blog ');
    }


    public function destroy(Blog $blog)
    {
        if ($blog->delete()) {
            $blog->category()->detach();
            return back()->with('success', 'Blog Successfully Deleted');
        } else
            return back()->with('failed', 'Failed To Successfully Updated');
    }
}
