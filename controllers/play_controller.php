<?php

$verbsIds = Verb::getVerbsIds();
$namesIds = Name::getNamesIds();

$idVerb = array_rand($verbsIds);
$idName = array_rand($namesIds);

$idDilemma1 = Dilemma::isExistingDilemma($idVerb, $idName);

if ($idDilemma1 === false OR $idDilemma1 === null) {

    $idDilemma1 = Dilemma::createDilemma($idVerb, $idName);
}

$fullDilemma1 = new Dilemma($idDilemma1);

$idVerb = array_rand($verbsIds);
$idName = array_rand($namesIds);

$idDilemma2 = Dilemma::isExistingDilemma($idVerb, $idName);

if ($idDilemma2 === false OR $idDilemma2 === null) {
    $idDilemma = Dilemma::createDilemma($idVerb, $idName);
}

$fullDilemma2 = new Dilemma($idDilemma2);




