<?php

declare(strict_types=1);

?>
<x-mail::message>
    # Olá, {{ $user['name'] }} Indentificamos um novo acesso a sua conta, no dia: {{ $date }} as {{ $hour }}, do ip
    {{ $ip }}. Obrigado,
    <br />
    {{ config('app.name') }}
</x-mail::message>
<?php 
