<?php

const API_URL ="https://whenisthenextmcufilm.com/api";

$ch = curl_init(API_URL);
// inidicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
// Ejecutar la peticion y guardamos el resultado
$result = curl_exec($ch);

// Una alternativa seria utilizar file_get_contents
// $result = file_get_contents(API_URL); // si solo quieres hacer un GET de una API

$data = json_decode($result,true);
curl_close($ch);



?>
<head>
    <meta charset="UTF-8">
    <title>La próxima pelicula de marvel</title>
    <meta name="description" content="La próxima pelicula de marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
    <style>
        :root{
            color-scheme: ligh dark;
        }
        body{
            display: grid;
            place-content: center;
        }
        img{
            margin: 0 auto;
        }
        section{
            display: flex;
            justify-content: center;
        }

        hgroup{
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>
<main>
    <section>
        <img 
        src="<?= $data['poster_url']; ?>" 
        width="300" alt="Poster de <?= $data['title'] ?>"
        style="border-radius: 16px ;"
        >
    </section>
    <hgroup>
        <h3><?= $data['title']?> se estrena en <?= $data['days_until']?> días.</h3>
        <p>Fecha de estreno: <?= $data['release_date']?></p>
        <p>La siguiente es: <?= $data['following_production']['title']?></p>
    </hgroup>
</main>


