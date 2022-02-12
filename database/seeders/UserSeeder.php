<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'           => 'Kunde',
            'password'       => Hash::make('Feuerwehr'),
        ]);

        User::create([
            'name'           => 'Mitarbeiter',
            'password'       => Hash::make('Feuerwehr'),
        ]);
    }
}
