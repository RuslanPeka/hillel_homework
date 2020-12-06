<?php

/* === Домашнее задание №4. Пека Руслан === */

// Дополнительная функция для просмотра массивов (сделал для себя, для удобства работы)
function arr($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

// 1. Создать функцию определяющую какой тип данных ей передан и выводящей соответствующее сообщение, если данные не переданы то вывести соответствующее сообщение.

function checkType($val)
{
    if(empty($val)) {
        echo 'Данные не переданы';
    } else {
        echo gettype($val);
    }
}

// Примеры использования:
echo '<b>Задание 1</b><br>';
checkType('Work');  // Выводит: string
echo '<br>';
checkType(12);      // Выводит: integer
echo '<br>';
checkType(3.14);    // Выводит: double
echo '<br>';
checkType(null);    // Выводит: Данные не переданы
echo '<br>';
$var;
checkType($var);    // Выводит: Данные не переданы

// 2. Создать функцию которая считает все буквы b в переданной строке, в случае если передается не строка функция должна возвращать false

function quantity_b($val)
{
    if(is_string($val)) {
        $result = substr_count($val, 'b');
    } else {
        $result = false;
    }
    return $result;
}

// Примеры использования:
echo '<br><br><b>Задание 2</b><br>';
echo quantity_b('baaaabaaaab') . '<br>';        // Выводит: 3
echo quantity_b('baaaa baaaa bbb') . '<br>';    // Выводит: 5
$str = 'Super betmobil';
echo quantity_b($str) . '<br>';                 // Выводит: 2
$num = 3;
echo quantity_b($num) . '<br>';                 // Выводит: ничего не выводит (но тег <br>, конечно, сработал)
if(quantity_b($num) == false) echo 'false';     // Выводит: false       Т.е. сработало верно, по условию


// 3. Создать функцию которая считает сумму значений всех элементов массива произвольной глубины
// Создам пару тестовых массивов
// Массив №1 (для простоты подсчёта все числа - единицы):
$arr1 = [
    '1' => 1,
    '2' => 1,
    '3' => 1,
    '4' => [
        '4.1' => 1,
        '4.2' => 1,
        '4.3' => [
            '4.3.1' => 1,
            '4.3.2' => 1,
            '4.3.3' => 1,
            '4.3.4' => 1
        ]
    ],
    '5' => 1
];

// Массив №2 (для простоты подсчёта все числа - десятки):
$arr2 = [
    '1' => 10,
    '2' => [
        '2.1' => 10,
        '2.2' => [
            '2.2.1' => 10,
            '2.2.2' => [
                '2.2.2.1' => 10,
                '2.2.2.2' => [
                    '2.2.2.2.1' => 10
                ]
            ]
        ]
    ],
    '3' => 10
];

echo '<br><br><b>Задание 3</b><br>';
echo 'Массив №1';
arr($arr1);
echo 'Массив №2';
arr($arr2);

function arrFullSum(array $arr) 
{
    $sum = array_sum($arr);
    foreach($arr as $v) {
        if(is_array($v)) {
            $sum += arrFullSum($v);
        }
    }
    return $sum;
}

echo '<b>Результат:</b><br>';
echo 'Количество элементов массива №1: ' . arrFullSum($arr1);       // Результат: 10
echo '<br>';
echo 'Количество элементов массива №2: ' . arrFullSum($arr2);       // Результат: 60

// 4. Создать функцию которая определит сколько квадратов меньшего размера можно вписать в квадрат большего размера размер возвращать в float
// ПРИМЕЧАНИЕ 1. Сделал 3 варианта, т.к. в задании не уточнили, как будут задаваться квадраты - сразу их площадь или задаём сторону квадрата
// ПРИМЕЧАНИЕ 2. Местами использовал функцию округления round() для получения более красивого значения

// Вариант 1. Задаём сразу площадь квадратов + играет роль последовательность аргументов:
function squares1(float $big, float $small) : float
{
    if($small > $big) {
        echo 'Первый аргумент должен быть больше второго! ';
    } else {
        $result = $big / $small;
    }
    if(empty($result)) $result = 0;
    return $result;
}

// Проверка функции №1:
echo '<br><br><b>Задание 4</b><br>';
echo '<b>Вариант 1</b><br>';
if(squares1(16, 4) != 0) echo squares1(16, 4). '<br>';                      // Выводит: 4
if(squares1(20, 7.29) != 0) echo round(squares1(20, 7.29), 3) . '<br>';     // Выводит: 2.743
if(squares1(16, 20) != 0) echo squares1(16, 20);                            // Выводит: Первый аргумент должен быть больше второго!
echo '<br><br>';

// Вариант 2. Задаём сразу площадь квадратов + последовательность аргументов не играет роли:
function squares2(float $sq1, float $sq2) : float
{
    if(!is_numeric($sq1) or !(is_numeric($sq2))) {
        echo 'Площади квадратов должны быть заданы числовыми значениями! ';
    } else {
        if($sq1 > $sq2) {
            $result = $sq1 / $sq2;
        } else {
            $result = $sq2 / $sq1;
        }
    }
    if(empty($result)) $result = 0;
    return $result;
}

// Проверка функции №2:
echo '<b>Вариант 2</b><br>';
if(squares2(36, 6) != 0) echo squares2(36, 6) . '<br>';                  // Выводит: 6
if(squares2(6, 36) != 0) echo squares2(6, 36) . '<br>';                  // Выводит: 6
if(squares2(12, 1.69) != 0) echo round(squares2(12, 1.69), 3) . '<br>';  // Выводит: 7.101
echo '<br><br>';

// Вариант 3. Задаём лишь стороны квадратов + последовательность аргументов не играет роли:
function squares3(float $side1, float $side2) : float
{
    if($side1 > $side2) {
        $big = $side1 ** 2;
        $small = $side2 ** 2;
    } else {
        $big = $side2 ** 2;
        $small = $side1 ** 2;
    }
    $result = $big / $small;
    if(empty($result)) $result = 0;
    return $result;
}

// Проверка функции №3:
echo '<b>Вариант 3</b><br>';
echo squares3(3, 9) . '<br>';               // Выводит: 9
echo squares3(10, 5) . '<br>';              // Выводит: 4
echo round(squares3(10, 6), 3) . '<br>';    // Выводит: 2.778

?>