<?php
namespace Codad5\Spamnil\Model;
require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../helper/helper.php';
$dontenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dontenv->load();
use \GuzzleHttp\Client as axios;
use \Trulyao\NeatHttp\Client as neat;
use \Codad\Spamnil\helper as Helper;



// $variable1 = $client->get('/Search/?q=codad5&count=20');

$client = new neat(
        [
            'baseUrl' => $_ENV['INSTAGRAM_BASEURL'],
            'object' => true, // return object instead of array
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-RapidAPI-Key' => $_ENV['RAPID_KEY'],
                'X-RapidAPI-Host' => Helper\gethost($_ENV['INSTAGRAM_BASEURL'])
            ],
        ] // optional base config
    );
class Instagram{
    


    public function searchUsers(String $keyword){
        // $data = Helper\axios($_ENV['INSTAGRAM_BASEURL']."searchuser/$keyword", 'GET', ['host' => 'INSTAGRAM_BASEURL']);
        return $GLOBALS['client']->get("searchuser/$keyword");
    }
    public function getUserByusername(String $username){
        $result = $GLOBALS['client']->get("userinfo/$username");
        if($result->data->success){
            return $result;
        }
        return false;
    }
}