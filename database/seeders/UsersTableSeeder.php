<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(50)->create();

        $user = User::find(1);
        $user->name = 'Neekko33';
        $user->email = 'neekko33@outlook.com';
        $user->is_admin = true;
        $user->save();
    }
}
