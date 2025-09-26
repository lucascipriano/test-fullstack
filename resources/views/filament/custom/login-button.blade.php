<?php

declare(strict_types=1);

?>
@if (auth()->guest())
    <a
        href=""
        class="fi-btn fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md fi-btn-outlined text-custom-600 ring-custom-600 hover:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-500 relative inline-grid grid-flow-col items-center justify-center gap-1.5 rounded-lg px-3 py-2 text-sm font-semibold ring-1 transition duration-75 outline-none focus-visible:ring-2"
    >
        <span class="fi-btn-label">Acessar Plataforma</span>
    </a>
@endif
<?php 
