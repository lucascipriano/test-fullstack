<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Post;
use App\Models\Subreddit;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class Home extends Component
{
    public function render(): View|Factory
    {
        $userSubreddits = auth()->check()
            ? auth()->user()->subreddits()->withCount('posts')->with(['posts' => function ($query): void {
                $query->withCount('comments')->latest();
            }])->get()
            : collect();
        $user = User::query()->where('email', 'lucas@gmail.com')->first();
        $posts = $user->posts;
        $postdousur = $user->posts->count();

        $allSubreddits = $userSubreddits->isEmpty()
            ? Subreddit::query()->withCount('posts')->latest()->take(10)->get()
            : collect();

        $subsdouser = $user->subreddits->count();
        $userCount = User::query()->count();
        $postsCount = Post::query()->count();
        $subRedditsCount = Subreddit::query()->count();

        return view('livewire.home',
            ['postsCount' => $postsCount, 'subRedditsCount' => $subRedditsCount,
                'userCount' => $userCount, 'posts' => $posts, 'userSubreddits' => $userSubreddits, 'subsdouser' => $subsdouser, 'postdousur' => $postdousur, 'allSubreddits' => $allSubreddits]);
    }
}
