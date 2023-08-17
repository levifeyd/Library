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
    public function books() {
        return $this->hasMany(Book::class);
    }
}
