<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BooksCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookCategory = BooksCategory::query()->create([
            'title'=>'Научная фантастика',
            'slug'=>'Slug 1',
        ]);
    }
}
