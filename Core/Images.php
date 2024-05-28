<?php

namespace Core;


use Core\Database;

class Images
{
    public function allImages()
    {
        $db = new Database();
        return $db->findAll("select * from images");


    }
}