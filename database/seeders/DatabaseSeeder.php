<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Ali',
            'email' => 'ali@ali.com',
            'password' => 'ali'
        ]);
        $this->call(CategorySedder::class);
        $this->call(PostSeeder::class);
    }
}
