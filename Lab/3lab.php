<?php
echo "<br>Задание 2<br>";
file_put_contents('test.txt',"12345");

//Переименовывание файлов.
rename('old.txt', 'new.txt');
echo "Файл переименован!";

echo "<br>Задание 3<br>";
$files = ['1.txt', '2.txt', '3.txt'];
$all_content = '';
foreach($files as $file) {
    $content = file_get_contents($file);
    $all_content .= $content;
}
file_put_contents('new.txt', $all_content);

echo "<br>Задание 7<br>";
$file = 'test.txt';
file_put_contents($file, '!', FILE_APPEND);

echo "<br>Задание 23<br>";
file_put_contents('new.txt', '', );
?>