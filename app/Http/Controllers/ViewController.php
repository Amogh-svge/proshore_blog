<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function homeView()
    {
        $blogs = Blog::latest()->with('user')->paginate(8);
        return view('pages.index', compact(['blogs']));
    }

    public function blogView($slug)
    {
        $blog = Blog::whereSlug($slug)->with('comment')->with('category')->first();
        if ($blog) {
            $blog_category = $blog->category->first();

            $similar_blogs = $blog_category->blog()
                ->whereNot('blog_id', $blog->id)
                ->with('user')
                ->limit(3)->latest()->get();
        }
        return view('pages.blog', compact(['blog', 'similar_blogs']));
    }

    public function viewAllBlog()
    {
        $blogs = Blog::latest()->with('user')->paginate(9);
        return view('pages.view_all_blogs', compact(['blogs']));
    }

    public function viewAllCategories($slug)
    {
        $blogs_of_category = Category::whereSlug($slug)->with('blog')->first();
        $paginate_blogs = $blogs_of_category->blog()->with('user')->paginate(9);
        return view('pages.view_all_categories', ['category' => $blogs_of_category, 'paginate_blogs' => $paginate_blogs]);
    }

    public function viewAdminIndexPage()
    {
        return view('admin.index');
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'query' => 'required|min:3|max: 255',
        ]);

        $search =   preg_replace('/\s+/', ' ', trim($validated['query']));

        $results = Blog::where('title', 'Like', '%' . $search . '%')
            ->orWhere('content', 'Like', '%' . $search . '%')->with('user')
            ->paginate(9);

        return view('common.search', compact('results'));
    }
}
