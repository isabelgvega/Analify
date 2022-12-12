<?php 

class ApiTwitter{
    
    public $settings = array(
        'oauth_access_token' => "1500847790175526920-QSPZEDu0B4zAkFrMvkRS9yCMKHiKEA",
        'oauth_access_token_secret' => "O4nwQodJUtgqpdkU4aSsCSDF1traPzw6qjMUcZ90r0TYR",
        'consumer_key' => "OV7Ace2kT2tU7wWKQSZtrmcH5",
        'consumer_secret' => "0sknomOZiNzweobnkeWyANE6PBgpJ7mlnMNqyaMVSodjpRGdub"
    );

    public function analizarTwitter($artista, $n){
        
        //PRIMERO QUITAMOS LOS ESPACIOS DEL NOMBRE DEL ARTISTA (Los hagstags no tienen espacios)
        $artista = str_replace(' ', '', $artista);

        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = ('?q=#' . $artista . '&count=10&lang=es&result_type=popular+$curlOptions = 0');
               
        $twitter = new TwitterAPIExchange($this->settings);
        $data = $twitter->request($url, 'GET', $getfield);
        $twits = json_decode($data, false);
        $twits = $twits->statuses;

        $_SESSION['twits1'] = [];

        foreach($twits as $twit){

            array_push($_SESSION['twits' . $n], $twit->text);
            
        }
    }
}

?>