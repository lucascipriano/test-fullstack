<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\Subreddit;
use Livewire\Component;

final class SubredditShow extends Component
{
    public Subreddit $subreddit;

    public function mount(Subreddit $subreddit): void
    {
        $this->subreddit = $subreddit;
    }

    public function render(): Factory|View
    {
        $posts = $this->subreddit->posts()->get();

        return view('livewire.subreddit-show', ['posts' => $posts]);
    }
}
