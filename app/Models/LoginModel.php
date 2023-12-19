<?php
namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model
{   
    public function getUsers($username, $password){
        $db = db_connect();
        $builder = $db->table('user');
        $where = ['username' => $username, 'password' => $password];
        $builder->where($where);
        $user = $builder->get()->getRowArray();
        return $user ? array_merge($user) : false;
    }
}