<?php
// Add order to a table

if ($_POST) {
    $tableId = $_GET['id'];
    $formData = $_POST;

    if (isset($formData['entrees'])) {
        $db = new PDO('mysql:host=localhost;dbname=restaurant', 'jeremy', 'toor');
        $db->prepare('INSERT INTO tables_plats (table_id, plat_id) VALUES (:table, :plat)')
            ->execute(array(':table' => $tableId, ':plat' => $formData['entrees']));
    }
    if (isset($formData['plats'])) {
        $db = new PDO('mysql:host=localhost;dbname=restaurant', 'jeremy', 'toor');
        $db->prepare('INSERT INTO tables_plats (table_id, plat_id) VALUES (:table, :plat)')
            ->execute(array(':table' => $tableId, ':plat' => $formData['plats']));
    }
    if (isset($formData['desserts'])) {
        $db = new PDO('mysql:host=localhost;dbname=restaurant', 'jeremy', 'toor');
        $db->prepare('INSERT INTO tables_plats (table_id, plat_id) VALUES (:table, :plat)')
            ->execute(array(':table' => $tableId, ':plat' => $formData['desserts']));
    }

    header('Location: /restaurant/table.php');
}

