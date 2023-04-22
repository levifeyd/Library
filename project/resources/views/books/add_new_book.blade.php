<x-app-layout>
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
                <form enctype="multipart/form-data" method="POST" action="{{ route('store-book') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail">Title</label>
                        <input name="title" type="text" class="form-control" id="exampleInputEmail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Slug</label>
                        <input name="slug" type="text" class="form-control" id="exampleInputEmail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Author</label>
                        <input name="author" type="text" class="form-control" id="exampleInputEmail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Rating</label>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
