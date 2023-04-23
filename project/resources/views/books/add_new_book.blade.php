<x-app-layout>
    <h1 style="text-align: center; font-size: large; margin-top: 10px">Пожалуйста заполните поля для создания новой книги в библиотеке</h1>
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
                <form enctype="multipart/form-data" method="POST" action="{{ route('store-book') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail">Введите название книги</label>
                        <input name="title" type="text" class="form-control" id="exampleInputEmail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Slug</label>
                        <input name="slug" type="text" class="form-control" id="exampleInputEmail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Введите автора книги</label>
                        <input name="author" type="text" class="form-control" id="exampleInputEmail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Введите описание книги</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Выберите рейтинг книги от (1-10)</label>
                        <input name="rating" type="number" class="form-control" id="exampleInputEmail">
                    </div>
                    <input name="cover" type="file" class="w-full h-12" placeholder="Пожалуйста загрузите обложку книги" />
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Категория заявки</label>
                        <select name="books_category_id" class="form-control" id="exampleFormControlSelect2">
                            <option value="Научная фантастика">Научная фантастика</option>
                            <option value="Фэнтези">Фэнтези</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
