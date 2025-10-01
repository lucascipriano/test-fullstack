<?php

declare(strict_types=1);

use App\Models\Subreddit;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/public/home');
Route::get('/home/{subreddit:slug}', function ($slug): Factory|View {
    $subreddit = Subreddit::query()->where('slug', $slug)
        ->withCount('posts')
        ->firstOrFail();

    return view('subreddit.show', ['subreddit' => $subreddit]);
})->name('subreddit.show');

Route::get('/home/{subreddit:slug}/post', fn(Subreddit $subreddit): Factory|View => view('subreddit.comment', ['subreddit' => $subreddit]))->name('subreddit.comments');
