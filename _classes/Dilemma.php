<?php


class Dilemma
{
    public $id;
    public $verb;
    public $name;
    public $nb_vote;

    public function __construct($id)
    {
        global $db;

        $reqDilemma = $db->prepare('
            SELECT *
            FROM dilemme d
            INNER JOIN nom n ON n.id_name = d.id_name
            INNER JOIN verbe v ON v.id_verb = d.id_verb
            WHERE d.id_dilemma = ?
        ');

        $reqDilemma->execute([str_secur($id)]);
        $data = $reqDilemma->fetch();

        $this->id = $id;
        $this->id_verb = $data['id_verb'];
        $this->verb = $data['verb'];
        $this->id_name = $data['id_name'];
        $this->name = $data['name'];
        $this->nb_vote = $data['nb_vote'];
    }

    public static function getLeaderboard()
    {
        global $db;

        $reqLeaderboard = $db->prepare('
            SELECT DISTINCT *
            FROM dilemme d
            INNER JOIN nom n ON n.id_name = d.id_name
            INNER JOIN verbe v ON v.id_verb = d.id_verb
            ORDER BY d.nb_vote DESC
            LIMIT 3 
        ');

        $reqLeaderboard->execute();
        $leaderboard = $reqLeaderboard->fetchAll(PDO::FETCH_ASSOC);

        return $leaderboard;
    }

    public static function getRandomDilemma($idVerbe, $idNom)
    {
        global $db;

        $dilemma = [];

        return $dilemma;
    }

    public static function isExistingDilemma($id_verb, $id_name)
    {
        global $db;
        $reqDilemma = $db->prepare('
            SELECT d.id_dilemma
            FROM dilemme d
            WHERE (d.id_verb = '.$id_verb.' AND d.id_name = '.$id_name.')');
        $reqDilemma->execute();

        $id_dilemma = $reqDilemma->fetch();

        return $id_dilemma;
    }

    public static function createDilemma($id_verbe, $id_name)
    {
        global $db;

        if (!empty($id_verbe) && !empty($id_name)) {

            $addVerb = $db->prepare("INSERT INTO dilemme (id_verbe) VALUES  (".$id_verbe.")");
            $addVerb->execute();

            $addName = $db->prepare("INSERT INTO dilemme (id_nom) VALUES(".$id_name.")");
            $addName->execute();

            $reqLastId = $db->prepare('SELECT MAX(id_dilemme) FROM dilemme');
            $lastId = $reqLastId->fetch();

            $idDilemma = $lastId;

            return $idDilemma;
        }


    }