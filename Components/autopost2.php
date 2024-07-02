<?php

class AutomaticPosts
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

    public function update($query)
    {



        return self::query($query);
    }

    public function createSlug($string)
    {

        $table = array(
            'Š' => 'S',
            'š' => 's',
            'Đ' => 'Dj',
            'đ' => 'dj',
            'Ž' => 'Z',
            'ž' => 'z',
            'Č' => 'C',
            'č' => 'c',
            'Ć' => 'C',
            'ć' => 'c',
            'À' => 'A',
            'Á' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Ä' => 'A',
            'Å' => 'A',
            'Æ' => 'A',
            'Ç' => 'C',
            'È' => 'E',
            'É' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Ì' => 'I',
            'Í' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ñ' => 'N',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ö' => 'O',
            'Ø' => 'O',
            'Ù' => 'U',
            'Ú' => 'U',
            'Û' => 'U',
            'Ü' => 'U',
            'Ý' => 'Y',
            'Þ' => 'B',
            'ß' => 'Ss',
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ä' => 'a',
            'å' => 'a',
            'æ' => 'a',
            'ç' => 'c',
            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ð' => 'o',
            'ñ' => 'n',
            'ò' => 'o',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ö' => 'o',
            'ø' => 'o',
            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ý' => 'y',
            'þ' => 'b',
            'ÿ' => 'y',
            'Ŕ' => 'R',
            'ŕ' => 'r',
            '/' => '-',
            ':' => '',
            ';' => '',
            ' ' => '-'
        );

        // -- Remove duplicated spaces
        $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

        // -- Returns the slug
        return strtolower(strtr($string, $table));


    }

    public function index()
    {

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://free-news.p.rapidapi.com/v1/search?q=cultura&lang=pt",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: free-news.p.rapidapi.com",
                "X-RapidAPI-Key: 1da86679d7msh5fa8798f7087a1ep165f98jsnc11b29d86db5"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        $results = json_decode($response);
        $article = $results->articles;



        $title = trim($article[0]->title);
        $link = $article[0]->link;
        $content = trim($article[0]->summary);
        $source = $article[0]->clean_url;
        $slug = trim(self::createSlug($article[0]->title));
        $image = $article[0]->media;



        $result = self::update("UPDATE autoposts SET 
            title='$title',
            link='$link',
            content='$content',
            section='n1',
            source='$source',
            status='on',
            slug ='$slug',
            image ='$image'
            WHERE id=2");
    }
}

$autoposts = new AutomaticPosts();
$autoposts->index();
