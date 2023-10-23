<?php
    session_start();
    require_once('classe/GererSupression.php');
    $leSupprimer = new GererSupression('villes');
    $resultat = $leSupprimer->valideSupression($_GET['id']);
    $_SESSION['message'] = $resultat;
    header('location:index.php');
    exit();
?>