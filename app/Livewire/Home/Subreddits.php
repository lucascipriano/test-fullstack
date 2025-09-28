<?php

declare(strict_types=1);

namespace App\Livewire\Home;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\Subreddit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

final class Subreddits extends Component
{
    public function render(): Factory|View
    {
        $userSubreddits = Subreddit::query()->where('user_id', Auth::id())
            ->withCount('posts')
            ->orderBy('created_at', 'desc')
            ->get();

        $allSubreddits = Subreddit::query()->withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(10)
            ->get();

        return view('livewire.home.subreddits', ['userSubreddits' => $userSubreddits, 'allSubreddits' => $allSubreddits]);
    }
}
