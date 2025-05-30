<?php

namespace app\Controllers;
use app\View\View; //подключаем класс View
// используем пространство имен app\View        
// используем пространство имен app\Controllers

class MainController{ //
    // класс MainController отвечает за логику приложения
    // и взаимодействие с пользователем
    // в этом классе мы будем обрабатывать запросы пользователя
    // и возвращать ответы в виде HTML страниц
    // в этом классе мы будем использовать класс View для отображения HTML страниц
    private $view;
    public function __construct()  // это специальный метод, который выполняется при создании объекта
    {
        $this->view = new View;   //обращение к свойству класса, создает новый объект класса View
    }

    public function main(){
        $articles = [
            'article 1'=>[
                'title'=>'Title 1',
                'text'=>'Lorem ipsum',
                'author'=>'olga',
                'date'=>'09-09-1999'
            ],
            'article 2'=>[
                'title'=>'Title 1',
                'text'=>'Lorem ipsum',
                'author'=>'olga',
                'date'=>'09-09-1999'
            ]            
        ];
        $this->view->renderHtml('article/index', ['articles'=>$articles]);
    }

    public function sayHello(string $name){
        $this->view->renderHtml('main/hello', ['name'=>$name]);
    }
}