<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BooksCategory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {

    }

    public function create() {
        return view('books.add_new_book');
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
//        dd($request->get('books_category_id'));
//        // находим категорию по указзаной из формы
        $booksCategory = BooksCategory::query()
            ->where('title', $request->get('books_category_id'))->first()['id'];

        $input = $request->all();
        $input['books_category_id'] = $booksCategory;
//        dd($request->file("cover"));
        $input['cover'] = str_replace("public/covers", "", $request->file("cover")->store("storage/app/public/covers"));

        Book::query()->create($input);
        return redirect()->back()->with('status','Book added!');
    }

//    public function edit($id) {
//        $post = Book::query()->findOrFail($id);
//        return view("edit-new-post",[
//            "post"=>$post
//        ]);
//    }
//
//    public function update($id, Request $request) {
//        $request->validate([
//            "name"=>'required|string|max:255',
//            "text"=>'required|string|',
//        ]);
//
//        $post = Book::query()->findOrFail($id);
//
//        $post->update($request->all());
//        return redirect()->back()->with('status','Post updated!');
//    }
//
//    public function delete($id) {
//        $post = Book::query()->findOrFail($id);
//        $post->delete();
//
//        return redirect()->route('dashboard')->with('status','Post deleted!');
//    }
}
