<?php

declare(strict_types=1);

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\Subreddit;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));
Route::get('/home/{subreddit:slug}', function ($slug): Factory|View {
    $subreddit = Subreddit::query()->where('slug', $slug)
        ->withCount('posts')
        ->firstOrFail();

    return view('subreddit.show', ['subreddit' => $subreddit]);
})->name('subreddit.show');
