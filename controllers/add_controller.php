<?php

if (isset($_POST['new_dilemma'])) {

    addDilemma();
}

function addDilemma()
{
    $verb = str_secur($_POST['verb']);
    $name = str_secur($_POST['name']);
    $verb2 = str_secur($_POST['verb2']);
    $name2 = str_secur($_POST['name2']);

    if (!empty($verb) && !empty($name) && !empty($name2) && !empty($verb2)) {

        global $db;

        $addVerb = $db->prepare("INSERT INTO verb (verb) VALUES  ('".$verb."')");
        $addVerb->execute();

        $addName = $db->prepare("INSERT INTO name (name) VALUES('".$name."')");
        $addName->execute();

        $addVerb2 = $db->prepare("INSERT INTO verb (verb) VALUES('".$verb2."')");
        $addVerb2->execute();

        $addName2 = $db->prepare("INSERT INTO name (name) VALUES ('".$name2."')");
        $addName2->execute();


    } else {
        die('hey ho ! pas de carabistouilles hein ! Une erreur s\'est produite !');
    }

}