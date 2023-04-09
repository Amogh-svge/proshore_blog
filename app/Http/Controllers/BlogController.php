<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Support\Arr;


class BlogController extends Controller
{

    public function index()
    {
        $blogs =  Blog::latest()->get();
        return view('blogs.blog_list', compact(['blogs']));
    }


    public function create()
    {
        return view('blogs.blog_create');
    }



    public function store(BlogRequest $request)
    {
        $validatedBlogInfo = Arr::except($request->validated(), ['image']);

        $image = $request->file('image');
        $createBlog = BlogService::addBlog($image, $validatedBlogInfo);

        if ($createBlog)
            return redirect(route('blog.index'))->with('success', 'Blog Successfully Created');
        else
            return redirect(route('blog.index'))->with('failed', 'Failed To Create Blog ');
    }


    public function show(Blog $blog)
    {
        // return view('blogs.blog_details');
    }


    public function edit(Blog $blog)
    {
        return view('blogs.blog_edit', compact(['blog']));
    }



    public function update(BlogRequest $request, Blog $blog)
    {
        $validatedBlogInfo = Arr::except($request->validated(), ['image']);
        $image = $request->file('image');

        $updateBlog = BlogService::updateBlog($blog, $image, $validatedBlogInfo);
        if ($updateBlog)
            return redirect(route('blog.index'))->with('success', 'Blog Successfully Updated');
        else
            return redirect(route('blog.index'))->with('failed', 'Failed To Update Blog ');
    }


    public function destroy(Blog $blog)
    {
        if ($blog->delete())
            return back()->with('success', 'Blog Successfully Deleted');
        else
            return back()->with('failed', 'Failed To  Successfully Updated');
    }
}
