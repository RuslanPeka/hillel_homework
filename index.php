<?php

/* Домашнее задание №5. Руслан Пека */

// Вспомогательная функция
function export($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

/* 
    Задание №1
    (+) Создать родительский (главный класс)
    (+) Класс должен содержать 2 свойства
    (+) Каждое свойство должно иметь геттеры и сеттеры 
*/

class Main
{
    private $one = 1;
    private $two = 2;

    public function getOne()
    {
        return $this -> one;
    }

    public function getTwo()
    {
        return $this -> two;
    }

    public function setOne($value)
    {
        $this -> one = $value;
    }

    public function setTwo($value)
    {
        $this -> two = $value;
    }
}

// Вывод результатов задания №1
echo '<b>Задание №1</b><br>';

// Проверка работы геттеров
$main = new Main;
export($main);
export($main -> getOne());  // Выводит: 1
export($main -> getTwo());  // Выводит: 2

// Проверка работы сеттеров
$mainTest = new Main;
$mainTest -> setOne(10);
$mainTest -> setTwo(20);
export($mainTest -> getOne());  // Выводит: 10
export($mainTest -> getTwo());  // Выводит: 20

/* 
    2) Создать 3 наследника родительского класса
    (+) Каждый наследник должен содержать одно свойство
    (+) Каждое свойство должно иметь геттер и сеттер
    (+) Наследники должны реализовать по одному методу который выполняет одно математическое действие с данными родителя и своими данными
    (+) Один наследник не должен быть наследуемым
    (+) Один из наследников должен содержать абстрактную функцию возведения в степень
*/

// Всего - 3 наследника 1-го уровня
// 1-й наследник 1-го уровня
class HeirOne extends Main
{
    private $propertyOne = 10;

    public function getPrOne()
    {
        return $this -> propertyOne;
    }

    public function setPrOne($val1)
    {
        $this -> propertyOne = $val1;
    }

    public function sumOne()
    {
        return ($this -> getOne() + $this -> getPrOne());
    }
}

// 2-й наследник 1-го уровня    (содержит абстрактную функцию возведения в степень - она будет описана в классе-наследнике 2-го уровня)
abstract class HeirTwo extends Main
{
    private $propertyTwo = 20;

    public function getPrTwo()
    {
        return $this -> propertyTwo;
    }

    public function setPrTwo($val2)
    {
        $this -> propertyTwo = $val2;
    }

    public function divTwo()
    {
        return ($this -> getPrTwo() / $this -> getTwo());
    }

    abstract public function powTwo();
}

// 3-й наследник 1-го уровня    (не наследуется)
final class HeirThree extends Main
{
    private $propertyThree = 30;

    public function getPrThree()
    {
        return $this -> propertyThree;
    }

    public function setPrThree($val3)
    {
        $this -> propertyThree = $val3;
    }

    public function multThree()
    {
        return ($this -> getTwo() * $this -> getPrThree());
    }
}

// Вывод результатов задания №2
echo '<b>Задание №2</b><br>';
$prOne = new HeirOne;
export($prOne -> sumOne());         // Выводит: 11          (Верно, т.к. 1 + 10 = 11)
$prThree = new HeirThree;
export($prThree -> multThree());    // Выводит: 60          (Верно, 2 * 30 = 60)

/*
    3) Создать по 2 наследника от наследников первого уровня
    (+) Каждое свойство должно иметь геттер и сеттер
    (+) Наследники должны реализовать по одному методу который выполняет одно математическое действие с данными родителя и своими данными
    (+) И по одному методу который выполняет любое математическое действие со свойством корневого класса и своим свойством
    (+) В случае если реализован наследник класса содержащего абстрактную функцию то класс должен содержать реализацию абстракции
*/

// ПРИМЕЧАНИЕ. Т.к. один из наследников 1-го уровня - ненаследуемый, получим всего 4 метода наследника 2-го уровня

class A1 extends HeirOne
{
    private $a1 = 5;

    public function getA1()
    {
        return $this -> a1;
    }

    public function setA1($val)
    {
        $this -> a1 = $val;
    }

    public function mathA1()
    {
        return (($this -> getPrOne() * $this -> getA1()) / 12);
    }

    public function mathRelA1()
    {
        return (9 + $this -> getA1() - $this -> getOne());
    }
}

class A2 extends HeirOne
{
    private $a2 = 15;

    public function getA2()
    {
        return $this -> a2;
    }

    public function setA2($val)
    {
        $this -> a2 = $val;
    }

    public function mathA2()
    {
        return (($this -> getPrOne() / $this -> getA2()) * 4);
    }

    public function mathRelA2()
    {
        return ($this -> getA2() * $this -> getOne());
    }
}

class B1 extends HeirTwo
{
    private $b1 = 25;

    public function getB1()
    {
        return $this -> b1;
    }

    public function setB1($val)
    {
        $this -> b1 = $val;
    }

    public function mathB1()
    {
        return (($this -> getPrTwo() + $this -> getB1()) ** 2);
    }

    public function mathRelB1()
    {
        return (14 * ($this -> getB1() + $this -> getTwo()));
    }

    public function powTwo()
    {
        return ($this -> getPrTwo() ** $this -> getTwo());
    }
}

class B2 extends HeirTwo
{
    private $b2 = 35;

    public function getB2()
    {
        return $this -> b2;
    }

    public function setB2($val)
    {
        $this -> b2 = $val;
    }

    public function mathB2()
    {
        return (($this -> getPrTwo() - $this -> getB2()) + 40);
    }

    public function mathRelB2()
    {
        return (1 + $this -> getB2() * $this -> getTwo());
    }

    public function powTwo()
    {
        return ($this -> getPrTwo() ** $this -> getTwo());
    }
}

// Вывод результатов задания №2
echo '<b>Задание №3</b><br>';
$a1 = new A1;
$a2 = new A2;
$b1 = new B1;
$b2 = new B2;
export($a1 -> mathA1());        // Выводит: 4,1(6)  (Верно, т.к. (10 * 5) / 12 = 4,1(6))
export($a1 -> mathRelA1());     // Выводит: 13      (Верно, т.к. 9 + 5 - 1 = 13)
export($a2 -> mathA2());        // Выводит: 2,(6)   (Верно: т.к. 10 / 15 * 4 = 2,(6))
export($a2 -> mathRelA2());     // Выводит: 15      (Верно, т.к. 1 * 15 = 15)
export($b1 -> mathB1());        // Выводит: 2025    (Верно, т.к. (20 + 25)^2 = 2025)
export($b1 -> mathRelB1());     // Выводит: 387     (Верно, т.к. 14 * (25 + 2) = 387)
export($b2 -> mathB2());        // Выводит: 25      (Верно, т.к. 20 - 35 + 40 = 25)
export($b2 -> mathRelB2());     // Выводит: 71      (Верно, т.к. 1 + (32 * 2) = 71)

// Проверка работоспособности абстрактного метода
export($b1 -> powTwo());        // Выводит: 400     (Верно, т.к. 20^2 = 400)

?>