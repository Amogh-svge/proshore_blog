<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    //  *need to be defined if primary key is changed
    // protected $primarykey = 'blog_id'

    // protected $cast = [
    //     'json' => 'array'
    // ];  defines what type of data to return from model
    public function comment(): HasMany
    {
        return $this->HasMany(Comment::class, 'blog_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}
