<!-- Сессии.
Запишите в сессию время захода пользователя на сайт. 
При обновлении страницы выводите сколько 
секунд назад пользователь зашел на сайт. -->


<?php
session_start();

if (!isset($_SESSION['first_visit_time'])){
    $_SESSION['first_visit_time']=time();
    $message = "Вы только что зашли на сайт!";
} else {
    $secondsAgo = time() - $_SESSION['first_visit_time'];
    $message = "С момента вашего первого захода прошло: $secondsAgo секунд";
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Время на сайте</title>
</head>
<body>
    <div class=time>
        <h1>
            <?php
            echo $message
            ?>
        </h1>
        
        <p>Ваше первое время захода было: 
        <?php
            echo date('H:i:s', $_SESSION['first_visit_time'])
        ?>
        </p>
    </div>
</body>
</html>