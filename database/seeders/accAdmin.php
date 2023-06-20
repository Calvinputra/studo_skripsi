<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class accAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'role_id' => '3',
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'password' => Hash::make('admin123'),
            ],
        ]);
    }
}
