<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

final class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 50 posts
        Post::factory()->count(50)->create();
    }
}
