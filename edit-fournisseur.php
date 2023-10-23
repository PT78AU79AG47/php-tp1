<?php
    if(isset($_GET['id']) && $_GET['id']!=null ){
        require_once('classe/GererSelect.php');
        $leSelect = new GererSelect('fournisseurs');
        $letableauFournisseurs = $leSelect->valideSelect($_GET['id']);
        $leSelect2 = new GererSelect('villes');
        $letableauVilles = $leSelect2->valideSelect($_GET['id']);
        extract($letableauFournisseurs); // Extraction des données.
    }else{
        header('location:index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une fournisseur</title>
    <style>
    </style>
</head>
<body>
    <form action="update-fournisseur.php?fournisseurOriginal=<?= $fournisseur_nom; ?>" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <label>Nom</label>
        <input type="text" name="fournisseur_nom" value="<?= $fournisseur_nom; ?>">
        <label>Telephone</label>
        <input type="text" name="fournisseur_telephone" value="<?= $fournisseur_telephone; ?>">
        <label>Courriel</label>
        <input type="text" name="fournisseur_courriel" value="<?= $fournisseur_courriel; ?>">
        <label>Ville</label>
        <select name="fournisseur_ville" id="ville">
            <?php foreach($ville_data as $row): ?>
                <option value="<?= $row['ville_nom']; ?>"><?= $row['ville_nom']; ?></option>;
            <?php endforeach; ?>
        </select> 
        <input type="submit" value="Mettre à jour">
        <button type="button" onclick="location.href='index.php'">Annuler</button>
    </form>
</body>
</html>



