<link rel="stylesheet" href="style.css">

<?php
require_once 'db.php';
require_once 'menu.php';
require_once 'viewer.php';
require_once 'add.php';
require_once 'edit.php';
require_once 'delete.php';

$action = $_GET['action'] ?? 'view';
$sort = $_GET['sort'] ?? 'added';

echo getMenu($action, $sort);

switch ($action) {
    case 'add':
        echo getAddForm();
        break;
    case 'edit':
        echo getEditForm();
        break;
    case 'delete':
        echo getDeleteForm();
        break;
    case 'view':
    default:
        $page = $_GET['page'] ?? 1;
        echo viewContacts($sort, $page);
        break;
}
?>
