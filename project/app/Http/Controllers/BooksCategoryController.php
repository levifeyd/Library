<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCategoryRequest;
use App\Repositories\BookCategoryRepository;
use App\Services\BookCategoryService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class BooksCategoryController extends Controller
{
    private BookCategoryService $bookCategoryService;

    public function __construct()
    {
        $this->middleware('auth');
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

    public function edit(int $id): View|RedirectResponse
    {
        try {
            $bookCategory = $this->bookCategoryService->showById($id);
            return view('books_categories.edit')->with([
                'bookCategory'=>$this->bookCategoryService->showById($id)
            ]);
        } catch (Exception $exception) {
            return redirect()->route('dashboard')->with('status','Такой категории книг не существует!');
        }
    }
    public function update(BookCategoryRequest $request, int $id): RedirectResponse
    {
        try {
            $this->bookCategoryService->update($id, $request);
            return redirect()->back()->with('status', 'Категория книг изменена!');
        } catch (Exception $exception) {
            return redirect()->route('dashboard')->with('status','Такой категории книг не существует!');
        }

    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->bookCategoryService->delete($id);
            return redirect()->route('books_categories.index')->with('status','Категория книг удалена!');
        } catch (Exception $e) {
            return redirect()->route('books_categories.index')->with('status','Такой категории книг не существует!');
        }

    }
}
