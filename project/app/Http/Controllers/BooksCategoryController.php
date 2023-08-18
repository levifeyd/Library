<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCategoryRequest;
use App\Models\BooksCategory;
use App\Repositories\BookCategoryRepository;
use App\Repositories\BookRepository;
use App\Services\BookCategoryService;
use App\Services\BookService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;
use Illuminate\Contracts\View\View;
use function Symfony\Component\String\b;

class BooksCategoryController extends Controller
{
    private BookService $bookService;
    private BookCategoryService $bookCategoryService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->bookService = (new BookService(new BookRepository()));
        $this->bookCategoryService = (new BookCategoryService(new BookCategoryRepository()));
    }

    public function index(): View
    {
        return view('books_categories.index',[
            'booksCategories'=>$this->bookCategoryService->getAllBooksCategories(),
        ]);
    }

    public function create(): View
    {
        return view('books_categories.create');
    }

    public function store(BookCategoryRequest $request): RedirectResponse
    {
        $this->bookCategoryService->store($request);
        return redirect()->back()->with('status', 'Категория книг добавлена');
    }

    public function edit(int $id): View
    {
        return view('books_categories.edit')->with([
            'bookCategory'=>$this->bookCategoryService->showById($id)
        ]);
    }
    public function update(BookCategoryRequest $request, int $id): RedirectResponse
    {
        $this->bookCategoryService->update($id, $request);
        return redirect()->back()->with('status', 'Категория книг изменена!');
    }

    public function destroy(int $id)
    {
        $this->bookCategoryService->delete($id);
        return redirect()->route('books_categories.index')->with('status','Категория книг удалена!');
    }
}
