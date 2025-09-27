<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Subreddit;
use Illuminate\Database\Seeder;

final class SubredditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subreddit::factory()->count(10)->create();
    }
}
