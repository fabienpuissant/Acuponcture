<?php

require_once("donnees_acu.php");

if (isset($_POST['meridiens'])){
    $meridienTable = $_POST['meridiens'];
} else {
    $meridienTable = [''];
}

if (isset($_POST['pathologies'])){
    $pathologiesTable = $_POST['pathologies'];
} else {
    $pathologiesTable = [''];
}

if (isset($_POST['caracteristiques'])){
    $caracteristiquesTable = $_POST['caracteristiques'];
} else {
    $caracteristiquesTable = [''];
}

if (isset($_POST['motclef'])){
    $mot_clef = $_POST['motclef'];
} else {
    $mot_clef = '';
}

$bdd = new donnees_acu();
$tableau = $bdd->recherche($meridienTable,$pathologiesTable,$caracteristiquesTable,$mot_clef);

die(json_encode($tableau));