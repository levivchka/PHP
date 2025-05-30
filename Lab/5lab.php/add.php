<?php
function getAddForm() {
    $msg = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $db = getDb();
        try {
            $stmt = $db->prepare("INSERT INTO contacts (name, surname, last_name, gender, birth_date, phone, address, email, comment)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $_POST['name'], $_POST['surname'], $_POST['last_name'],
                $_POST['gender'], $_POST['birth_date'], $_POST['phone'],
                $_POST['address'], $_POST['email'], $_POST['comment']
            ]);
            $msg = '<div style="color:green;">Запись добавлена</div>';
        } catch(Exception $e) {
            $msg = '<div style="color:red;">Ошибка: запись не добавлена</div>';
        }
    }
    $form = $msg .
    '<div class="column">
        <form method="POST" autocomplete="off">
            <label for="name">Фамилия</label>
            <input type="text" name="name" id="name" placeholder="Фамилия" required>

            <label for="surname">Имя</label>
            <input type="text" name="surname" id="surname" placeholder="Имя" required>

            <label for="last_name">Отчество</label>
            <input type="text" name="last_name" id="last_name" placeholder="Отчество">

            <label for="gender">Пол</label>
            <select name="gender" id="gender" required>
                <option value="">Выберите пол</option>
                <option value="М">Мужской</option>
                <option value="Ж">Женский</option>
            </select>

            <label for="birth_date">Дата рождения</label>
            <input type="date" name="birth_date" id="birth_date" required>

            <label for="phone">Телефон</label>
            <input type="text" name="phone" id="phone" placeholder="Телефон">

            <label for="address">Адрес</label>
            <input type="text" name="address" id="address" placeholder="Адрес" required>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="E-mail" required>

            <label for="comment">Комментарий</label>
            <textarea name="comment" id="comment" placeholder="Комментарий"></textarea>

            <button type="submit" class="form-btn">Добавить</button>
        </form>
    </div>';
}
?>
