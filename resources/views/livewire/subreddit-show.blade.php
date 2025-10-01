<?php

declare(strict_types=1);

?>

<div class="container mx-auto px-4 py-8">
    <div
        class="mb-10 h-[200px] w-full flex-none rounded-[8px] border border-[#2C2C2D] bg-gradient-to-b bg-[url('mohammad-rahmani-N5bT5RctFZ8-unsplash.jpg')] from-[rgba(9,9,10,0)] to-[#09090A]"
    >
        <img src="/images/1337527.png" alt="Banner" class="h-full w-full rounded-[8px] object-cover" />
    </div>

    <div class="container mb-6 rounded-[12px] p-6">
        <div class="container mb-6 rounded-[12px] p-6">
            <div class="mb-4 flex flex-col items-center gap-3 md:flex-row md:items-center">
                <img src="/images/nerd.svg" alt="Subreddit Icon" class="hidden h-10 w-10 md:block" />

                <div class="flex flex-col">
                    <h1 class="text-center text-2xl font-bold text-[#FDFDFD] md:text-left">
                        r/{{ $subreddit->name }}
                    </h1>
                    <p class="text-center text-[#9C9C9C] md:text-left">{{ $subreddit->description }}</p>
                </div>

                <div class="flex gap-3 md:ml-auto md:flex-col">
                    <button
                        class="flex-none rounded-[8px] border border-[#2C2C2D] bg-transparent px-4 py-2 text-sm font-medium text-[#FDFDFD] transition-colors hover:bg-[#2C2C2D]"
                    >
                        Entrar
                    </button>

                    <button
                        class="flex-none rounded-[8px] bg-[#4F39F6] px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-[#3B2DE0]"
                    >
                        Criar post
                    </button>
                </div>
            </div>
        </div>

        <div class="ml-10 flex gap-4 text-sm text-[#9C9C9C]">
            <span>{{ $subreddit->posts()->count() }} posts</span>
            <span class="flex gap-1">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.3334 17.5V15.8333C13.3334 14.9493 12.9822 14.1014 12.357 13.4763C11.7319 12.8512 10.8841 12.5 10 12.5H5.00002C4.11597 12.5 3.26812 12.8512 2.643 13.4763C2.01788 14.1014 1.66669 14.9493 1.66669 15.8333V17.5M13.3334 2.60667C14.0481 2.79197 14.6812 3.20939 15.1331 3.79339C15.585 4.37738 15.8302 5.09491 15.8302 5.83333C15.8302 6.57176 15.585 7.28928 15.1331 7.87328C14.6812 8.45728 14.0481 8.87469 13.3334 9.06M18.3334 17.5V15.8333C18.3328 15.0948 18.087 14.3773 17.6345 13.7936C17.182 13.2099 16.5485 12.793 15.8334 12.6083M10.8334 5.83333C10.8334 7.67428 9.34097 9.16667 7.50002 9.16667C5.65907 9.16667 4.16669 7.67428 4.16669 5.83333C4.16669 3.99238 5.65907 2.5 7.50002 2.5C9.34097 2.5 10.8334 3.99238 10.8334 5.83333Z"
                        stroke="#FDFDFD"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
                criado a {{ $subreddit->created_at->diffForHumans() }}
            </span>
        </div>
    </div>

    <div class="space-y-4">
        @forelse ($posts as $post)
            <div class="rounded-[12px] border border-[#2C2C2D] bg-[#131314] p-6">
                <div class="mb-3 flex items-center gap-2">
                    <span class="text-[#6155F5]">u/{{ $post->user->name }}</span>
                    <span class="text-sm text-[#9C9C9C]">{{ $post->created_at->diffForHumans() }}</span>
                </div>

                <div>
                    <h2 class="mb-2 text-xl font-semibold text-[#FDFDFD]">{{ $post->title }}</h2>
                    <p class="text-[#9C9C9C]">{{ $post->content }}</p>
                </div>

                <div class="mt-4 flex items-center gap-4">
                    <span class="flex gap-1 text-sm text-[#9C9C9C]">
                        <img src="/images/comment.svg" alt="" class="h-4 w-4" />
                        {{ $post->comments()->count() }}
                    </span>
                    <livewire:home.vote.index :post="$post" :key="$post->id" />
                </div>
            </div>
        @empty
            <div class="rounded-[12px] border border-[#2C2C2D] bg-[#131314] p-6 text-center">
                <p class="text-[#9C9C9C]">Nenhum post encontrado neste subreddit.</p>
            </div>
        @endforelse
    </div>
</div>

<?php
