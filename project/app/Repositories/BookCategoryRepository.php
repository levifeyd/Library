<?php

namespace App\Repositories;

use App\Models\BooksCategory;

class BookCategoryRepository extends BaseRepository
{
    /**
     * Specify Model class name.
     */
    public function model()
    {
        return BooksCategory::class;
    }
}
