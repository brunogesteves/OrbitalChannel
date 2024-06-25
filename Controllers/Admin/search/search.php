<?php

use Core\Slug;
use Core\Database;

$db = new Database();
$createSlug = new Slug();



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

        $_SESSION["search_content"] = $res;

    }
    header('Location: ' . "/admin/procurar");




}

if (isset($_POST["addExternalSource"])) {
    $title = trim($_POST["title"]);
    $link = $_POST["link"];
    $content = trim($_POST["content"]);
    $section = $_POST["section"];
    $source = $_POST["source"];
    $slug = trim($createSlug->create($_POST["title"]));
    $status = "off";
    $post_at = strtotime($_POST["post_at"]);
    $image = $_POST["image"];

    $result = $db->insert('INSERT INTO extposts(title, link, content, section, source, slug, status, post_at, image )
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

    } 
}
