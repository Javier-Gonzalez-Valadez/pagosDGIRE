<?php
    $identificador = 1;

    $ch=curl_init();
    //curl_setopt($ch, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/$identificador/");
    //url_setopt($ch, CURLOPT_URL, "https://132.247.147.15/srv/www/htdocS/intranet/APIsis/$identificador/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
    $respuesta = curl_exec($ch);
    curl_close($ch); 


     $data = json_decode($respuesta, true);  
     $valor = $data['name'];
    //var_dump($data);
     //echo "<h1>$valor</h1>";
?>