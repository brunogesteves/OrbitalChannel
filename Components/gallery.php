

<?php

class getImagesGallery
{
    public $connection;
    public $statment;
    public function __construct()
    {

        $config = [
            "host" => "sql109.infinityfree.com",
            "port" => 3306,
            "dbname" => "if0_36762808_orbital",
            "charset" => "utf8mb4"
        ];

        $dsn = 'mysql:' . http_build_query($config, "", ";");

        $this->connection = new PDO($dsn, "if0_36762808", "lya92WJOl7HLwW", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    private function query($query, $params = [])
    {


        $this->statment = $this->connection->prepare($query);

        $this->statment->execute($params);



        return $this;
    }

    public function getImagesFromDB($query)
    {

        self::query($query);
        return $this->statment->fetchAll();
    }

    

    public function index()
    {       


        $images = self::getImagesFromDB("SELECT * from images");
        header("Content-Type: application/json");


        $list = [];        

        $myObj = new stdClass();
        $myObj->statusCode = 200;

        foreach ($images as $image) {            

            array_push($list, [
                // "src" => "http://orbitalchannel.42web.io/../images/" . $image["name"],
                        "src" => "http://orbitalchannel.42web.io" . "./../images/" . $image["name"],

                "name" => $image["name"]
            ]);

        }
        $myObj->result = $list;
        echo json_encode($myObj, JSON_UNESCAPED_SLASHES);

        }
    }

$allImges = new getImagesGallery();
$allImges->index();
