<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\CommentRequest;
use App\Repositories\BookCategoryRepository;
use App\Repositories\BookRepository;
use App\Services\BookCategoryService;
use App\Services\BookService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
class BookController extends Controller
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
        return view('dashboard',[
            'books'=>$this->bookService->getAllBooksWithPaginate(),
        ]);
    }

    public function create(): View {
        return view('books.add_new_book',
            ['bookCategories'=>$this->bookCategoryService->getAllBooksCategories()]);
    }

    public function store(BookStoreRequest $request):RedirectResponse {
        $this->bookService->store($request);
        return redirect()->back()->with('status','Книга добавлена!');
    }
    public function show($id): View
    {
        $booksWithComment = $this->bookService->showBookWithCommentsById($id);
        return view('books.show',[
            'book'=>$booksWithComment['book'],
            'comments'=>$booksWithComment['comments']
        ]);
    }

    public function edit($id): View {
        return view("books.edit_book",[
            "book"=>$this->bookService->showById($id),
            "bookCategories"=>$this->bookCategoryService->getAllBooksCategories(),
        ]);
    }
    public function update($id, BookStoreRequest $request): RedirectResponse
    {
        $this->bookService->update($id, $request);
        return redirect()->back()->with('status','Данные книги изменены!');
    }

    public function delete($id):RedirectResponse {
        $this->bookService->delete($id);
        return redirect()->route('dashboard')->with('status','Книга удалена!');
    }
    public function commentBook($id, CommentRequest $request):RedirectResponse {
        $this->bookService->commentBook($id, $request);
        return redirect()->back()->with('status','Комментарий добавлен!');
    }
}
