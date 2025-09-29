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
            $createdComments = [];
            foreach (range(1, $numComments) as $i) {
                $comment = Comment::factory()->create([
                    'post_id' => $post->id,
                    'user_id' => $userIds[array_rand($userIds)],
                ]);
                $createdComments[] = $comment;
            }
            // Cria replies para alguns comentários
            foreach (array_slice($createdComments, 0, 2) as $parentComment) {
                foreach (range(1, random_int(1, 3)) as $j) {
                    Comment::factory()->create([
                        'post_id' => $post->id,
                        'user_id' => $userIds[array_rand($userIds)],
                        'parent_id' => $parentComment->id,
                    ]);
                }
            }
        }

        User::factory(10)->create();
        $this->call([
            SubredditSeeder::class,
            PostSeeder::class,
        ]);
    }
}
