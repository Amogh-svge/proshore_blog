<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Exception;

use function PHPUnit\Framework\throwException;

class BlogService
{
    public static function checkAndSaveImageIfExist($image)
    {
        try {
            if ($image) {
                $image_name = date('YmdHi') . uniqid() . $image->getClientOriginalName();
                $destinationPath = public_path('/storage/blog_images/');
                $image->move($destinationPath, $image_name);
                return $image_name;
            }
        } catch (Exception $err) {
            return $err->getMessage();
        }
    }

    public static function checkAndUpdateImageIfExist($image, $previousImageName)
    {
        try {
            if ($image) {
                // unlink(public_path('storage/blog_images/') . $previousImageName);
                $image_name = date('YmdHi') . uniqid() . $image->getClientOriginalName();
                $destinationPath = public_path('/storage/blog_images/');
                $image->move($destinationPath, $image_name);
                return $image_name;
            }
        } catch (Exception $err) {
            return $err->getMessage();
        }
    }

    public static function addBlog($image, $validatedBlogInfo)
    {

        $image_name = BlogService::checkAndSaveImageIfExist($image);
        $remainingBlogInfo = [
            'slug' => Str::slug($validatedBlogInfo['title']),
            'author_id' => User::all()->random()->id,
            'published_at' =>  date('Y-m-d H:i:s'),
            'image' => $image_name,
        ];

        $validatedBlogInfo += $remainingBlogInfo;
        $AddNewBlog = Arr::except($validatedBlogInfo, ['category']);
        $blog_created = Blog::create($AddNewBlog);
        return $blog_created;
    }



    public static function updateBlog($blog, $image, $validatedBlogInfo)
    {
        $previousImageName = $blog->image;
        $image_name = BlogService::checkAndUpdateImageIfExist($image, $previousImageName);

        $remainingBlogInfo = [
            'slug' => Str::slug($validatedBlogInfo['title']),
            'author_id' => $blog->author_id,
            'published_at' =>  date('Y-m-d H:i:s'),
            'image' => $image_name,
        ];

        $validatedBlogInfo += $remainingBlogInfo;
        $updateBlog = Arr::except($validatedBlogInfo, ['category']);
        $blog_updated = $blog->update($updateBlog);
        return $blog_updated;
    }
}
