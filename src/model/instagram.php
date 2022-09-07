<?php
namespace Codad5\Spamnil\Model;
$dontenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dontenv->load();
use \GuzzleHttp\Client as axios;
use \Trulyao\NeatHttp\Client as neat;
use \Codad5\Spamnil\Helper as Helper;

// My client for api request
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
    
    private $client;
    public function __construct(){
        //create a property for neat client
        $this->client = new neat(
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
    }

    public function searchUsers(String $keyword){
        // $data = Helper\axios($_ENV['INSTAGRAM_BASEURL']."searchuser/$keyword", 'GET', ['host' => 'INSTAGRAM_BASEURL']);
        return $this->client->get("searchuser/$keyword");
    }
    public function getUserByusername(String $username){
        $result = $this->client->get("userinfo/$username");
        if($result->data->success){
            return $result;
        }
        return false;
    }
}