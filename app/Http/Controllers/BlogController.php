<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = new User();
        $blogs =  Blog::latest()->get();
        return view('blogs.list_blog', compact(['blogs']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create_blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $validatedBlogInfo = Arr::except($request->validated(), ['image']);

        $image = $request->file('image');
        $image_name = BlogService::checkAndSaveImageIfExist($image);

        $remainingBlogInfo = [
            'slug' => Str::slug($request->title),
            'author_id' => 2,
            'published_at' =>  date('Y-m-d H:i:s'),
            'image' => $image_name,
        ];
        $AddNewBlog = Arr::collapse([$validatedBlogInfo, $remainingBlogInfo]);
        $createBlog = BlogService::addBlog($AddNewBlog);
        return back()->with('success', 'Blog Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        // return view('blogs.blog_details');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit_blog', compact(['blog']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        return $blog->update([
            'title' => 'welocm',
            'author_id' => 2,
            'image' => 'httpd://ashdajgsd',
            'slug' => 'slug_one',
            'summary' => 'summary one of us',
            'content' => 'we are we are who we are',
            'published_at' => date('ymd'),
        ]);
        // return view('blogs.blog_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // return view('blogs.blog_index');
    }
}
