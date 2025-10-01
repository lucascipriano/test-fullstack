<?php

declare(strict_types=1);

use App\Livewire\Home\Vote;
use Livewire\Livewire;

it('renders successfully', function (): void {
    Livewire::test(Vote::class)
        ->assertStatus(200);
});
