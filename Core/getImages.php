<?php

namespace Core;

require ("Database/Database.php");
$config = require ("Database/Config.php");



class GetImages
{
    public $db = new Database($config);
    public function index($query)
    {
        return $this->db->query($query)->fetchAll();


    }
}