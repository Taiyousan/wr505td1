<?php

$countries = "https://restcountries.com/v3.1/all";

foreach (json_decode(file_get_contents($countries), true) as $country) {
    $url_flag = $country["flags"]["png"];
    $flag = $country["name"]["common"] . ".png";
    $pathinfo = pathinfo($country['flags']['png']);
    $img = file_get_contents($country['flags']['png']);
    $query = curl_init($url_flag);
    curl_setopt($query, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($query);
    curl_error($query);
    curl_close($query);
    file_put_contents('public/flags/' . $pathinfo['basename'], $img);
}
