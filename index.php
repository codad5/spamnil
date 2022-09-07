<?php
  
 require(__DIR__ . '/vendor/autoload.php');
 require(__DIR__ . '/src/index.php');
 $dontenv = \Dotenv\Dotenv::createImmutable(__DIR__);
 $dontenv->load();
 use \Codad5\Spamnil\View\Instagram as InstagramView;
 use \Trulyao\PhpRouter\Router as Router;


$router = new Router(__DIR__ . "/src", "/");

$router->allowed(['application/json', 'application/xml', 'text/html', 'text/plain', 'application/x-www-form-urlencoded', 'multipart/form-data']);

$router->get('/', function ($req, $res) {
    return $res->send("<h1>Hello World</h1> <br/> 
                Source: static GET </br> 
                Query(name): {$req->query('name')} <br/>
                ".$_ENV['INSTAGRAM_BASEURL'])->status(200);
});
$router->get('/instagram', function ($req, $res) {
    $instagram = new InstagramView();
    $instagram->test('davido');
    return $res->send(['is_verified' => null])->status(200);
});
$router->get('/twitter', function ($req, $res) {
    return $res->render('index.php', $req);
});
$router->get('/side', function ($req, $res) {
    // $res->use_engine();
    return $res->render('example_basic_selector.php', $req);
    // echo file_get_contents("https://www.google.com/search?q=how+to+create+google+login+with+laravel");
});
$router->get('/s2', function ($req, $res) {
    include_once 'example_basic_selector.php';
});
$router->get('/s3', function ($req, $res) {
    return $res->render('example_scraping_general');
});

$router->serve();
