<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(IqTestSeeder::class);
        User::create([
            'name' => 'eitone',
            'email' => 'eitone@gmail.com',
            'phonenumber' => '09796272472',
            'age' => 22,
            'password' => bcrypt('password')
        ]);


        // \App\Models\User::factory(10)->create();
    }
}
