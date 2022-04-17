<?php
namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model {

    public function dashdata($data){
        $builder = $this->db->table('register');
        $builder->where('unid', $data);
        $result = $builder->get();

        if (count($result->getResultArray()) == 1){
            return $result->getRowArray();
        }
    }

}