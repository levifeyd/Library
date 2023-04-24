<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Категории книг в библиотеке') }}
        </h2>
    </x-slot>
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('books_categories.create') }}" class="btn btn-success mb-4">Добавить новую категорию книг</a>

            @if (session('status'))
                    <div class="alert alert-success mt-4">
                        {{ session('status') }}
                    </div>
                @endif
                @foreach($booksCategories as $booksCategory)
                    <div class="card mb-4">
                        <h5 class="card-header">{{$booksCategory->title}}</h5>
                        <div class="card-body">
                            <a href="{{ route('books_categories.edit', $booksCategory->id) }}" class="btn btn-primary">Изменить категорию</a>
                            <form action="{{ route('books_categories.destroy', $booksCategory->id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" style="background-color: firebrick">Удалить категорию</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
