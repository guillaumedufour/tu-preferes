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

    function getDilemma($idVerbe, $idNom)
    {
        global $db;

        $dilemma = [];

        return $dilemma;
    }


}