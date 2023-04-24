<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BooksCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index() {
        $books = Book::paginate(3);
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
            "rating"=>'required|integer|',
            "cover"=>'required',
            "books_category_id"=>'required',
        ]);

//        $booksCategory = BooksCategory::query()
//            ->where('title', $request->get('books_category_id'))->first()['id'];
        $input = $request->all();
//        $input['books_category_id'] = $booksCategory;
        $input['cover'] = str_replace("public/covers", "", $request->file("cover")->store("public/covers"));
        Book::query()->create($input);
        return redirect()->back()->with('status','Book added!');
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
//        $booksCategory = BooksCategory::query()
//            ->where('title', $request->get('books_category_id'))->first()['id'];
        $input = $request->all();
//        $input['books_category_id'] = $booksCategory;
        $input['cover'] = str_replace("public/covers", "", $request->file("cover")->store("public/covers"));

        $book = Book::query()->findOrFail($id);
        $book->update($input);
        return redirect()->back()->with('status','Book updated!');
    }

    public function delete($id) {
        $book = Book::query()->findOrFail($id);
        $book->delete();
        Storage::disk('public')->delete('covers'.$book->cover);

        return redirect()->route('dashboard')->with('status','Book deleted!');
    }
}
