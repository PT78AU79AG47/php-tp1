<?php
    session_start();
    require_once('classe/GererAjout.php');
    $ajout = new GererAjout('fournisseurs', 'fournisseur_nom', $_POST);
    $resultat = $ajout->valideAjout();
    $_SESSION['message'] = $resultat;
    header('location:index.php');
    exit();
?>




