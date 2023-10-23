<?php
    if(isset($_GET['id']) && $_GET['id']!=null ){
        require_once('classe/GererSelect.php');
        $leSelect = new GererSelect('produits');
        $letableauProduits = $leSelect->valideSelect($_GET['id']);
        $leSelect2 = new GererSelect('villes');
        $letableauVilles = $leSelect2->valideSelect($_GET['id']);
        extract($letableauProduits); // Extraction des données.
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
    <title>Ajouter un produit</title>
    <style>
    </style>
</head>
<body>
    <form action="update-produit.php?produitOriginal=<?= $produit_nom; ?>" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <label>Nom</label>
        <input type="text" name="produit_nom" value="<?= $produit_nom; ?>">
        <label>Description</label>
        <input type="text" name="produit_description" value="<?= $produit_description; ?>">
        <label>Prix</label>
        <input type="text" name="produit_prix" value="<?= $produit_prix; ?>">
        <label>Quantités</label>
        <input type="text" name="produit_quantite" value="<?= $produit_quantite; ?>">
           <input type="submit" value="Mettre à jour">
        <button type="button" onclick="location.href='index.php'">Annuler</button>
    </form>
</body>
</html>