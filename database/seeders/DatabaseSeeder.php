<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {

        $firstUser = User::create([
            'name' => 'Yahia Elsayed',
            'email' => 'yahia@yahiaelsayed.com',
            'password' => bcrypt('password'),
        ]);

        Task::factory(100)->create([
            'user_id' => $firstUser->id,
        ]);

        User::factory(99)->create()->each(function ($user) {
            Task::factory(100)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
