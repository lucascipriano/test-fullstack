<?php

declare(strict_types=1);

?>
<div class="flex items-center space-x-2">
    <button
        wire:click="vote('upvote')"
        class="{{ $userVote === 'upvote' ? 'text-green-500' : 'text-gray-500 hover:text-green-500' }} rounded p-1"
    >
        <img
            src="/images/like.svg"
            alt="Upvote"
            class="h-10 w-10"
            style="{{ $userVote === 'upvote' ? 'filter: invert(48%) sepia(79%) saturate(2476%) hue-rotate(86deg) brightness(118%) contrast(119%);' : 'filter: brightness(0) saturate(100%) invert(1);' }}"
        />
    </button>

    <span
        class="{{ $voteScore > 0 ? 'text-green-500' : ($voteScore < 0 ? 'text-red-500' : 'text-gray-500') }} font-semibold"
    >
        {{ $voteScore }}
    </span>

    <button
        wire:click="vote('downvote')"
        class="{{ $userVote === 'downvote' ? 'text-red-500' : 'text-gray-500 hover:text-red-500' }} rounded p-1"
    >
        <img
            src="/images/like.svg"
            alt="Downvote"
            class="h-10 w-10 rotate-180 transform"
            style="{{ $userVote === 'downvote' ? 'filter: invert(17%) sepia(100%) saturate(7471%) hue-rotate(355deg) brightness(91%) contrast(119%);' : 'filter: brightness(0) saturate(100%) invert(1);' }}"
        />
    </button>
</div>
<?php 
