<?php

namespace App\Services;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Exception;

use function PHPUnit\Framework\throwException;

class CategoryService
{

    public static function addCategory($image, $validatedCategoryInfo)
    {
        if ($image) {
            $image_name = date('YmdHi') . uniqid() . $image->getClientOriginalName();
            $destinationPath = public_path('/storage/app_images/category_images/');
            $image->move($destinationPath, $image_name);
        }

        $remainingCategoryInfo = [
            'slug' => Str::slug($validatedCategoryInfo['title']),
            'image' => $image_name,
        ];

        $AddNewCategory = Arr::collapse([$validatedCategoryInfo, $remainingCategoryInfo]);
        $category_created = Category::create($AddNewCategory);
        return $category_created;
    }



    public static function updateCategory($category, $image, $validatedCategoryInfo)
    {
        $previousImageName = $category->image;

        if ($image) {
            unlink(public_path('storage/app_images/category_images/') . $previousImageName);
            $image_name = date('YmdHi') . uniqid() . $image->getClientOriginalName();
            $destinationPath = public_path('/storage/app_images/category_images/');
            $image->move($destinationPath, $image_name);
        }

        $remainingCategoryInfo = [
            'slug' => Str::slug($validatedCategoryInfo['title']),
            'image' => $image_name,
        ];

        $updateCategory = Arr::collapse([$validatedCategoryInfo, $remainingCategoryInfo]);
        $category_updated = $category->update($updateCategory);
        return $category_updated;
    }
}
