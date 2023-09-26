<?php

$url_countries = "https://restcountries.com/v3.1/all";

$query = curl_init($url_countries);

// Options pour cURL
curl_setopt($query, CURLOPT_RETURNTRANSFER, true);
curl_setopt($query, CURLOPT_SSL_VERIFYHOST, 0);  // À utiliser uniquement pour le débogage
curl_setopt($query, CURLOPT_SSL_VERIFYPEER, 0);  // À utiliser uniquement pour le débogage

$result = curl_exec($query);

// Vérification des erreurs cURL
if (curl_errno($query)) {
    echo 'Erreur cURL: ' . curl_error($query);
}

// Vérification du code de réponse HTTP
$httpCode = curl_getinfo($query, CURLINFO_HTTP_CODE);
if ($httpCode != 200) {
    echo "Erreur HTTP: $httpCode";
}

curl_close($query);

file_put_contents("countries.json", $result);
