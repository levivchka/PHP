<?php
function getDeleteForm() {
    $db = getDb();
    $contacts = $db->query("SELECT id, name, surname, last_name FROM contacts ORDER BY name, surname")->fetchAll(PDO::FETCH_ASSOC);

    $msg = '';
    if (isset($_GET['del'])) {
        $id = intval($_GET['del']);
        $stmt = $db->prepare("SELECT name FROM contacts WHERE id=?");
        $stmt->execute([$id]);
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($contact) {
            $db->prepare("DELETE FROM contacts WHERE id=?")->execute([$id]);
            $msg = '<div style="color:green;">Запись с фамилией '.htmlspecialchars($contact['name']).' удалена</div>';
        } else {
            $msg = '<div style="color:red;">Запись не найдена</div>';
        }
    }

    $html = $msg . '<div style="margin-bottom:15px;">';
    foreach ($contacts as $c) {
        $fio = htmlspecialchars($c['name'].' '.mb_substr($c['surname'],0,1).'.'.mb_substr($c['last_name'],0,1).'.');
        $html .= "<a href='?action=delete&del={$c['id']}' style='color:brown;margin-right:10px;'>$fio</a>";
    }
    $html .= '</div>';

    return $html;
}
?>
