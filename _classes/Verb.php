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
            FROM verb v
            WHERE v.id_verb = ?
        ');

        $reqVerb->execute([str_secur($id)]);
        $data = $reqVerb->fetch();

        $this->id = $id;
        $this->verb = $data['verb'];
    }

    public static function getVerbsIds()
    {
        global $db;

        $reqVerbsIds = $db->prepare("SELECT id_verb FROM verb");
        $reqVerbsIds->execute();

        $data = $reqVerbsIds->fetchAll(PDO::FETCH_ASSOC);

        $verbsIds = $data;

        return $verbsIds;
    }

}