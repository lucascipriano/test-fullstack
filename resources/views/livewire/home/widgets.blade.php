<?php

declare(strict_types=1);

?>

<div>
    <div class="mb-4">
        <h1 class="flex-none grow-0 self-stretch text-[24px] leading-[29px] font-semibold text-white">
            Olá,
            <span class="text-[#6155F5]">
                {{ auth()->user() ? auth()->user()->name : 'Visitante' }}
            </span>
        </h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        <div
            class="flex h-[108px] w-[320px] flex-row items-center gap-4 rounded-[12px] border border-[rgba(79,57,246,0.32)] bg-[linear-gradient(270deg,rgba(79,57,246,0)_0%,rgba(79,57,246,0.08)_100%)] p-8 backdrop-blur-[27.7px]"
        >
            <div>
                <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="44" height="44" rx="4" fill="#4F39F6" />
                    <g clip-path="url(#clip0_5902_4030)">
                        <path
                            d="M17 30.3333V15.3333C17 14.8913 17.1756 14.4673 17.4881 14.1548C17.8007 13.8422 18.2246 13.6666 18.6666 13.6666H25.3333C25.7753 13.6666 26.1992 13.8422 26.5118 14.1548C26.8244 14.4673 27 14.8913 27 15.3333V30.3333M17 30.3333H27M17 30.3333H15.3333C14.8913 30.3333 14.4673 30.1577 14.1548 29.8451C13.8422 29.5326 13.6666 29.1087 13.6666 28.6666V23.6666C13.6666 23.2246 13.8422 22.8007 14.1548 22.4881C14.4673 22.1756 14.8913 22 15.3333 22H17M27 30.3333H28.6666C29.1087 30.3333 29.5326 30.1577 29.8451 29.8451C30.1577 29.5326 30.3333 29.1087 30.3333 28.6666V21.1666C30.3333 20.7246 30.1577 20.3007 29.8451 19.9881C29.5326 19.6756 29.1087 19.5 28.6666 19.5H27M20.3333 17H23.6666M20.3333 20.3333H23.6666M20.3333 23.6666H23.6666M20.3333 27H23.6666"
                            stroke="#FDFDFD"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </g>
                    <defs>
                        <clipPath id="clip0_5902_4030">
                            <rect width="20" height="20" fill="white" transform="translate(12 12)" />
                        </clipPath>
                    </defs>
                </svg>
            </div>

            <div class="flex flex-col">
                <span class="text-[14px] leading-[14px] font-medium text-[#9C9C9C]">Quantidade de usuários</span>

                <span class="text-[20px] leading-[24px] font-semibold dark:text-[#4F4F4F]">
                    {{ $userCount }}
                </span>
            </div>
        </div>

        <div
            class="flex h-[108px] w-[320px] flex-row items-center gap-4 rounded-[12px] border border-[rgba(165,228,18,0.32)] bg-[linear-gradient(270deg,rgba(165,228,18,0)_0%,rgba(165,228,18,0.08)_100%)] p-8 backdrop-blur-[27.7px]"
        >
            <div>
                <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="44" height="44" rx="4" fill="#A5E412" />
                    <g clip-path="url(#clip0_5902_855)">
                        <path
                            d="M17.0001 30.3333V15.3333C17.0001 14.8913 17.1757 14.4674 17.4882 14.1548C17.8008 13.8423 18.2247 13.6667 18.6667 13.6667H25.3334C25.7754 13.6667 26.1994 13.8423 26.5119 14.1548C26.8245 14.4674 27.0001 14.8913 27.0001 15.3333V30.3333M17.0001 30.3333H27.0001M17.0001 30.3333H15.3334C14.8914 30.3333 14.4675 30.1577 14.1549 29.8452C13.8423 29.5326 13.6667 29.1087 13.6667 28.6667V23.6667C13.6667 23.2246 13.8423 22.8007 14.1549 22.4882C14.4675 22.1756 14.8914 22 15.3334 22H17.0001M27.0001 30.3333H28.6667C29.1088 30.3333 29.5327 30.1577 29.8453 29.8452C30.1578 29.5326 30.3334 29.1087 30.3334 28.6667V21.1667C30.3334 20.7246 30.1578 20.3007 29.8453 19.9882C29.5327 19.6756 29.1088 19.5 28.6667 19.5H27.0001M20.3334 17H23.6667M20.3334 20.3333H23.6667M20.3334 23.6667H23.6667M20.3334 27H23.6667"
                            stroke="#09090A"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </g>
                    <defs>
                        <clipPath id="clip0_5902_855">
                            <rect width="20" height="20" fill="white" transform="translate(12 12)" />
                        </clipPath>
                    </defs>
                </svg>
            </div>

            <div class="flex flex-col">
                <span class="text-[14px] leading-[14px] font-medium text-[#9C9C9C]">
                    {{ auth()->user() ? 'Seus posts' : 'Quantidade de posts totais' }}
                </span>

                <span class="text-[20px] leading-[24px] font-semibold dark:text-[#4F4F4F]">
                    {{ auth()->user() ? $postUser : $postsCount }}
                </span>
            </div>
        </div>
        <div
            class="flex h-[108px] w-[320px] flex-row items-center gap-4 rounded-[12px] border border-[rgba(79,57,246,0.32)] bg-[linear-gradient(270deg,rgba(79,57,246,0)_0%,rgba(79,57,246,0.08)_100%)] p-8 backdrop-blur-[27.7px]"
        >
            <div>
                <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="44" height="44" rx="4" fill="#4F39F6" />
                    <g clip-path="url(#clip0_5902_4030)">
                        <path
                            d="M17 30.3333V15.3333C17 14.8913 17.1756 14.4673 17.4881 14.1548C17.8007 13.8422 18.2246 13.6666 18.6666 13.6666H25.3333C25.7753 13.6666 26.1992 13.8422 26.5118 14.1548C26.8244 14.4673 27 14.8913 27 15.3333V30.3333M17 30.3333H27M17 30.3333H15.3333C14.8913 30.3333 14.4673 30.1577 14.1548 29.8451C13.8422 29.5326 13.6666 29.1087 13.6666 28.6666V23.6666C13.6666 23.2246 13.8422 22.8007 14.1548 22.4881C14.4673 22.1756 14.8913 22 15.3333 22H17M27 30.3333H28.6666C29.1087 30.3333 29.5326 30.1577 29.8451 29.8451C30.1577 29.5326 30.3333 29.1087 30.3333 28.6666V21.1666C30.3333 20.7246 30.1577 20.3007 29.8451 19.9881C29.5326 19.6756 29.1087 19.5 28.6666 19.5H27M20.3333 17H23.6666M20.3333 20.3333H23.6666M20.3333 23.6666H23.6666M20.3333 27H23.6666"
                            stroke="#FDFDFD"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </g>
                    <defs>
                        <clipPath id="clip0_5902_4030">
                            <rect width="20" height="20" fill="white" transform="translate(12 12)" />
                        </clipPath>
                    </defs>
                </svg>
            </div>

            <div class="flex flex-col">
                <span class="text-[14px] leading-[14px] font-medium text-[#9C9C9C]">
                    {{ auth()->user() ? 'Seus Subs' : 'Quantidade de subs criados' }}
                </span>

                <span class="text-[20px] leading-[24px] font-semibold dark:text-[#4F4F4F]">
                    {{ auth()->user() ? $subUser : $subRedditsCount }}
                </span>
            </div>
        </div>
    </div>
</div>

<?php
