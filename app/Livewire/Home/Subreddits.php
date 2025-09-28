<?php

declare(strict_types=1);

namespace App\Livewire\Home;

use App\Models\Subreddit;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

final class Subreddits extends Component
{
    public $userSubreddits;

    public $allSubreddits;

    public function mount(): void
    {
        $this->loadData();
    }

    #[On('vote-updated')]
    public function refreshData(): void
    {
        $this->loadData();
    }

    public function render(): Factory|View
    {
        return view('livewire.home.subreddits', [
            'userSubreddits' => $this->userSubreddits,
            'allSubreddits' => $this->allSubreddits,
        ]);
    }

    private function loadData(): void
    {
        $this->userSubreddits = Subreddit::query()->where('user_id', Auth::id())
            ->withCount('posts')
            ->orderBy('created_at', 'desc')
            ->get();

        $this->allSubreddits = Subreddit::query()->withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(10)
            ->get();
    }
}
