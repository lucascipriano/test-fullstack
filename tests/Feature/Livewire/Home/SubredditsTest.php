<?php

declare(strict_types=1);

use App\Livewire\Home\Subreddits;
use Livewire\Livewire;

it('renders successfully', function (): void {
    Livewire::test(Subreddits::class)
        ->assertStatus(200);
});
