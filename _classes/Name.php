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

    public static function countAllNames()
    {
        global $db;

        $countNames = $db->prepare("SELECT COUNT(*) FROM nom");
        $countNames->execute();

        $data = $countNames->fetchAll(PDO::FETCH_ASSOC);

        $nbNames = $data;

        return $nbNames;
    }

}