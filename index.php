<?php

/*
    Домашнее задание №2. Действия с данными. Руслан Пека
*/

// === 1. Действия с числами ===
echo '<h1>1. Действия с числами</h1>';

// 1.1. Получение остатка от деления 7 на 3:
$num1 = 7;
$num2 = 3;
$result = $num1 % $num2;  // Получение остатка от деления
echo '1.1. Остаток от деления числа ' .$num1 . ' на число ' . $num2 . ' равен: <b>' . $result . '</b><br><br>';

// 1.2. Получение целой части сложения 7 и 7.15:
$num1 = 7;
$num2 = 7.15;
$result = round($num1 + $num2);   // Получение целой части сложения
echo '1.2. Целая часть сложения числа ' . $num1 . ' и числа ' . $num2 . ' равняется: <b>' . $result . '</b><br><br>';

// 1.3. Получение корня из 25:
$num = 25;
$result = sqrt($num);   // Использование функции вычисления квадратного корня
echo "1.3. Корень квадратный числа $num равен: <b>$result</b><br><br>";   // Вариант вывода в двойных кавычках для разнообразия

// === 2. Действия со строками ===
echo '<h1>2. Действия со строками</h1>';

// 2.1. Получить 4-е слово из фразы - Десять негритят пошли купаться в море
$str = "Десять негритят пошли купаться в море";
$str_array = explode(" ", $str);    // Разбиение строки на элементы массива по разделителю (в данном случае разделитель - пробел)
echo '2.1. 4-е слово фразы: <b>' . $str_array[3] . '</b><br><br>';     // Вывод 4-го элемента массива (т.к. нумерация начинается с нуля)

// 2.2. Получить 17-й символ из фразы - Десять негритят пошли купаться в море
$str = "Десять негритят пошли купаться в море";
echo '2.2. 17-й символ из фразы: <b>' . $str[16] . '</b><br><br>';
// Примечание (!) Выводит не русский символ, а знак вопроса. Решить проблему кодировки соответствующей функцией не удалось.
// Данный способ работает лишь с латинскими символами
// echo '2.2. 17-й символ из фразы: <b>' . iconv("UTF-8", "Windows-1251", $str[16]) . '</b><br><br>';

// 2.3. Сделать заглавной первую букву во всех словах фразы - Десять негритят пошли купаться в море
$str = "Dесять nегритят pошли kупаться v mоре"; // (!) Изменил первые буквы на латинские, т.к. с русскими - результата не было. Проблему кодировки в функциях решить не удалось
$str_array = explode(" ", $str);
$count = count($str_array);
for($i = 0; $i < $count; $i++) {
    $str_array[$i] = ucfirst(strtolower($str_array[$i]));
    //echo $str_array[$i] . '<br>';
}
$result = implode(" ", $str_array);
echo '2.3. Загравные буквы во всех словах: <b>' . $result . '</b><br><br>';

// 2.4. Посчитать длину строки - Десять негритят пошли купаться в море
$str = "Десять негритят пошли купаться в море";
$result1 = strlen($str);    // Длина строки (количество байт)
$result2 = iconv_strlen($str);  // Длина строки (количество символов)
echo '2.4. Подсчёт длины строки:<br>';
echo 'Длина строки (количество байт): <b>' . $result1 . '</b><br>';
echo 'Длина строки (количество символов): <b>' . $result2 . '</b><br><br>';

// === 3. Действия с логическими значениями ===
echo '<h1>3. Действия с логическими значениями</h1>';

// 3.1. Правильно ли утверждение true равно 1
echo '3.1. Проверка утверждения, что true равно 1:<br>';
if(true == 1) {
    echo "Правильно, что <b>true равно 1</b>.";    // Получаем этот ответ - правильно!
} else {
    echo "Неправильно. <b>true не равно 1</b>.";
}
echo '<br><br>';

// 3.2. Правильно ли утверждение false тождественно 0
echo '3.2. Проверка утверждения, что false тождественно 0:<br>';
if(false === 0) {
    echo "Правильно, что <b>false тождественно 0</b>.";
} else {
    echo "Неправильно. <b>false не тождественно 0</b>.";    // Получаем этот ответ - НЕправильно!
}
echo '<br><br>';

// 3.3. Какая строка длиннее three - три
// Примечание (!) Не уточнён тип сравнения, поэтому воспользуюсь на свой выбор - посимвольным сравнением
$str1 = "three";
$str2 = "три";
$len1 = iconv_strlen($str1);
$len2 = iconv_strlen($str2);
if($len1 > $len2) {
    echo 'Строка <b>' . $str1 . '</b> длиннее строки <b>' . $str2 . '</b>.';    // Получаем этот ответ: 'three' длиннее, чем 'три'!
} elseif ($len1 < $len2) {
    echo 'Строка <b>' . $str2 . '</b> длиннее строки <b>' . $str1 . '<b>.';
} else {
    echo 'Строки <b>' . $str1 . '</b> и <b>' . $str2 . '</b> равны.';
}
echo '<br><br>';

// 3.4. Какое число больше 125 умножить на 13 плюс 7 или 223 плюс 28 умножить 2
// Примечание (!) В задании нет указания на использование скобок, поэтому числа вводились "как есть".
$num1 = 125 * 13 + 7;
$num2 = 223 + 28 * 2;
if($num1 > $num2) {
    echo 'Число <b>125 * 13 + 7</b> больше числа <b>223 + 28 * 2</b>.';    // Получаем этот ответ: число 125 * 13 + 7 - больше!
} elseif ($num1 < $num2) {
    echo 'Число <b>223 + 28 * 2</b> больше числа <b>125 * 13 + 7<b>.';
} else {
    echo 'Числа <b>125 * 13 + 7</b> и <b>223 + 28 * 2</b> равны.';
}

/* Конец домашнего задания №2 */