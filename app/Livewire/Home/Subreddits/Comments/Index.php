<?php

namespace App\Livewire\Home\Subreddits\Comments;

use App\Models\Comment;
use App\Models\Subreddit;
use Livewire\Component;

class Index extends Component
{
    public Subreddit $subreddit;
    public string $content = '';

    public function addComment()
    {
        $this->validate([
            'content' => 'required|string',
        ]);

        $this->subreddit->comments()->create([
            'content' => $this->content,
        ]);

        $this->content = '';
        $this->subreddit->refresh();
    }

    public function render()
    {
        $comments = Comment::with(['user', 'replies.user'])
            ->where('post_id', $this->subreddit->id)
            ->latest()
            ->get();

        return view('livewire.home.subreddits.comments.index', [
            'subreddit' => $this->subreddit,
            'comments' => $comments,
        ]);
    }
}
