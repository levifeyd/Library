<x-app-layout>
    <h1 style="text-align: center; font-size: large; margin-top: 10px">Пожалуйста заполните поля для редактирования сотрудника "{{$worker->name}}" в библиотеке</h1>
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
                <form enctype="multipart/form-data" method="POST" action="{{ route('workers.update', $worker->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail">Введите имя сотрудника</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail" placeholder="{{$worker->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Введите email сотрудника</label>
                        <input name="email" type="text" class="form-control" id="exampleInputEmail"placeholder="{{$worker->email}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Введите пароль сотрудника</label>
                        <input name="password" type="text" class="form-control" id="exampleInputEmail">
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: green">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
