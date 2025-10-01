<div class="mt-[24px]">
    {{--   Image User--}}
    <div class="flex flex-row items-center p-0 gap-4 flex-none order-0 grow-0">
        <img src="/images/nerd.svg" alt="Nerd Icon" class="h-7 w-7" />
        <div class="flex flex-col items-center flex-none grow-0">
            @auth
                <span class="text-sm text-[#6155F5]">Usuário: {{ auth()->user()->name }}</span>
            @endauth
            <p class="font-medium text-[#6155F5]">r/{{ $subreddit->name }}</p>
        </div>
        <div class="w-[4px] h-[4px] bg-[#E8E9F1] flex-none rounded grow-0"></div>
        <span class="text-sm text-[#9C9C9C]">{{ $subreddit->created_at->diffForHumans() }}</span>
    </div>

    {{--    Post body header--}}

    <div class="mt-8 flex flex-col gap-8">
        <h1 class="font-bold text-[24px] leading-[150%] text-white flex-none">
            Comentários em r/{{ $subreddit->name }}
        </h1>

        <div
            class=" h-[200px] w-full flex-none rounded-[8px] border border-[#2C2C2D] bg-gradient-to-b bg-[url('mohammad-rahmani-N5bT5RctFZ8-unsplash.jpg')] from-[rgba(9,9,10,0)] to-[#09090A]"
        >
            <img src="/images/1337527.png" alt="Banner" class="h-full w-full rounded-[8px] object-cover" />
        </div>

        <p class="font-medium text-[16px] leading-[150%] text-[#9C9C9C]">
            {{$subreddit->description}}
        </p>

        <div class="flex flex-col items-end p-4 gap-4 bg-[#0F0F10] border border-[#2C2C2D] rounded-xl ">
          <textarea
              class="w-full h-full bg-transparent text-white placeholder-gray-400 resize-none focus:outline-none"
              placeholder="Adicionar um comentário..."
          ></textarea>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Responder
            </button>
        </div>
        {{--    Comentários--}}

        <div
            class="mb-4 w-full rounded-[12px] rounded-lg border border-[#2C2C2D] bg-[#131314] bg-gradient-to-br p-6"
        >
            @foreach ($comments as $comment)
                <div class="flex mb-4 flex-row items-start gap-3">
                    <img src="{{ $comment->user->avatar_url ?? '/images/nerd.svg' }}" alt="Avatar"
                         class="flex-none order-0 z-0 h-8 w-8 rounded-full" />
                    <div class="flex flex-col flex-grow">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-white">{{ $comment->user->name }}</span>
                            <span class="text-gray-400 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                            @if ($comment->user_id === $subreddit->user_id)
                                <span
                                    class="bg-blue-500 text-white text-xs px-2 py-0.5 rounded flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                  d="M5 13l4 4L19 7" />
                        </svg>
                        Autor
                    </span>
                            @endif
                        </div>
                        <p class="text-white mt-2">
                            {{ $comment->content }}
                        </p>
                        {{-- Respostas --}}
                        @foreach ($comment->replies as $reply)
                            <div class="ml-10 mt-4 mb-4 flex flex-row items-start gap-3">
                                <img src="{{ $reply->user->avatar_url ?? '/images/nerd.svg' }}" alt="Avatar"
                                     class="flex-none h-7 w-7 rounded-full" />
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-white">{{ $reply->user->name }}</span>
                                        <span
                                            class="text-gray-400 text-xs">{{ $reply->created_at->diffForHumans() }}</span>
                                        <p class="p-1 bg-[rgba(0,161,0,0.08)] border border-[rgba(0,161,0,0.16)] rounded-[8px]">
                                            resposta
                                        </p>
                                    </div>

                                    <p class="text-white mt-2">
                                        {{ $reply->content }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</div>

