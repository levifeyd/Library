<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добро пожаловать в электронную библиотеку') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Список книг") }}
                </div>
                <div class="container mt-6">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" class="btn btn-success mb-4">Add new post</a>
                            <ul id="requests-list">
                                <div class="card mb-4">
                                    <h8 class="card-header">Заявка №</h8>
                                    <h8 class="card-header">Категория:</h8>
                                    <h8 class="card-header">Статус заявки:</h8>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
