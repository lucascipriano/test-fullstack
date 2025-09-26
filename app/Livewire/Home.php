<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Livewire\Component;

final class Home extends Component
{
    public function render(): View|Factory
    {
        return view('livewire.home');
    }
}
