<?php
function viewContacts($sort = 'added', $page = 1) {
    $db = getDb();
    $sortSql = match($sort) {
        'name' => 'ORDER BY name, surname',
        'birth_date' => 'ORDER BY birth_date',
        default => 'ORDER BY id'
    };

    $perPage = 10;
    $offset = ($page - 1) * $perPage;
    $total = $db->query("SELECT COUNT(*) FROM contacts")->fetchColumn();

    $stmt = $db->prepare("SELECT * FROM contacts $sortSql LIMIT :perPage OFFSET :offset");
    $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $html = '<table border="1" cellpadding="6" style="border-collapse:collapse;width:100%;margin-bottom:15px;">';
    $html .= '<tr>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Пол</th>
        <th>Дата рождения</th>
        <th>Телефон</th>
        <th>Адрес</th>
        <th>E-mail</th>
        <th>Комментарий</th>
    </tr>';
    foreach ($rows as $row) {
        $html .= '<tr>';
        foreach (['name', 'surname', 'last_name', 'gender', 'birth_date', 'phone', 'address', 'email', 'comment'] as $col) {
            $html .= '<td>' . htmlspecialchars($row[$col]) . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</table>';

    $pages = ceil($total / $perPage);
    if ($pages > 1) {
        $html .= '<div style="margin-bottom:20px;">';
        for ($i = 1; $i <= $pages; $i++) {
            $style = "margin:2px 4px;padding:2px 6px;text-decoration:none;";
            if ($i == $page) $style .= "border:2px solid #888;font-weight:bold;background:#eee;";
            else $style .= "border:1px solid #ccc;";
            $html .= "<a href='?action=view&sort=$sort&page=$i' style='$style'>$i</a>";
        }
        $html .= '</div>';
    }

    return $html;
}
?>
