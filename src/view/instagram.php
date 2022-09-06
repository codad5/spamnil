<?php
namespace Codad5\Spamnil\View;
require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../helper/helper.php';
require_once __DIR__.'/../controller/instagram.php';

use \Codad5\Spamnil\Controller\Instagram as InstagramController;


class Instagram{
    public function ___construct(){
        $this->controller = new InstagramController();
    }
    // private $controller = new InstagramController();
    // public function searchUsers(String $keyword){
    //     return $this->controller->searchUsers($keyword);
    // }
    // public function isVerified(String $id){
    //     return $this->controller->isVerified($id);
    // }
    public function test(String $user){
        $controller = new InstagramController();
        $data = $controller->isVerified($user);
        echo '<pre> hello';
        print_r($data);
        echo '</pre>';
    }
}