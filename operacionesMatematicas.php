<?php
// Realizar las operaciones matemáticas en PHP #2 (diapositivas 55-60)

// 1) Suma
$num1 = 4;
$num2 = 7;
$suma = $num1 + $num2;
echo "La suma de $num1 y $num2 es: $suma"; // La suma de 4 y 7 es: 11
echo "<br>";

// 2) Resta
$num1 = 10;
$num2 = 3;
$resta = $num1 - $num2;
echo "La resta de $num1 y $num2 es: $resta"; // La resta de 10 y 3 es: 7
echo "<br>";

// 3) Multiplicación
$num1 = 5;
$num2 = 6;
$multiplicacion = $num1 * $num2;
echo "La multiplicación de $num1 y $num2 es: $multiplicacion"; // La multiplicación de 5 y 6 es: 30
echo "<br>";

// 4) División
$num1 = 20;
$num2 = 4;
$division = $num1 / $num2;
echo "La división de $num1 y $num2 es: $division"; // La división de 20 y 4 es: 5
echo "<br>";

// 5) Módulo
$num1 = 15;
$num2 = 4;
$modulo = $num1 % $num2;
echo "El módulo de $num1 y $num2 es: $modulo"; // El módulo de 15 y 4 es: 3
echo "<br>";

// 6) Potenciación
$base = 2;
$exponente = 3;
$potencia = $base ** $exponente;
echo "La potencia de $base elevado a $exponente es: $potencia"; // La potencia de 2 elevado a 3 es: 8
echo "<br><br>";

// Redondeo: round(), ceil() y floor()
$numero = 4.6;
$redondeado = round($numero);
$redondeado_arriba = ceil($numero);
$redondeado_abajo = floor($numero);
echo "El número redondeado es: $redondeado"; // El número redondeado es: 5
echo "<br>";
echo "El número redondeado hacia arriba es: $redondeado_arriba"; // El número redondeado hacia arriba es: 5
echo "<br>";
echo "El número redondeado hacia abajo es: $redondeado_abajo"; // El número redondeado hacia abajo es: 4
echo "<br><br>";

// El resultado del operador módulo % tiene el mismo signo que el dividendo
echo (5 % 3)."<br>";   // muestra 2
echo (5 % -3)."<br>";  // muestra 2
echo (-5 % 3)."<br>";  // muestra -2
echo (-5 % -3)."<br>"; // muestra -2
echo "<br>";

// Valor absoluto: abs()
$numero = -7;
$valor_absoluto = abs($numero);
echo "El valor absoluto de $numero es: $valor_absoluto"; // El valor absoluto de -7 es: 7
?>
