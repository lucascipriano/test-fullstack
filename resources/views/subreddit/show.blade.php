<?php

declare(strict_types=1);

?>

<x-filament-panels::layout>
    <livewire:subreddit-show :subreddit="$subreddit" />

    @push('styles')
        @vite(['resources/css/app.css'])
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    @endpush

    @push('scripts')
        @vite(['resources/js/app.js'])
    @endpush
</x-filament-panels::layout>
