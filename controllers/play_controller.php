<?php

$nbVerbs = countAllVerbs();
$nbNames = countAllNames();


$idVerbe = mt_rand(1,$nbVerbs);
$idNom = mt_rand(1,$nbNames);
$idVerbe2 = mt_rand(1,$nbVerbs);
$idNom2 = mt_rand(1,$nbNames);

getDilemma($idVerbe, $idNom, $idVerbe2, $idNom2);


function getDilemma($idVerbe, $idNom, $idVerbe2, $idNom2)
{
    global $db;

    $dilemma = [];

    return $dilemma;


}


function countAllVerbs()
{
    global $db;

    $countVerbs = $db->prepare("SELECT COUNT(*) FROM verbe");
    $countVerbs->execute();

    $data = $countVerbs->fetchAll();

    $nbVerbs = $data[0];

    return $nbVerbs;
}


function countAllNames()
{
    global $db;

    $countNames = $db->prepare("SELECT COUNT(*) FROM nom");
    $countNames->execute();

    $data = $countNames->fetchAll();

    $nbNames = $data[0];

    return $nbNames;
}