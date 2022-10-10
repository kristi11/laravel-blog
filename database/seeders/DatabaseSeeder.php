<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        $user = User::factory()->create([


        ]);

        Post::factory(50)->create([
            'user_id' => $user->id
        ]);
    }
}
