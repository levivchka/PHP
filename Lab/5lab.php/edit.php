<?php
function getEditForm() {
    $db = getDb();
    $contacts = $db->query("SELECT * FROM contacts ORDER BY name, surname")->fetchAll(PDO::FETCH_ASSOC);

    $edit_id = $_GET['id'] ?? ($contacts[0]['id'] ?? null);
    $msg = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        try {
            $stmt = $db->prepare("UPDATE contacts SET name=?, surname=?, last_name=?, gender=?, birth_date=?, phone=?, address=?, email=?, comment=? WHERE id=?");
            $stmt->execute([
                $_POST['name'], $_POST['surname'], $_POST['last_name'],
                $_POST['gender'], $_POST['birth_date'], $_POST['phone'],
                $_POST['address'], $_POST['email'], $_POST['comment'], $_POST['id']
            ]);
            $msg = '<div style="color:green;">Запись обновлена</div>';
            $edit_id = $_POST['id'];
        } catch(Exception $e) {
            $msg = '<div style="color:red;">Ошибка: не удалось обновить запись</div>';
        }
    }

    $html = '<div style="margin-bottom:12px;">';
    foreach ($contacts as $c) {
        $isActive = ($c['id'] == $edit_id);
        $style = $isActive ? 'font-weight:bold;color:darkred;text-decoration:underline;' : 'color:navy;';
        $html .= "<a href='?action=edit&id={$c['id']}' style='$style;margin-right:10px;'>" .
                 htmlspecialchars($c['name'] . ' ' . $c['surname']) . '</a>';
    }
    $html .= '</div>';

    $current = null;
    foreach ($contacts as $c) if ($c['id'] == $edit_id) $current = $c;
    if ($current) {
        $genders = ['М' => 'Мужской', 'Ж' => 'Женский'];
        $html .= $msg . '<form method="POST" style="margin-bottom:20px;">
            <input type="hidden" name="id" value="'.htmlspecialchars($current['id']).'">
            <input name="name" placeholder="Фамилия" value="'.htmlspecialchars($current['name']).'" required><br>
            <input name="surname" placeholder="Имя" value="'.htmlspecialchars($current['surname']).'" required><br>
            <input name="last_name" placeholder="Отчество" value="'.htmlspecialchars($current['last_name']).'"><br>
            <select name="gender" required>
                <option value="">Пол</option>';
        foreach ($genders as $k => $v) {
            $sel = ($current['gender'] == $k) ? 'selected' : '';
            $html .= "<option value='$k' $sel>$v</option>";
        }
        $html .= '</select><br>
            <input type="date" name="birth_date" value="'.htmlspecialchars($current['birth_date']).'" required><br>
            <input name="phone" placeholder="Телефон" value="'.htmlspecialchars($current['phone']).'"><br>
            <input name="address" placeholder="Адрес" value="'.htmlspecialchars($current['address']).'"><br>
            <input name="email" placeholder="E-mail" value="'.htmlspecialchars($current['email']).'"><br>
            <textarea name="comment" placeholder="Комментарий">'.htmlspecialchars($current['comment']).'</textarea><br>
            <button type="submit">Сохранить</button>
        </form>';
    } else {
        $html .= '<div>Нет записей для редактирования.</div>';
    }

    return $html;
}
?>
