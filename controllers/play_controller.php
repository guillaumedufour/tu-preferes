<?php

$nbVerbs = Verb::countAllVerbs();
$nbNames = Name::countAllNames();

$idVerbe = mt_rand(1,$nbVerbs);
$idNom = mt_rand(1,$nbNames);

$dilemma1 = Dilemma::getDilemma($idVerbe, $idNom);

