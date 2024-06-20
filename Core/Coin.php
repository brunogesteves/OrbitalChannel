<?php

namespace Core;
class Coin{

    const BASE_URL = "https://economia.awesomeapi.com.br/json";
    public function index($moedaA, $moedaB){
        return $this->get('/last/' . $moedaA. '-'.$moedaB);
    }

    public function get($resource){
        $endpoint = self::BASE_URL.$resource;
        
        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $res = json_decode($response,true);

        return $res["USDBRL"];
    }
}
