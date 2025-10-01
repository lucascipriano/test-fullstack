<?php

declare(strict_types=1);

namespace App\Filament\Public\Pages;

use Filament\Pages\Page;

final class Home extends Page
{
    protected string $view = 'filament.public.pages.home';

    protected static string $layout = 'filament.public.layouts.app';
}
