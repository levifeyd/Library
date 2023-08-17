<?php

namespace App\Services;

use App\Repositories\BookCategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BookCategoryService
{
    private BookCategoryRepository $bookCategoryRepository;
    public function __construct(BookCategoryRepository $bookCategoryRepository)
    {
        $this->bookCategoryRepository = $bookCategoryRepository;
    }
    public function getAllBooksCategories(): Collection
    {
        return $this->bookCategoryRepository->all();
    }
    public function showById($id): Model {
        $this->bookCategoryRepository->getById($id);
    }
}
