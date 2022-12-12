<?php

include 'sesion.php';
require 'vendor/autoload.php';
require 'apis/apiSpotify.php';
require 'apis/apiTwitter.php';

const PAISID = 'ES';

$tw = new ApiTwitter;
$sp = new ApiSpotify;

$artista2 = null;

$artista1 = $_POST['artista1'];
$artista2 = $_POST['artista2'];

$sp->analizarSpotify();
$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($_SESSION['acessToken']);

if ($artista2 == null){
    buscarSpotify($api, $artista1, '1', $tw);
    $tw->analizarTwitter($_SESSION['name1'], 1);
    header('Location: analizarArtista.php');

}else{

    buscarSpotify($api, $artista1, '1');
    buscarSpotify($api, $artista2, '2');

    header('Location: compararArtistas.php');

}


function buscarSpotify($api, $artista, $n){

    $search = $api->search($artista, 'artist', ['limit' => '1']);

    $search = $search->artists->items;

    $_SESSION['followers'. $n] = $search[0]->followers->total;
    $IDartista = $search[0]->id;
    
    $artist = $api->getArtist($IDartista);

    $_SESSION['name' . $n] = $artist->name;
    $_SESSION['popularity' . $n] = $artist->popularity;
    $generosJSON = json_encode($artist->genres);
    $generos = json_decode($generosJSON, true);
    $_SESSION['firstGenre' . $n] = $generos[0];
    $_SESSION['secondGenre' . $n] = $generos[1];

    $tracks = $api->getArtistTopTracks($IDartista, ['country' => PAISID]);
    $tracks = json_encode($tracks->tracks);
    $tracks = json_decode($tracks, true);

    $_SESSION['albumName' . $n] = $tracks[0]['name'];
    $_SESSION['trackPopularity' . $n] = $tracks[0]['popularity'];
   
}

?>