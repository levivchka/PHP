//1
<?php
echo 'Задание 1<br>';
$a = 27;
$b = 12;

// Вычисляем гипотенузу
$c = sqrt($a ** 2 + $b ** 2);

// Округляем до двух знаков после запятой
$c = round($c, 2);

// Выводим результат
echo "Гипотенуза: $c";

$a = 27;
$b = 12;
$c = sqrt($a ** 2 + $b ** 2);
$c = round($c, 2);
echo "Гипотенуза: $c";


 //5
 echo 'Задание 5<br>';
$a = 2;
$b = 2.0;
$c = '2';
$d = 'two';
$g = true;
$f = false;

echo $a . $c . "<br>"; 
echo $c . $a . "<br>"; 
echo $d . $a . "<br>"; 
echo $g . $d . "<br>"; 
echo $f . $d . "<br>"; 
echo $a . $g . "<br>"; 
echo $b . $d . "<br>"; 
echo $d . $f . "<br>"; 
echo $c . $d . "<br>"; 
echo $d . $c . "<br>";
echo $g . $f . "<br>"; 


 //14
 echo 'Задание 14<br>';
 $quiter = 'Тише';
 $go = 'едешь';
 $further = 'дальше';
 echo $quiter . " " . $go . " - " . $further . " будешь.<br><br>";

 //23
 echo 'Задание 23<br>';
 $a=7;
 $b=4;
 $c=' воробья';
 $v=$a-$b;
 echo $v . $c . "<br><br>";

 ?>