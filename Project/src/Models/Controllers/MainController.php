<?php

namespace src\Models\Controllers;

class MainController{
    public function main(){
        echo "Главная Страница<br>";
    }

    public function sayHello(string $name){
        echo "Hello, $name!<br>";
    }

}