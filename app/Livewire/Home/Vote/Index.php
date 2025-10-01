<?php

declare(strict_types=1);

namespace App\Livewire\Home\Vote;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\Post;
use App\Models\Vote;
use Livewire\Component;

final class Index extends Component
{
    public Post $post;

    public $userVote;

    public $voteScore = 0; // Alterado de $votesScore para $voteScore

    public function mount(Post $post): void
    {
        $this->post = $post;
        $this->calculateVoteScore();
        $this->getUserVote();
    }

    public function vote($type): void
    {
        if (! auth()->check()) {
            return;
            //            Depois adicionar toast de erro
        }

        $existingVote = Vote::query()->where([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
        ])->first();

        if ($existingVote) {
            if ($existingVote->type === $type) {
                $existingVote->delete();
                $this->userVote = null;
            } else {
                $existingVote->update(['type' => $type]);
                $this->userVote = $type;
            }
        } else {
            Vote::query()->create([
                'user_id' => auth()->id(),
                'post_id' => $this->post->id,
                'type' => $type,
            ]);
        }

        $this->calculateVoteScore();
        $this->getUserVote();
    }

    public function render(): Factory|View
    {
        return view('livewire.home.vote.index');
    }

    private function getUserVote(): void
    {
        if (auth()->check()) {
            $vote = $this->post->votes()->where('user_id', auth()->id())->first();
            $this->userVote = $vote ? $vote->type : null;
        }
    }

    private function calculateVoteScore(): void
    {
        $upvotes = $this->post->votes()->where('type', 'upvote')->count();
        $downvotes = $this->post->votes()->where('type', 'downvote')->count();
        $this->voteScore = $upvotes - $downvotes;
    }
}
