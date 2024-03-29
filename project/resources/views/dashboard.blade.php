<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добро пожаловать в электронную библиотеку') }}
        </h2>
    </x-slot>
    @if (session('status'))
        <div class="alert alert-success mt-4">
            {{ session('status') }}
        </div>
    @endif
    <a href="{{ route('add-book') }}" class="btn btn-success mb-4 mt-6" style="margin-left: 160px">Добавить новую книгу</a>
    <div style="margin-left: 160px;margin-right: 160px">
        {{ $books->links() }}
    </div>
    @foreach($books as $book)
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h8 class="card-header">Название книги: {{ $book->title }}</h8>
                                <h8 class="card-header">Категория: {{ $book->category->title }}</h8>
                                    <div style="margin-left: 20px">
                                        <a>Обложка книги : </a>
                                        <img src="/storage/covers/{{$book->cover}}" width="100">
                                    </div>
                                <div class="card-body">
                                    <a href="{{route('show-book', $book->id)}}" class="btn btn-primary">Посмотреть книгу</a>
                                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('worker') )
                                        <a href="{{route('edit-book', $book->id)}}" class="btn bg-success text-white">Редактировать книгу</a>
                                        <form action="{{route('delete-book', $book->id)}}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-danger text-white">Удалить книгу</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>
