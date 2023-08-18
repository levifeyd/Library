<?php

namespace App\Services;

use App\Http\Requests\BookCategoryRequest;
use App\Repositories\BookCategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BookCategoryService
{
    private BookCategoryRepository $bookCategoryRepository;
    public function __construct(BookCategoryRepository $bookCategoryRepository) {
        $this->bookCategoryRepository = $bookCategoryRepository;
    }
    public function getAllBooksCategories(): Collection {
        return $this->bookCategoryRepository->all();
    }
    public function showById(int $id): Model {
        return $this->bookCategoryRepository->getById($id);
    }

    public function store(BookCategoryRequest $request): void {
        $this->bookCategoryRepository->create($request->all());
    }

    public function update(int $id, BookCategoryRequest $request): void {
        $this->bookCategoryRepository->updateById($id,$request->all());
    }

    public function delete(int $id): void {
        try {
            $this->bookCategoryRepository->deleteById($id);
        } catch (\Exception $e) {
        }
    }

}
