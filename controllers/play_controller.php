<?php

$idDilemma1 = Dilemma::getRandomDilemmaId();
while ($idDilemma1 === null) {
    $idDilemma1 = Dilemma::getRandomDilemmaId();
}

$dilemma1 = new Dilemma($idDilemma1);

$idDilemma2 = Dilemma::getRandomDilemmaId();
while ($idDilemma2 === null) {
    $idDilemma2 = Dilemma::getRandomDilemmaId();
}
$dilemma2 = new Dilemma($idDilemma2);




