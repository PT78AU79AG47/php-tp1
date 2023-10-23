<?php
    if(isset($_GET['id']) && $_GET['id']!=null ){
        require_once('classe/GererSelect.php');
        $leSelect = new GererSelect('villes');
        $letableauVilles = $leSelect->valideSelect($_GET['id']);
        extract($letableauVilles); // Extraction des données.
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
    <title>Ajouter une ville</title>
    <style>
    </style>
</head>
<body>
    <h1>Ville Édition</h1>
    <form action="update-ville.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <label>Nom
            <input type="text" name="ville_nom" value="<?= $ville_nom; ?>">
        </label>
        <input type="submit" value="Mettre à jour">
        <button type="button" onclick="location.href='index.php'">Annuler</button>
    </form>
</body>
</html>