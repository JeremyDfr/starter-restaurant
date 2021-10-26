<?php require 'layouts/base.php' ?>

<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=restaurant', 'jeremy', 'toor');
    $query = $dbh->prepare('SELECT * FROM tables WHERE id = :id', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $query->execute(array(':id' => $_GET['id']));
    $table = $query->fetch();

    $entrees = $dbh->query('SELECT * FROM plats WHERE type_id = 1');
    $plats = $dbh->query('SELECT * FROM plats WHERE type_id = 2');
    $desserts = $dbh->query('SELECT * FROM plats WHERE type_id = 3');

    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>

<div id="tableOne">
    <h1>Table numéros <?= $table['numero'] ?></h1>

    <form action="actions/ActionTableOrder.php?id=<?= $table['id'] ?>" method="post">
        <div>
            <label for="entrees">Entrées</label>
            <select class="form-control" name="entrees" id="entrees">
                <option value="">-- Choisir une entrée --</option>
                <?php foreach ($entrees as $entree): ?>
                    <option value="<?= $entree['id'] ?>"><?= $entree['nom'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="plats">Plats</label>
            <select class="form-control" name="plats" id="plats">
                <option value="">-- Choisir un plat --</option>
                <?php foreach ($plats as $plat): ?>
                    <option value="<?= $plat['id'] ?>"><?= $plat['nom'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="dessert">Dessert</label>
            <select class="form-control" name="dessert" id="dessert">
                <option value="">-- Choisir un dessert --</option>
                <?php foreach ($desserts as $dessert): ?>
                    <option value="<?= $dessert['id'] ?>"><?= $dessert['nom'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit">Enregistrer</button>
    </form>
</div>

<?php require 'footer.php' ?>
