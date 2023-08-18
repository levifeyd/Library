<?php

namespace App\Services;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\CommentRequest;
use App\Repositories\BookRepository;
use App\Repositories\CommentRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class BookService
{
    private BookRepository $bookRepository;
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }
    public function getAllBooksWithPaginate():  LengthAwarePaginator {
        return $this->bookRepository->paginate(10);
    }

    public function store(BookStoreRequest $request):void {
        $input = $request->all();
        $input['cover'] = str_replace("public/covers", "", $request->file("cover")->store("public/covers"));
        $this->bookRepository->create($input);
    }

    public function showById($id): Model {
        return $this->bookRepository->getById($id);
    }

    public function showBookWithCommentsById($id):array {
        $book = $this->bookRepository->getById($id);
        return [
            'book'=>$book,
            "comments"=>$book->comments
        ];
    }
    public function update($id, BookStoreRequest $request):void {
        $input = $request->all();
        $input['cover'] = str_replace("public/covers", "", $request->file("cover")->store("public/covers"));
        $this->bookRepository->updateById($id, $input);
    }

    /**
     * @throws Exception
     */
    public function delete($id):void {
        $book = $this->bookRepository->getById($id);
        if(!$book) {
            Storage::disk('public')->delete('covers'.$book->cover);
            $book->delete();
        } else {
            throw new Exception();
        }
    }

    /**
     * @throws Exception
     */
    public function commentBook($id, CommentRequest $request): void {
        $book = $this->bookRepository->getById($id);
        if (!$book) {
            $comment = (new CommentRepository())->create($request->all());
            $book->comments()->attach([$comment->id]);
        } else {
            throw new Exception();
        }


    }
}
