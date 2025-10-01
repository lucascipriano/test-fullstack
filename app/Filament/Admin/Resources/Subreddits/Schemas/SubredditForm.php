<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Subreddits\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class SubredditForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                FileUpload::make('icon_image')
                    ->label('Ícone (SVG)')
                    ->acceptedFileTypes(['image/svg+xml'])
                    ->directory('subreddit-icons')
                    ->disk('public')
                    ->nullable(),
            ]);
    }
}
