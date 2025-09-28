<?php

declare(strict_types=1);

use App\Livewire\Home\Widgets;
use Livewire\Livewire;

it('renders successfully', function (): void {
    Livewire::test(Widgets::class)
        ->assertStatus(200);
});
