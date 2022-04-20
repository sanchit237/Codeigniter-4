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

    public function upload_avatar($path, $unid){
        $builder = $this->db->table('register');
        $builder->where('unid', $unid);
        $builder->update(['profile_pic'=> $path]);

        if ($this->db->affectedRows() > 0){
            return true;
        }
        else {
            return false;
        }
    }

    public function change_pass($new_pass, $unid){
        $builder = $this->db->table('register');
        $builder->where('unid', $unid);
        $builder->update(['password'=> $new_pass]);

        if ($this->db->affectedRows() > 0){
            return true;
        }
        else {
            return false;
        }
    }

    public function update_data($data, $unid){
        $builder = $this->db->table('register');
        $builder->where('unid', $unid);
        $builder->update($data);

        if ($this->db->affectedRows() > 0){
            return true;
        }
        else {
            return false;
        }
    }
}