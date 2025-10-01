<?php

declare(strict_types=1);

use App\Livewire\Home\Vote\Index;
use Livewire\Livewire;

it('renders successfully', function (): void {
    Livewire::test(Index::class)
        ->assertStatus(200);
});
