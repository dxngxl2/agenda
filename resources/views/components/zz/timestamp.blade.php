<span>
    @php
        date_default_timezone_set($zonaHoraria ?? 'Europe/Madrid');
        echo date('Y-m-d H:i:s');
    @endphp
</span>
