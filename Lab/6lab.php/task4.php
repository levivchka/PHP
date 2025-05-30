<!-- Куки.
По заходу на страницу запишите в куку с именем test текст '123'. 
Затем обновите страницу и выведите содержимое этой куки на экран.
-->


<?php

if (!isset($_COOKIE['test'])) {
    setcookie('test', '123', time() + 3600, '/'); 
    $message = "Кука 'test' с значением '123' установлена. Обновите страницу.";
} else {
    $cookieValue = htmlspecialchars($_COOKIE['test']);
    $message = "Значение куки 'test': $cookieValue";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="cookie-info">
        <p><?php echo $message; ?></p>
        
        <?php if (isset($_COOKIE['test'])): ?>
            <p><a href="?refresh">Обновить страницу</a> | <a href="?clear">Удалить куку</a></p>
        <?php else: ?>
            <p><a href="?refresh">Обновить страницу</a></p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
if (isset($_GET['clear'])) {
    setcookie('test', '', time() - 3600, '/');
    header("Location: ".strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}
?>  