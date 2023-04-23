<x-app-layout>
    <h1 style="text-align: center; font-size: large; margin-top: 10px">Пожалуйста заполните поля для редактирования категории книг "{{$bookCategory->title}}" в библиотеке</h1>
    <div class="container mt-18">
        <div class="row">
            <div class="col-md-6">
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
                <form enctype="multipart/form-data" method="POST" action="{{ route('books_categories.update', $bookCategory->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail">Введите название категории</label>
                        <input name="title" type="text" class="form-control" id="exampleInputEmail" placeholder="{{$bookCategory->title}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Введите Slug категории</label>
                        <input name="slug" type="text" class="form-control" id="exampleInputEmail"placeholder="{{$bookCategory->slug}}">
                    </div>
                    <button type="submit" class="btn btn-success">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
