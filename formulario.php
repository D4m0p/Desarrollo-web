<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de entrada del dato</title>
    <style>
        body { font-family: "Segoe UI", Arial, sans-serif; background: #eceff1; color: #263238; padding: 25px; }
        .caja { background: #fff; border: 1px solid #cfd8dc; border-radius: 6px; padding: 18px; max-width: 340px; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input[type="text"] { width: 100%; padding: 6px; margin: 6px 0 12px 0; box-sizing: border-box;
                             border: 1px solid #b0bec5; border-radius: 4px; }
        input[type="submit"] { width: 100%; padding: 8px; border: 0; border-radius: 4px;
                               background: #37474f; color: #fff; cursor: pointer; }
        input[type="submit"]:hover { background: #263238; }
    </style>
</head>
<body>
    <h1>Formulario de entrada del dato</h1>

    <div class="caja">
    <form method="post" action="pagina2.php">
        <label for="nombre">Ingrese su nombre:</label>
        <input type="text" name="nombre" id="nombre">

        <label for="edad">Ingrese su Edad:</label>
        <input type="text" name="edad" id="edad">

        <input type="submit" value="confirmar">
    </form>
    </div>
</body>
</html>
