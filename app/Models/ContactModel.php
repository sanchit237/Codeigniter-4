<?php
namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model {

    public function savedata($cdata){
        $builder = $this->db->table('contact');
        $query = $builder->insert($cdata);
        if ($query){
            return true;
        }
    }
}