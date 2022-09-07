<?php
namespace Codad5\Spamnil\View;

use \Codad5\Spamnil\Controller\Instagram as InstagramController;


class Instagram{
    private $controller;
    public function ___construct(){
        
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
        $data = $controller->no_of_followers($user);
        echo '<pre> hello';
        print_r($data);
        echo '</pre>';
    }
}