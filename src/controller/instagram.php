<?php
namespace Codad5\Spamnil\Controller;
require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../helper/helper.php';
require_once __DIR__.'/../model/instagram.php';


use \Codad5\Spamnil\Model\Instagram as InstagramModel;

$model = new InstagramModel();

class Instagram{
    // private $model = new InstagramModel();
    private $user;
    public function ___construct(String $user){
        $this->user = $GLOBALS['model']->searchUsers($user);
    }
    public function searchUsers(String $keyword){
        return $this->user;
    }
    public function isVerified(String $id = null){
        $data =  $id ?? $this->user;
        $return = ['success' => false];
        if(!$data && $data->success){
            return false;
        }
        foreach($data->data->data as $user => $value){
            if($value->user->is_verified && $value->user->username == $id){
                return $value->user->is_verified;
            }
        }
        return false;
    }
}