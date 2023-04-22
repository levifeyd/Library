<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::query()->create([
            'name'=>'artem',
            'email' => 'artem@mail.ru',
            'password' => bcrypt('qweasdzxc'),
        ]);
        $user->assignRole('worker');

        $user = User::query()->create([
            'name'=>'ivan',
            'email' => 'ivan@mail.ru',
            'password' => bcrypt('qweasdzxc'),
        ]);
        $user->assignRole('worker');

        $user = User::query()->create([
            'name'=>'polina',
            'email' => 'polina@mail.ru',
            'password' => bcrypt('qweasdzxc'),
        ]);
        $user->assignRole('reader');

        $user = User::query()->create([
            'name'=>'stepan',
            'email' => 'stepan@mail.ru',
            'password' => bcrypt('qweasdzxc'),
        ]);
        $user->assignRole('reader');
    }
}
