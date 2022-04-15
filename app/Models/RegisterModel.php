<?php
namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model {

    public function registerdata($data){
        $builder = $this->db->table('register');
        $query = $builder->insert($data);
        if ($query){
            return true;
        }
    }
}