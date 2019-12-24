<?php


class Verb
{
    public $id;
    public $name;

    public function __construct($id)
    {
        global $db;

        $reqVerb = $db->prepare('
            SELECT * 
            FROM verbe v
            WHERE v.id_verb = ?
        ');

        $reqVerb->execute([str_secur($id)]);
        $data = $reqVerb->fetch();

        $this->id = $id;
        $this->verb = $data['verb'];
    }

    public static function countAllVerbs()
    {
        global $db;

        $countVerbs = $db->prepare("SELECT COUNT(*) FROM verbe");
        $countVerbs->execute();

        $data = $countVerbs->fetchAll(PDO::FETCH_ASSOC);

        $nbVerbs = $data;

        return $nbVerbs;
    }

}