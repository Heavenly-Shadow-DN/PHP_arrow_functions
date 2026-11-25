<?php
// Задача 1. Знакомство с синтаксисом fn

$square = fn(int $x): int => $x * $x;
$isEven = fn(int $x): bool => $x % 2 == 0;
$greet = fn(string $name): string => "Привет, $name!";
$max = fn(int $a, int $b): int => $a > $b ? $a : $b;

echo $square(4), "\n";      // 16
echo $square(9), "\n";      // 81

echo $isEven(10) ? 'true' : 'false', "\n"; // true
echo $isEven(7) ? 'true' : 'false', "\n";  // false

echo $greet('Иван'), "\n";   // Привет, Иван!
echo $greet('Анна'), "\n";   // Привет, Анна!

echo $max(12, 5), "\n";      // 12
echo $max(3, 48), "\n";      // 48

// Та же функция $square в классическом виде:
// $square = function (int $x): int {
//     return $x * $x;
// };
// Вариант с fn занимает одну строку, а классический - четыре:
// нужны function, фигурные скобки и return.

/*
Вывод в терминале:
16
81
true
false
Привет, Иван!
Привет, Анна!
12
48
*/
