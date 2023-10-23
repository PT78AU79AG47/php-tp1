<?php
    session_start();
    require_once('classe/GererAjout.php');
    $ajout = new GererAjout('categories', 'categorie_nom', $_POST);
    $resultat = $ajout->valideAjout();
    $_SESSION['message'] = $resultat;
    header('location:index.php');
    exit();
?>