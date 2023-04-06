<?php

namespace App\Services;

use App\Models\Blog;
use Exception;

use function PHPUnit\Framework\throwException;

class BlogService
{

    public static function addBlog(array $AddNewBlog)
    {
        $blog_created = Blog::create($AddNewBlog);
        return $blog_created;
    }

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
}
