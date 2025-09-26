<?php

declare(strict_types=1);

?>
<x-filament::page>
    <h1 class="text-xl font-bold">{{ $this->record->name }}</h1>
    <p class="text-gray-600">{{ $this->record->description }}</p>

    <h2 class="mt-6 text-xl font-semibold">Posts</h2>
    @foreach ($this->record->posts as $post)
        <div class="mt-2 rounded border p-4 shadow-sm">
            <h3 class="font-semibold">{{ $post->title }}</h3>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach
</x-filament::page>
<?php 
