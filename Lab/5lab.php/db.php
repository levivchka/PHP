<?php
function getDb() {
    static $db = null;
    if ($db === null) {
        $db = new PDO('mysql:host=localhost;
        dbname=contacts;
        charset=utf8', 
        'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $db;
}
?>
