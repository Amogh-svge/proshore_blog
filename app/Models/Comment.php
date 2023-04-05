<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    // protected $keystring 

    // public function user()
    // {
    //     return $this->hasOne(User::class);
    // }

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function user(): HasOneThrough
    {
        return $this->HasOneThrough(User::class, Blog::class, 'id', 'id');
    }
}
