<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'author',
        'description',
        'rating',
        'cover',
        'comment'
    ];
    public $timestamps = false;
    public function getCategory() {
        return $this->belongsTo(BooksCategory::class, 'books_category_id');
    }
}
