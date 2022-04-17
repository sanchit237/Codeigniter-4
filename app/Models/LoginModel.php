<?php
namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model {

    public function loginemail($email){
        $builder = $this->db->table('register');
        $builder->select('password, unid, status');
        $builder->where('email', $email);

        $result = $builder->get();

        if (count($result->getResultArray()) == 1){
            return $result->getRowArray();
        }
    }

}