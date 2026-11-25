<?php
// Задача 3. Обработка массива товаров (только fn + функции массивов, без циклов)

$products = [
    ['title' => 'Книга',    'price' => 500],
    ['title' => 'Рюкзак',   'price' => 2500],
    ['title' => 'Кружка',   'price' => 350],
    ['title' => 'Наушники', 'price' => 4200],
    ['title' => 'Блокнот',  'price' => 150],
];

// 1) массив строк «Название – цена руб.»
$lines = array_map(fn($p) => "{$p['title']} – {$p['price']} руб.", $products);
echo implode("\n", $lines), "\n\n";

// 2) товары дороже 1000 руб., выводим только названия
$expensive = array_filter($products, fn($p) => $p['price'] > 1000);
$expensiveTitles = array_map(fn($p) => $p['title'], $expensive);
echo implode(", ", $expensiveTitles), "\n\n"; // Рюкзак, Наушники

// 3) общая стоимость всех товаров
$total = array_reduce($products, fn($sum, $p) => $sum + $p['price'], 0);
echo "Общая стоимость: $total руб.\n\n"; // 7700

// 4) всем товарам скидка 15%
$withDiscount = array_map(fn($p) => [
    'title' => $p['title'],
    'price' => $p['price'] * 0.85,
], $products);

$discountLines = array_map(fn($p) => "{$p['title']} – {$p['price']} руб.", $withDiscount);
echo implode("\n", $discountLines), "\n";

/*
Вывод в терминале:
Книга – 500 руб.
Рюкзак – 2500 руб.
Кружка – 350 руб.
Наушники – 4200 руб.
Блокнот – 150 руб.

Рюкзак, Наушники

Общая стоимость: 7700 руб.

Книга – 425 руб.
Рюкзак – 2125 руб.
Кружка – 297.5 руб.
Наушники – 3570 руб.
Блокнот – 127.5 руб.
*/
