<x-app-layout>
    <h1 class="mt-3 text-xl-center font-semibold">Книга "{{$book->title}}"</h1>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <h8 class="card-header">Автор книги: {{ $book->author }}</h8>
                    <h8 class="card-header">Описание книги: {{ $book->description }}</h8>
                    @if(count($comments))
                        <h8 class="card-header">Комментарии к книге:</h8>
                        @foreach($comments as $comment)
                            <div class="card-body">
                                <h6>{{$comment->text}}</h6>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if(auth()->user()->hasRole('reader'))
                    <form method="POST" action="{{route('update-comment-book', $book->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail">Напишите комментарий к книге</label>
                            <input name="text" type="text" class="form-control" id="exampleInputEmail">
                        </div>
                        <button type="submit" class="btn bg-success text-white">Оставить комментарий к книге</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
