<?php

declare(strict_types=1);

namespace App\Livewire\Home;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Livewire\Component;

final class Index extends Component
{
    public function render(): View|Factory
    {
        return view('livewire.home.index');
    }
}
