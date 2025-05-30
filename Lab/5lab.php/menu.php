<?php
function getMenu($active, $subActive = 'added') {
    $menu = [
        'view' => 'Просмотр',
        'add' => 'Добавление записи',
        'edit' => 'Редактирование записи',
        'delete' => 'Удаление записи',
    ];
    $html = '<nav style="margin-bottom:20px;">';
    foreach ($menu as $key => $title) {
        $color = ($key === $active) ? 'red' : 'blue';
        $html .= "<a href='?action=$key' style='color:$color;font-weight:bold;margin-right:10px;text-decoration:none;border:1px solid $color;padding:5px 10px;border-radius:5px;'>" . htmlspecialchars($title) . "</a>";
    }
    $html .= '</nav>';

    if ($active === 'view') {
        $subs = [
            'added' => 'По добавлению',
            'name' => 'По фамилии',
            'birth_date' => 'По дате рождения'
        ];
        $html .= '<div style="margin-bottom:10px;">';
        foreach ($subs as $k => $v) {
            $color = ($k === $subActive) ? 'red' : 'blue';
            $size = '0.9em';
            $html .= "<a href='?action=view&sort=$k' style='color:$color;font-size:$size;margin-right:7px;text-decoration:none;border:1px solid $color;padding:3px 8px;border-radius:4px;'>" . htmlspecialchars($v) . "</a>";
        }
        $html .= '</div>';
    }
    return $html;
}
?>
