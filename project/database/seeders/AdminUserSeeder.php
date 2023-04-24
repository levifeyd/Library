<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::query()->create([
            'name'=>'admin',
            'email' => 'admin@domain.com',
            'password' => bcrypt('qweasdzxc'),
        ]);
        $user->assignRole('admin');
    }
}
