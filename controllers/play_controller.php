<?php

$verbsIds = Verb::getVerbsIds();
$namesIds = Name::getNamesIds();

$idVerb = array_rand($verbsIds);
$idName = array_rand($namesIds);

$dilemma1 = Dilemma::getRandomDilemma($idVerb, $idName);
$idDilemma1 = Dilemma::isExistingDilemma($idVerb, $idName);

if (empty($idDilemma1)) {
    $idDilemma1 = Dilemma::createDilemma($idVerb, $idName);
}

$idVerb = array_rand($verbsIds);
$idName = array_rand($namesIds);

$dilemma2 = Dilemma::getRandomDilemma($idVerb, $idName);
$idDilemma2 = Dilemma::isExistingDilemma($idVerb, $idName);

if (empty($idDilemma2)) {
    $idDilemma = Dilemma::createDilemma($idVerb, $idName);
}



