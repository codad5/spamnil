<?php
namespace Codad5\Spamnil\Controller;



use \Codad5\Spamnil\Model\Instagram as InstagramModel;

$model = new InstagramModel();

class Instagram{
    private $model;
    private $searchuser;
    private $userinfo;
    public function __construct(String $user = null){
        $this->model = new InstagramModel();
        $this->searchuser = $user !== null ? $this->model->searchUsers($user) : null;
        $this->userinfo = $user !== null ? $this->model->getUserByusername($user) : null;
    }
    public function searchUsers(String $keyword){
        if($this->searchuser !== null){
            return $this->searchuser;
        }
        return $this->model->searchUsers($keyword);
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

    public function no_of_followers(String $username = null): int{
        $userinfo = $this->userinfo ?? $this->model->getUserByusername($username);
        return $userinfo->data->data->edge_followed_by->count;
    }
}