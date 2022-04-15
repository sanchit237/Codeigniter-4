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

    public function verifyid($data){
        $builder = $this->db->table('register');
        $builder->select('unid, activation_date, status');
        $builder->where('unid', $data);
        $query = $builder->get();
        
        if (count($query->getResultArray()==1)){
            return $query->getRow();
        }
        else {
            return false;
        }
    }

    public function updatestatus($data){
        $builder = $this->db->table('register');
        $builder->where('unid', $data);
        $result = $builder->update(['status'=>'active']);
        if($this->db->affectedRows() == 1){
            return true;
        }
        else {
            return false;
        }

        // if ($result){
        //     return true;
        // }
    }
}