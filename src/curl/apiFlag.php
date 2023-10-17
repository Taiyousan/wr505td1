<?php

$api = 'https://restcountries.com/v3.1/all';
//-- curl call
$ch = curl_init($api);
//--- on ajoute cette option pour pouvoir traiter / utiliser la réponse de l'API
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//---- ignore SSL certificates
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//---- on execute le call API
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'ERREUR > ' . curl_error($ch);
} else {
    //--- je decode la réponse du point d'API en tableau associatif PHP
    $data = json_decode($response, true);
    //--- je parcours le tableau associatif
    foreach ($data as $item) {
        //--- URL du drapeau
        $flagUrl =  $item['flags']['png'];
        $fileInfo = pathinfo($flagUrl);
        $extension = $fileInfo['extension'];
        //---- on prépare un beau nom de fichier
        $filename = $item['cca2'] . '.' . $extension;
        //---- on récupére le contenu de l'image
        $image = file_get_contents($flagUrl);
        //---- on sauvegarde l'image
        file_put_contents('../assets/flags/' . $filename, $image);
        //---- F I N
    }
}
