<?php
// Задача 4. Сортировка и вложенные стрелочные функции

$students = [
    ['name' => 'Анна',  'grade' => 4.5],
    ['name' => 'Борис', 'grade' => 3.2],
    ['name' => 'Вера',  'grade' => 4.8],
    ['name' => 'Глеб',  'grade' => 2.9],
];

// 1) сортировка по убыванию оценки
usort($students, fn($a, $b) => $b['grade'] <=> $a['grade']);
echo "Рейтинг по убыванию оценки:\n";
echo implode("\n", array_map(fn($s) => "{$s['name']} – {$s['grade']}", $students)), "\n\n";

// 2) сортировка копии по алфавиту
$copy = $students;
usort($copy, fn($a, $b) => strcmp($a['name'], $b['name']));
echo "По алфавиту:\n";
echo implode("\n", array_map(fn($s) => "{$s['name']} – {$s['grade']}", $copy)), "\n\n";

// 3) вложенная стрелочная функция: функция, возвращающая функцию
$greaterThan = fn($limit) => fn($student) => $student['grade'] > $limit;

$best = array_filter($students, $greaterThan(4.0));
echo "Студенты с оценкой выше 4.0:\n";
echo implode("\n", array_map(fn($s) => "{$s['name']} – {$s['grade']}", $best)), "\n\n";

// 4) количество таких студентов
echo "Количество: ", count($best), "\n";

/*
Вывод в терминале:
Рейтинг по убыванию оценки:
Вера – 4.8
Анна – 4.5
Борис – 3.2
Глеб – 2.9

По алфавиту:
Анна – 4.5
Борис – 3.2
Вера – 4.8
Глеб – 2.9

Студенты с оценкой выше 4.0:
Вера – 4.8
Анна – 4.5

Количество: 2
*/
