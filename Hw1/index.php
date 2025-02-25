<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hw1</title>
    <link rel="stylesheet" href="style.css">
    <style>
        header {
            display: flex;
        }
        .title {
            margin-left: 10.5rem;
        }  
        main {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <header>
        <img src="Mospolytech.jpg" alt="logo" width='250px' height='70px'>
        <h1 class="title">Домашняя работа: Hello, World!</h1> 
    </header>
    <main>
        <!--выводим текст через PHP -->
        <?php
            echo "Hello, world!";
        ?>
    </main>
    <footer>
        <h2>Задание для самостоятельной работы</h2> 
        <br/> 
        <h2>Пестова Виктория 241-321</h2>
    </footer>
</body>
</html>