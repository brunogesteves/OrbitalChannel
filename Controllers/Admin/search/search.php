<?php

use Core\CreateSlug;

$config = require ("Database/Config.php");

$createSlug = new CreateSlug();
$db = new Database($config);



if (isset($_POST["searchTerm"])) {
    $term = $_POST["searchTerm"];
    $lang = $_POST["language"];

    $text = strtolower(str_replace(" ", "%", trim($term)));

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://free-news.p.rapidapi.com/v1/search?q=$term&lang=$lang",
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

    if ($err) {

        return "cURL Error #:" . $err;
    } else {
        $res = json_decode($response);
        $results = $res->articles;
        $res = http_build_query($results);

    }
    header('Location: ' . "/admin/procurar?=$res");




}

if (isset($_POST["addExternalSource"])) {
    $title = trim($_POST["title"]);
    $link = $_POST["link"];
    $content = trim($_POST["content"]);
    $section = $_POST["section"];
    $source = $_POST["source"];
    $slug = trim($createSlug->index($_POST["title"]));
    $status = "off";
    $post_at = strtotime($_POST["post_at"]);
    $image = $_POST["image"];

    echo "<pre>";
    var_dump($title);
    var_dump($link);
    var_dump($content);
    var_dump($section);
    var_dump($source);
    var_dump($slug);
    var_dump($post_at);
    var_dump($image);
    echo "</pre>";
    $result = $db->query('INSERT INTO extposts(title, link, content, section, source, slug, status, post_at, image )
                          VALUES(:title, :link, :content, :section, :source, :slug, :status, :post_at, :image)', [
        "title" => $title,
        "link" => $link,
        "content" => $content,
        "section" => $section,
        "source" => $source,
        "slug" => $slug,
        "status" => $status,
        "post_at" => $post_at,
        "image" => $image
    ]);
    if ($result) {
        header('Location: ' . "/admin");
        die();

    } else {
        var_dump("external", $results);

    }
}
