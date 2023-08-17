<?php

namespace App\Repositories;


use App\Models\Book;

class BookRepository extends BaseRepository
{
    /**
     * Specify Model class name.
     */
    public function model()
    {
        return Book::class;
    }
}
