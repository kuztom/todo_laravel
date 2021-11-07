<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(4)->create([
            'password' => bcrypt('test')
        ])->each(function (User $user) {
            Task::factory(20)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
