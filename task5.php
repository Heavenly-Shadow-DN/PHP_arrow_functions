<?php
// Задача 5. Итоговый мини-проект «Анализ заказов»

$orders = [
    ['id' => 1, 'customer' => 'Иван',  'total' => 1200, 'status' => 'done'],
    ['id' => 2, 'customer' => 'Мария', 'total' => 800,  'status' => 'new'],
    ['id' => 3, 'customer' => 'Пётр',  'total' => 3500, 'status' => 'done'],
    ['id' => 4, 'customer' => 'Анна',  'total' => 600,  'status' => 'cancelled'],
    ['id' => 5, 'customer' => 'Олег',  'total' => 2100, 'status' => 'done'],
];

// 1) выручка по выполненным заказам
$done = array_filter($orders, fn($o) => $o['status'] == 'done');
$revenue = array_reduce($done, fn($sum, $o) => $sum + $o['total'], 0);
echo "Выручка по выполненным заказам: $revenue руб.\n\n"; // 6800

// 2) заказы на сумму свыше 1000 руб.
$big = array_filter($orders, fn($o) => $o['total'] > 1000);
$bigLines = array_map(
    fn($o) => "Заказ №{$o['id']} – {$o['total']} руб. ({$o['customer']})",
    $big
);
echo "Заказы дороже 1000 руб.:\n";
echo implode("\n", $bigLines), "\n\n";

// 3) самый дорогой выполненный заказ
$doneCopy = $done;
usort($doneCopy, fn($a, $b) => $b['total'] <=> $a['total']);
$top = $doneCopy[0];
echo "Самый дорогой выполненный заказ: №{$top['id']} – {$top['total']} руб. ({$top['customer']})\n\n";

// 4) имена всех клиентов без дубликатов
$customers = array_unique(array_map(fn($o) => $o['customer'], $orders));
echo "Клиенты: ", implode(", ", $customers), "\n\n";

// 5) итоговая статистика
$cancelled = array_filter($orders, fn($o) => $o['status'] == 'cancelled');
echo "Всего заказов: ", count($orders), "\n";
echo "Выполнено: ", count($done), "\n";
echo "Отменено: ", count($cancelled), "\n";
echo "Сумма выручки: $revenue руб.\n";

/*
Вывод в терминале:
Выручка по выполненным заказам: 6800 руб.

Заказы дороже 1000 руб.:
Заказ №1 – 1200 руб. (Иван)
Заказ №3 – 3500 руб. (Пётр)
Заказ №5 – 2100 руб. (Олег)

Самый дорогой выполненный заказ: №3 – 3500 руб. (Пётр)

Клиенты: Иван, Мария, Пётр, Анна, Олег

Всего заказов: 5
Выполнено: 3
Отменено: 1
Сумма выручки: 6800 руб.
*/
