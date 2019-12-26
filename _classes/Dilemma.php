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
            FROM dilemma d
            INNER JOIN name n ON n.id_name = d.id_name
            INNER JOIN verb v ON v.id_verb = d.id_verb
            WHERE d.id_dilemma = ?
        ');

        $reqDilemma->execute([$id]);
        $data = $reqDilemma->fetch(PDO::FETCH_ASSOC);

        if (!empty($data)) {
            $this->id = $id;
            $this->id_verb = $data['id_verb'];
            $this->verb = $data['verb'];
            $this->id_name = $data['id_name'];
            $this->name = $data['name'];
            $this->nb_vote = $data['nb_vote'];

            return $this;
        }
        return false;

    }

    public static function getLeaderboard()
    {
        global $db;

        $reqLeaderboard = $db->prepare('
            SELECT DISTINCT *
            FROM dilemma d
            INNER JOIN name n ON n.id_name = d.id_name
            INNER JOIN verb v ON v.id_verb = d.id_verb
            ORDER BY d.nb_vote DESC
            LIMIT 3 
        ');

        $reqLeaderboard->execute();
        $leaderboard = $reqLeaderboard->fetchAll(PDO::FETCH_ASSOC);

        return $leaderboard;
    }


    public static function isExistingDilemma($id_verb, $id_name)
    {
        global $db;
        $reqDilemma = $db->prepare('
            SELECT d.id_dilemma
            FROM dilemma d
            WHERE (d.id_verb = '.$id_verb.' AND d.id_name = '.$id_name.')');
        $reqDilemma->execute();

        $id_dilemma = $reqDilemma->fetch(PDO::FETCH_ASSOC);

        return $id_dilemma['id_dilemma'];
    }

    public static function createDilemma($id_verbe, $id_name)
    {
        global $db;

        if (!empty($id_verbe) && !empty($id_name)) {

            $reqAddDilemma = $db->prepare("
            INSERT INTO dilemma (id_verb,id_name) VALUES (".$id_verbe.",".$id_name.")");
            $reqAddDilemma->execute();

            $reqLastId = $db->prepare('SELECT MAX(id_dilemma) FROM dilemma');
            $reqLastId->execute();
            $lastId = $reqLastId->fetch();


            $idDilemma = $lastId[0];


            return $idDilemma;
        }
    }

    public static function getRandomDilemmaId()
    {
        $verbsIds = Verb::getVerbsIds();
        $namesIds = Name::getNamesIds();

        $idVerb = array_rand($verbsIds);

        if ($idVerb === 0 OR $idVerb === null or $idVerb === false) {
            $idVerb = array_rand($verbsIds);
        }

        $idName = array_rand($namesIds);
        if ($idName === 0 OR $idName === null or $idName === false) {
            $idName = array_rand($namesIds);
        }

        $idDilemma = Dilemma::isExistingDilemma($idVerb, $idName);


        if ($idDilemma === false OR $idDilemma === null) {
            $idDilemma = Dilemma::createDilemma($idVerb, $idName);
        }

        return $idDilemma;
    }

    public static function vote($idDilemma)
    {

    }
}