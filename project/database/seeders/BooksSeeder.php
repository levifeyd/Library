<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookCategory = Book::query()->create([
            'title'=>'Книга 1',
            'slug'=>'Slug 1',
            'author'=>'Автор книги 1',
            'description'=>'Описание книги 1',
            'rating'=>5,
            'cover'=>'',
            'comment'=>null
        ]);
    }
}
