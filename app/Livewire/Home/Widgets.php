<?php

declare(strict_types=1);

namespace App\Livewire\Home;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\Post;
use App\Models\Subreddit;
use App\Models\User;
use Livewire\Component;

final class Widgets extends Component
{
    public function render(): Factory|View
    {
        $userSubreddits = auth()->check()
            ? auth()->user()->subreddits()->withCount('posts')->with(['posts' => function ($query): void {
                $query->withCount('comments')->latest();
            }])->get()
            : collect();

        $userCount = User::query()->count();
        $postCount = Post::query()->count();
        $postUser = auth()->check() ? auth()->user()->posts->count() : 0;

        $subRedditsCount = Subreddit::query()->count();
        $subUser = auth()->check() ? auth()->user()->subreddits()->count() : 0;

        return view('livewire.home.widgets', ['userSubreddits' => $userSubreddits, 'subRedditsCount' => $subRedditsCount, 'userCount' => $userCount, 'postCount' => $postCount, 'postUser' => $postUser, 'subUser' => $subUser]);
    }
}
