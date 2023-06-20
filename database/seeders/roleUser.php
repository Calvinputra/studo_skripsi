<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class roleUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'user'],
            ['name' => 'tutor'],
            ['name' => 'admin'],
        ]);
    }
}
