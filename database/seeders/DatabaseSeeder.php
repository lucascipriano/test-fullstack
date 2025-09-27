<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Subreddit;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->isLocal()) {
            User::factory()->admin()->create();
        }

        User::factory()->create([
            'name' => 'Lucas',
            'email' => 'lucas@gmail.com',
        ]);
        Post::factory(10)->create([
            'user_id' => User::query()->where('email', 'lucas@gmail.com')->first()->id,
        ]);
        Subreddit::factory(10)->create([
            'user_id' => User::query()->where('email', 'lucas@gmail.com')->first()->id,
        ]);

        $subreddits = Subreddit::all();
        $userIds = User::query()->pluck('id')->toArray();
        foreach ($subreddits as $subreddit) {
            Post::factory(random_int(5, 15))->create([
                'subreddit_id' => $subreddit->id,
                'user_id' => $userIds[array_rand($userIds)],
            ]);
        }

        $posts = Post::all();
        foreach ($posts as $post) {
            $numComments = random_int(2, 10);
            foreach (range(1, $numComments) as $i) {
                Comment::factory()->create([
                    'post_id' => $post->id,
                    'user_id' => $userIds[array_rand($userIds)],
                ]);
            }
        }

        User::factory(10)->create();
        $this->call([
            SubredditSeeder::class,
            PostSeeder::class,
        ]);
    }
}
