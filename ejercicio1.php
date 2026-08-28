<?php
    if (date ('a' == 'pm')) {
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