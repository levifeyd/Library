<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добавить новую категорию книг') }}
        </h2>
    </x-slot>
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('books_categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail">Ведите название категории</label>
                        <input name="title" type="text" class="form-control" id="exampleInputEmail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Введите slug категории</label>
                        <input name="slug" type="text" class="form-control" id="exampleInputEmail">
                    </div>
                    <button type="submit" class="btn bg-success text-white">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
