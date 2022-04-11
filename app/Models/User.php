<?php
namespace App\Models;

use CodeIgniter\Model;

class User extends Model {

    public $db;

    public function __construct(){
        $this->db = db_connect();
    }

    public function index(){
        $data = ["data1"=>"a","data2"=>"b"];
        return $data;
    }

    public function display(){
        $displaydata = $this->db->query('select * from users ');

        $result = $displaydata->getResult();

        return $result;
    }
}