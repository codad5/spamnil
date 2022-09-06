<?php
namespace Codad5\Spamnil\Controller;
require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../helper/helper.php';
require_once __DIR__.'/../model/instagram.php';


use \Codad5\Spamnil\Model\Instagram as InstagramModel;

$model = new InstagramModel();

class Instagram{
    // private $model = new InstagramModel();
    private $searchuser;
    private $userinfo;
    public function ___construct(String $user){
        $this->searchuser = $GLOBALS['model']->searchUsers($user);
        $this->userinfo = $GLOBALS['model']->getUserByusername($user);
    }
    public function searchUsers(String $keyword){
        return $this->searchuser;
    }
    public function isVerified(String $id = null){
        $data =  $id ?? $this->searchuser;
        $return = ['success' => false];
        if(!$data && $data->success){
            $return['success'] = false;
            return $return;
        }
        foreach($data->data->data as $user => $value){
            if($value->user->is_verified && $value->user->username == $id){
                return $return['success'] = $value->user->is_verified;
            }
        }
        return $return;
    }

    public function no_of_followers(String $username = null){
        if(!$username && $this->userinfo->success){
            $username = $this->userinfo->data->data->edge_followed_by->count;
        }
        return $GLOBALS['model']->getUserByusername($username)->data->data->edge_followed_by->count;
    }
}