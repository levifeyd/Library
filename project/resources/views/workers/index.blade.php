<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Сотрудники в библиотеке') }}
        </h2>
    </x-slot>
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('workers.create') }}" class="btn btn-success mb-4">Добавить нового сотрудника</a>
            @if (session('status'))
                    <div class="alert alert-success mt-4">
                        {{ session('status') }}
                    </div>
                @endif
                @foreach($workers as $worker)
                    <div class="card mb-4">
                        <h5 class="card-header">{{$worker->name}}</h5>
                        <div class="card-body">
                            <a href="{{ route('workers.edit', $worker->id) }}" class="btn btn-primary">Изменить данные сотрудника</a>
                            <form action="{{ route('workers.destroy', $worker->id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-danger text-white">Удалить сотрудника</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
