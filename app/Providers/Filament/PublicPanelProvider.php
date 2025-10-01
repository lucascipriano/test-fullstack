<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use App\Filament\Admin\Resources\Subreddits\SubredditResource;
use App\Filament\Public\Pages\Home;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

final class PublicPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('public')
            ->path('/public')
            ->login()
            ->registration()
            ->default()
            ->colors([
                'primary' => Color::Indigo,
            ])
            ->defaultThemeMode(ThemeMode::Dark)
            ->brandLogo(fn () => view('livewire.sidebar-collapse-button'))
            ->homeUrl('')
            ->viteTheme('resources/css/filament/public/theme.css')
            ->profile()
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->navigationGroups([
                NavigationGroup::make('Shop')
                    ->icon('heroicon-o-shopping-bag'),
                NavigationGroup::make('Blog')
                    ->icon('heroicon-o-document-text'),
            ])
            ->resources([
                SubredditResource::class,
            ])
            ->sidebarFullyCollapsibleOnDesktop()

            ->renderHook(
                PanelsRenderHook::TOPBAR_END,
                fn () => view('filament.custom.login-button')
            )
            ->authMiddleware([])
            ->pages([Home::class])
            ->renderHook('panels::topbar', fn () => '')
            ->renderHook('panels::user-menu', fn () => '')
            ->discoverPages(in: app_path('Filament/Public/Pages'), for: 'App\\Filament\\Public\\Pages');
    }
}
