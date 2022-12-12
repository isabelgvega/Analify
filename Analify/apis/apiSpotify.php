<?php 

include 'sesion.php';
require 'vendor/autoload.php';

class ApiSpotify{

    public function analizarSpotify(){

        $session = new SpotifyWebAPI\Session(
            '47bfd1238c3f402eaac9d284191957aa',
            'afad2f910e3847819a5bcaa6b5bc48cb'
        );

        $session->requestCredentialsToken();
        $accessToken = $session->getAccessToken();

        // Store the access token somewhere. In a database for example.

        $_SESSION['acessToken'] = $accessToken;

        return $accessToken;


    }
}

?>