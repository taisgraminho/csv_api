<?php
    $url = "https://swapi.dev/api/people";
    $resultado = json_decode(file_get_contents($url));   //decodificar o arquivo // file_get_contents() -> acessa endereço web


    foreach($resultado->results as $personagens){
        //print_r($personagens);
        echo "Nome: $personagens->name <br>";
    }
        

    /*pegar todos os personagens e colocar dentro da datatable criada */
?> 


