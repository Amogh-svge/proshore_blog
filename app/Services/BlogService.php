<?php

namespace App\Services;

use App\Models\Blog;
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

    public static function checkAndUpdateImageIfExist($image, $previousImagePath)
    {
        try {
            if ($image) {
                unlink($previousImagePath);
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

        $AddNewBlog = Arr::collapse([$validatedBlogInfo, $remainingBlogInfo]);
        $blog_created = Blog::create($AddNewBlog);
        return $blog_created;
    }



    public static function updateBlog($blog, $image, $validatedBlogInfo)
    {
        $previousImagePath = url('/storage/blog_images/' . $blog->image);
        $image_name = BlogService::checkAndUpdateImageIfExist($image, $previousImagePath);

        $remainingBlogInfo = [
            'slug' => Str::slug($validatedBlogInfo['title']),
            'author_id' => 2,
            'published_at' =>  date('Y-m-d H:i:s'),
            'image' => $image_name,
        ];
        $updateBlog = Arr::collapse([$validatedBlogInfo, $remainingBlogInfo]);

        $blog_updated = $blog->update($updateBlog);
        return $blog_updated;
    }
}
