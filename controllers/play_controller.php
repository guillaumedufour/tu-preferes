<?php

$nbVerbs = Verb::countAllVerbs();
$nbNames = Name::countAllNames();


$idVerbe = mt_rand(1,$nbVerbs);
$idNom = mt_rand(1,$nbNames);
$idVerbe2 = mt_rand(1,$nbVerbs);
$idNom2 = mt_rand(1,$nbNames);

$dilemma = Dilemma::getDilemma($idVerbe, $idNom, $idVerbe2, $idNom2);

