<?php
    session_start();
    require_once('classe/GererUpdate.php');
    $update = new GererUpdate('produits', 'produit_nom', $_POST);
    $resultat = $update->valideUpdate($_POST['id']);
    $_SESSION['message'] = $resultat;
    header('location:index.php');
    exit();
?>