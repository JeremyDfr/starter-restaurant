<?php require 'layouts/base.php' ?>

<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=restaurant', 'jeremy', 'toor');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tables = $dbh->query('SELECT * FROM tables');
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>

<div id="tables" class="d-flex gap-3">
    <?php foreach ($tables as $table): ?>
        <a href="table-one.php?id=<?= $table['id'] ?>" class="p-5 bg-primary text-white">Table <?= $table['numero'] ?></a>
    <?php endforeach; ?>
</div>

<?php require 'footer.php' ?>
