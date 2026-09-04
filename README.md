# Laboratorio 1 - PHP

Ejercicios y laboratorios de práctica en PHP.
Materia: Desarrollo Web - Grupo 1S3122 - Instructora: Irina Fong

## Contenido

- `practica1_holamundo.php` - Ejercicio básico "Hola Mundo"
- `practica3_variables.php` - Uso de variables
- `phpEmbebido.php` - PHP embebido en HTML (funciones de cadena)
- `ejercicio1.php` - Ejercicio de práctica
- `formulario.php` / `pagina2.php` - Formulario HTML y su procesamiento en PHP
- `ejemploformulario.php` - Lectura de datos con `$_REQUEST`
- `operacionesMatematicas.php` - Operaciones matemáticas
- `problema2_calculadora.php` - Calculadora
- `Laboratorio1.php` - Laboratorio 1
- `laboratorio1_circulo.php` - Cálculo de área/perímetro de un círculo
- `laboratorio1_pulgadas_centimetros.php` - Conversión de pulgadas a centímetros
- `verificacion_phpinfo.php` - Verificación de configuración de PHP

## Requisitos

- PHP instalado
- Servidor web (Apache/XAMPP) o el servidor embebido de PHP (`php -S localhost:8000`)

## Cómo ejecutarlo

1. Abrir una terminal dentro de la carpeta del proyecto.
2. Levantar el servidor: `php -S localhost:8000`
3. Abrir en el navegador `http://localhost:8000/` y elegir el archivo a probar.

## Correcciones aplicadas a los problemas del laboratorio

Se revisaron los problemas del laboratorio para agregar validación de datos,
saneamiento de las entradas y comentarios que expliquen cada paso.

### 1. `laboratorio1_circulo.php` (área y perímetro del círculo)
- Se cambió `is_numeric()` por `filter_var(..., FILTER_VALIDATE_FLOAT)`, que además
  entrega el número ya convertido.
- Se agregó `trim()` para descartar los espacios sobrantes del campo.
- Se rechaza el radio menor o igual a 0 y se muestra un aviso de error en pantalla.
- Se agregó `htmlspecialchars()` en la salida para evitar la inyección de HTML/JS (XSS).
- El valor de PI quedó en una constante con `define()` y los resultados se redondean con `round()`.

### 2. `laboratorio1_pulgadas_centimetros.php` (pulgadas a centímetros)
- Misma validación con `trim()` y `filter_var(..., FILTER_VALIDATE_FLOAT)`.
- Se rechazan los valores no numéricos y los negativos, con su mensaje de error.
- El factor 2.54 quedó como constante y la salida pasa por `htmlspecialchars()`.

### 3. `verificacion_phpinfo.php`
- Se comentó que esta página no recibe datos del usuario, por lo que no necesita validación.

### 4. `phpEmbebido.php` (imprimir cadenas)
- Se reemplazó el `echo` suelto por ejemplos de funciones de cadena:
  `trim()`, `ucfirst()`, `strtoupper()`, `strtolower()` y `strlen()`.
- La salida se arma en una tabla y pasa por `htmlspecialchars()`.

### 5. `formulario.php` y `pagina2.php` (nombre y edad)
- El nombre se valida con `trim()`, `empty()` e `is_string()`.
- La edad se valida con `filter_var(..., FILTER_VALIDATE_INT)` y se limita al rango 0 a 120.
- Los errores se acumulan en un arreglo y se muestran todos juntos en una lista.
- Toda la salida pasa por `htmlspecialchars()`.
- `pagina2.php` ahora verifica que la petición llegue por POST antes de procesar.

### 6. `README.md`
- Se documentaron los requisitos, la forma de ejecutar el proyecto y el detalle de cada corrección.
