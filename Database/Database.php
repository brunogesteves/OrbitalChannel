<?php



class Database
{
    public $connection;

    public function __construct($config)
    {

        $dsn = 'mysql:' . http_build_query($config, "", ";");

        $this->connection = new PDO($dsn, "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {

        $statment = $this->connection->prepare($query);

        $statment->execute($params);

        return $statment;
    }


}