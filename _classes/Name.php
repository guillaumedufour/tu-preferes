<?php


class Name
{
    public $id;
    public $name;

    public function __construct($id)
    {
        global $db;

        $reqName = $db->prepare('
            SELECT * 
            FROM nom n
            WHERE n.id_name = ?
        ');

        $reqName->execute([str_secur($id)]);
        $data = $reqName->fetch();

        $this->id = $id;
        $this->name = $data['name'];
    }

    public static function getNamesIds()
    {
        global $db;

        $reqNamesIds = $db->prepare("SELECT id_name FROM nom");
        $reqNamesIds->execute();

        $data = $reqNamesIds->fetchAll(PDO::FETCH_ASSOC);

        $namesIds = $data;

        return $namesIds;
    }

}