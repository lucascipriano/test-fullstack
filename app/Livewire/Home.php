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
        $user = User::query()->where('email', 'lucas@gmail.com')->first();
        $posts = $user->posts;
        $userCount = User::query()->count();
        $postsCount = Post::query()->count();
        $subRedditsCount = Subreddit::query()->count();

        return view('livewire.home',
            ['postsCount' => $postsCount, 'subRedditsCount' => $subRedditsCount, 'userCount' => $userCount, 'posts' => $posts]);
    }
}
