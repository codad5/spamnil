<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/helper/helper.php';
require_once __DIR__.'/view/instagram.php';

use \Codad5\Spamnil;
// use GuzzleHttp\Client as axios;
// use Trulyao\NeatHttp\Client as neat;

// $client = new neat(
//     [
//         'baseUrl' => 'https://twitter135.p.rapidapi.com/',
//         'object' => true, // return object instead of array
//         'headers' => [
//             'Content-Type' => 'application/json',
//             'Accept' => 'application/json',
//             'X-RapidAPI-Key' => 'ab76506bbfmsh6945555e0ba9731p14ca9djsn4ef24baecdd4',
// 	        'X-RapidAPI-Host' => 'twitter135.p.rapidapi.com'
//         ],
//     ] // optional base config
// );

// $variable1 = $client->get('/Search/?q=codad5&count=20');
// echo '<pre>';
// // print_r($variable1->data->globalObjects->users);

// echo "<ul>";
// foreach($variable1->data->globalObjects->users as $user => $value){
//     echo "<li>";
//         echo "<ul>";
//             echo "<li>";
//                 echo "id: $user";
//             echo "</li>";
//             echo "<li>";
//                 echo "username: $value->name";
//             echo "</li>";
//         echo "</ul>";
//     echo "</li>";
// }
// echo "</ul>";


// echo '</pre>';