<?php

namespace Database\Seeders;

use Eloquent;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        $this->call(UserSeeder::class);
    }
}
