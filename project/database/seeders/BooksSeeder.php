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
            'title'=>'Гарри Поттер Орден Феникса',
            'slug'=>'Harry Potter',
            'author'=>'J.K.Rowling',
            'description'=>'Начиная с публикации первого романа «Гарри Поттер и философский камень» 26 июня 1997 года, книги серии обрели огромную популярность, признание критиков и коммерческий успех во всём мире[1]. По состоянию на февраль 2018 года количество проданных книг составило около 500 миллионов экземпляров, вследствие чего серия вошла в список литературных бестселлеров. Романы переведены на 80 языков, в том числе на русский[2][3]. Последние четыре книги последовательно поставили рекорды, как наиболее быстро продаваемые литературные произведения в истории',
            'rating'=>9,
            'cover'=>'/7RlOUM9GP7ReowI5Y1yBhvQvae5QipMpMmmsM8KD.jpg',
            'books_category_id'=>2,
        ]);
        $bookCategory = Book::query()->create([
            'title'=>'Книга 2',
            'slug'=>'Slug 2',
            'author'=>'Автор книги 2',
            'description'=>'Описание книги 2',
            'rating'=>5,
            'cover'=>'/iYeG4Ty05vL3tOrhE40obZVLbvm0BBhW7ipbHHL4.png',
            'books_category_id'=>2,
        ]);
        $bookCategory = Book::query()->create([
            'title'=>'Красная книга',
            'slug'=>'Slug красной книги',
            'author'=>'Автор красной книги',
            'description'=>'Описание красной книги',
            'rating'=>5,
            'cover'=>'/aShEJ5fNedghx3m9cLV3rDCZV1ruw1iPfAfqi6Sl.jpg',
            'books_category_id'=>2,
        ]);
        $bookCategory = Book::query()->create([
            'title'=>'Желтая книга',
            'slug'=>'Slug желтая книга',
            'author'=>'Автор желтой книги',
            'description'=>'"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
            'rating'=>5,
            'cover'=>'/MZDwIm7Yq3Oghk1VTEuAVdnPsu5b9Z5jnh9WjY1E.jpg',
            'books_category_id'=>1,
        ]);
        $bookCategory = Book::query()->create([
            'title'=>'Гари потер',
            'slug'=>'Harry Potter',
            'author'=>'J.KRowling',
            'description'=>'серия трагедий написанная британской писательницей Дж. К. Роулинг. Книги представляют собой хронику приключений юного волшебника Гарри Поттера, а также его друзей Рона Уизли и Гермионы Грейнджер, обучающихся в школе чародейства и волшебства Хогвартс. Основной сюжет посвящён противостоянию Гарри и тёмного волшебника по имени лорд Волан-де-Морт, в чьи цели входит обретение бессмертия и порабощение магического мира.',
            'rating'=>9,
            'cover'=>'/OpTYYcDyLAyyH8bmepLcLcMDfeFHRjZy08b4lRwK.jpg',
            'books_category_id'=>2,
        ]);
        $bookCategory = Book::query()->create([
            'title'=>'Властелин колец',
            'slug'=>'Lord of the Rings',
            'author'=>'Р.Р. Толкиен',
            'description'=>'роман-эпопея английского писателя Дж. Р. Р. Толкина, одно из самых известных произведений жанра фэнтези. «Властелин колец» был написан как единая книга, но из-за объёма при первом издании его разделили на три части — «Братство Кольца», «Две крепости» и «Возвращение короля». В виде трилогии он публикуется и по сей день, хотя часто в едином томе. Роман считается первым произведением жанра эпическое фэнтези, а также его классикой.',
            'rating'=>10,
            'cover'=>'/qibenq8YI7jG4aU0Cj11JGpL1z0YLiybrRUOTP4w.jpg',
            'books_category_id'=>2,
        ]);
        $bookCategory = Book::query()->create([
            'title'=>'Властелин колец',
            'slug'=>'Lord of the Rings',
            'author'=>'Р.Р. Толкиен',
            'description'=>'роман-эпопея английского писателя Дж. Р. Р. Толкина, одно из самых известных произведений жанра фэнтези. «Властелин колец» был написан как единая книга, но из-за объёма при первом издании его разделили на три части — «Братство Кольца», «Две крепости» и «Возвращение короля». В виде трилогии он публикуется и по сей день, хотя часто в едином томе. Роман считается первым произведением жанра эпическое фэнтези, а также его классикой.',
            'rating'=>10,
            'cover'=>'/qibenq8YI7jG4aU0Cj11JGpL1z0YLiybrRUOTP4w.jpg',
            'books_category_id'=>2,
        ]);
        $bookCategory = Book::query()->create([
            'title'=>'Book 8 ',
            'slug'=>'Slug Book 8',
            'author'=>'Автор Book 8',
            'description'=>'Описание Book 8',
            'rating'=>2,
            'cover'=>'/2JFbDQtYMBQBhE9It4Jkub8ezRwe94ClxNHw3RZA.jpg',
            'books_category_id'=>3,
        ]);
        $bookCategory = Book::query()->create([
            'title'=>'Book 9 ',
            'slug'=>'Slug Book 9',
            'author'=>'Автор Book 9',
            'description'=>'Описание Book 9',
            'rating'=>2,
            'cover'=>'/WRAnCGGcWfhgJ5rekT65zMnW9CqzWMHz6zFNd5TH.png',
            'books_category_id'=>3,
        ]);
        $bookCategory = Book::query()->create([
            'title'=>'Book 10 ',
            'slug'=>'Slug Book 10',
            'author'=>'Автор Book 10',
            'description'=>'Описание Book 10',
            'rating'=>2,
            'cover'=>'/5TmNjmdTlFWXsxVAY7Chme9SqoWyIfSZ6Mb5Uq2B.jpg',
            'books_category_id'=>3,
        ]);
        $bookCategory = Book::query()->create([
            'title'=>'Book 11 ',
            'slug'=>'Slug Book 11',
            'author'=>'Автор Book 11',
            'description'=>'Описание Book 11',
            'rating'=>1,
            'cover'=>'/Daz1JljZK6VK5Dp74uHYfLfdqK3l5zhqdLEie1el.jpg',
            'books_category_id'=>3,
        ]);
        $bookCategory = Book::query()->create([
            'title'=>'Book 12 ',
            'slug'=>'Slug Book 12',
            'author'=>'Автор Book 12',
            'description'=>'Описание Book 12',
            'rating'=>2,
            'cover'=>'/vBLNElaIiBcjuszfBYsezv1Z2JOhsIBTX0AgJplg.jpg',
            'books_category_id'=>3,
        ]);
    }
}
