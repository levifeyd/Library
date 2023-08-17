<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'author',
        'description',
        'rating',
        'cover',
        'books_category_id'
    ];
    public $timestamps = false;
    public function category():BelongsTo
    {
        return $this->belongsTo(BooksCategory::class, 'books_category_id');
    }

    public function comments(): BelongsToMany {
        return $this->belongsToMany(Comment::class);
    }
}
