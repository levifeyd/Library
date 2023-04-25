<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BooksCategory;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index() {
        $books = Book::paginate(10);
        return view('dashboard',[
            'books'=>$books,
        ]);
    }

    public function create() {
        $bookCategories = BooksCategory::all();
        return view('books.add_new_book')->with(['bookCategories'=>$bookCategories]);
    }

    public function store(Request $request) {
        $request->validate([
            "title"=>'required|string|max:255',
            "slug"=>'required|string|',
            "author"=>'required|string|',
            "description"=>'required|string|',
            "rating"=>'required|numeric|between:1,10',
            "cover"=>'required',
            "books_category_id"=>'required',
        ]);
        $input = $request->all();
        $input['cover'] = str_replace("public/covers", "", $request->file("cover")->store("public/covers"));
        Book::query()->create($input);
        return redirect()->back()->with('status','Книга добавлена!');
    }
    public function show($id)
    {
        $book = Book::query()->findOrFail($id);
        $commentsIds = DB::table('books_comments')->where('book_id', $id)
            ->pluck('comment_id')->toArray();
        $comments = Comment::query()->whereIn('id', $commentsIds)->get();
        return view('books.show',[
            'book'=>$book,
            'comments'=>$comments
        ]);
    }

    public function edit($id) {
        $book = Book::query()->findOrFail($id);
        $bookCategories = BooksCategory::all();
        return view("books.edit_book",[
            "book"=>$book,
            "bookCategories"=>$bookCategories
        ]);
    }
    public function update($id, Request $request) {
        $request->validate([
            "title"=>'required|string|max:255',
            "slug"=>'required|string|',
            "author"=>'required|string|',
            "description"=>'required|string|',
            "rating"=>'required|integer|',
            "cover"=>'required',
            "books_category_id"=>'required',
        ]);
        $input = $request->all();
        $input['cover'] = str_replace("public/covers", "", $request->file("cover")->store("public/covers"));

        $book = Book::query()->findOrFail($id);
        $book->update($input);
        return redirect()->back()->with('status','Данные книги изменены!');
    }

    public function delete($id) {
        $book = Book::query()->findOrFail($id);
        $book->delete();
        Storage::disk('public')->delete('covers'.$book->cover);
        return redirect()->route('dashboard')->with('status','Книга удалена!');
    }
    public function commentBook($id, Request $request) {
        $request->validate(['text'=>'required']);
        $book = Book::query()->findOrFail($id);
        $comment = Comment::query()->create($request->all())->pluck('id')->toArray();
        $commentId = end($comment);
        $books_comment = DB::table('books_comments')->insert(['book_id' => $id, 'comment_id' => $commentId]);
        return redirect()->back()->with('status','Комментарий добавлен!');
    }
}
