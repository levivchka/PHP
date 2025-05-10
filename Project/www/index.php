<?php

spl_autoload_register(function (string $ClassName) {
    require(dirname(__DIR__).'\\'.$ClassName . '.php');
});
    

    $controller = new src\Controllers\MainController;
    if (isset($_GET['name'])) $controller->sayHello($_GET['name']);
    else $controller->main();
    // $user = new \src\Models\Users\User('Ivan');
    // $article = new \src\Models\Articles\Article('title', 'text', $user);
    // echo $article->getAuthor()->getName();
