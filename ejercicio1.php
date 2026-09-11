<?php
    // Sin esta línea PHP usa la hora UTC, 5 horas por delante de Panamá
    date_default_timezone_set('America/Panama');

    // date('a') devuelve "am" o "pm"; la comparación va fuera de los paréntesis de date()
    if (date('a') == 'pm') {
        $saludo = 'Buenas tardes/noches!';
    } else {
        $saludo = 'Buenos dias!';
    }
?>
<html>
<head><title>Ejemplo</title></head>
<body>
<h1><?php echo $saludo; ?></h1>
</body></html>    