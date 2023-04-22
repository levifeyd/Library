<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BooksCategory extends Model
{
    protected $fillable = [
        'title',
        'slug',
    ];
    public $timestamps = false;
    public function getBook() {
        return $this->hasMany(Book::class,'books_category_id');
    }
}
