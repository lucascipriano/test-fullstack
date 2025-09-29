<?php

declare(strict_types=1);

?>
<div>
    <div
        class="order-1 container mt-[36px] box-border flex max-w-full flex-none grow-0 flex-col items-start gap-8 self-stretch rounded-t-[20px] border border-[#2C2C2D] bg-[#0F0F10] p-8"
    >
        <div class="container max-w-full">
            <h1 class="order-0 mb-[32px] flex-none grow-0 self-stretch text-[24px] font-semibold">Suas comunidades</h1>
            @forelse ($userSubreddits as $subreddit)
                <div
                    class="mb-4 w-full rounded-[12px] rounded-lg border border-[#2C2C2D] bg-[#131314] bg-gradient-to-br p-6"
                >
                    <div>
                        <div class="flex items-center gap-3">
                            <img src="/images/nerd.svg" alt="Nerd Icon" class="h-7 w-7" />
                            <p class="font-medium text-[#6155F5]">r/{{ $subreddit->name }}</p>
                            <span class="text-sm text-[#9C9C9C]">{{ $subreddit->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="mt-[10px]">
                        <h2
                            class="mb-1 flex flex-none items-center self-stretch text-[20px] leading-[24px] font-semibold text-[#FDFDFD]"
                        >
                            {{ $subreddit->name }}
                        </h2>
                        <p
                            class="font-satoshi flex flex-none items-center self-stretch text-[16px] leading-[150%] font-medium text-[#9C9C9C]"
                        >
                            {{ $subreddit->description ?? 'Sem descrição disponível.' }}
                        </p>
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm text-[#9C9C9C]">{{ $subreddit->posts_count }} posts</span>
                        <a href="/home/{{ $subreddit->slug }}" class="text-[#6155F5] hover:underline">Ver subreddit</a>
                    </div>
                </div>
            @empty
                <div class="space-y-4">
                    <div
                        class="mb-4 rounded-lg bg-gradient-to-br from-[rgba(79,57,246,0.04)] to-[rgba(46,33,144,0.04)] p-6"
                    >
                        <p class="mb-4 text-center text-[#9C9C9C]">Você ainda não criou nenhum subreddit.</p>
                        <p class="text-center font-medium text-[#FDFDFD]">Explore algumas comunidades populares:</p>
                    </div>

                    @foreach ($allSubreddits as $subreddit)
                        <div
                            class="mb-4 w-full rounded-[12px] rounded-lg border border-[#2C2C2D] bg-[#131314] bg-gradient-to-br p-6"
                        >
                            <div>
                                <div class="flex items-center gap-3">
                                    <img src="/images/nerd.svg" alt="Nerd Icon" class="h-7 w-7" />
                                    <p class="font-medium text-[#6155F5]">r/{{ $subreddit->name }}</p>
                                    <span class="text-sm text-[#9C9C9C]">
                                        {{ $subreddit->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                            <div class="mt-[10px]">
                                <h2
                                    class="mb-1 flex flex-none items-center self-stretch text-[20px] leading-[24px] font-semibold text-[#FDFDFD]"
                                >
                                    {{ $subreddit->name }}
                                </h2>
                                <p
                                    class="font-satoshi flex flex-none items-center self-stretch text-[16px] leading-[150%] font-medium text-[#9C9C9C]"
                                >
                                    {{ $subreddit->description ?? 'Sem descrição disponível.' }}
                                </p>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-sm text-[#9C9C9C]">{{ $subreddit->posts_count }} posts</span>
                                <a href="/home/{{ $subreddit->slug }}" class="text-[#6155F5] hover:underline">
                                    Ver subreddit
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforelse
        </div>
    </div>
</div>
<?php
