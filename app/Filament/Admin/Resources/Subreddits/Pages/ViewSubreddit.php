<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Subreddits\Pages;

use App\Filament\Admin\Resources\Subreddits\SubredditResource;
use Filament\Resources\Pages\ViewRecord;

final class ViewSubreddit extends ViewRecord
{
    protected static string $resource = SubredditResource::class;

    public function getView(): string
    {
        return 'filament.admin.resources.subreddits.pages.view-subreddit';
    }
}
