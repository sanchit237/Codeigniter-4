<?php

namespace App\Controllers;

class Testing extends BaseController
{
    public $parser;
    public $usermodel; 

    public function __construct(){
        $this->parser = \Config\Services::parser();
        $this->usermodel = new \App\Models\User();
    }
    public function index()
    {
        // echo "testing";
        $data = [
            'title' => 'view data title',
            'heading' => 'view data Heading',
            'languages' => ['php','js','jquery','ajax']
        ];

        return view('Demo', $data);
    }

    //remap function triggers when a function not existing in a controller or class is tried to access
    public function _remap($method, $param1 = null, $param2 = null){
        if (method_exists($this, $method)){
            return $this->$method($param1, $param2);
        }
        else {
            $this->index();
        }
    }

    public function generate_table(){
        $table = new \CodeIgniter\View\Table();

        $data = [
            ['Name', 'Color', 'Size'],
            ['Fred', 'Blue',  'Small'],
            ['Mary', 'Red',   'Large'],
            ['John', 'Green', 'Medium'],
        ];

        $data['result'] = $table->generate($data);
        
        echo view("Data_viewer", $data);
    }

    public function parsing(){
        $data = ['name'=>'test','city'=>'mumbai','state'=>'maharashtra'];

        return $this->parser->setData($data)->render("Data_viewer");
    }

    public function bs(){
        echo view("bs_view");
    }

    public function model_test(){
        $data['mod_result'] = $this->usermodel->index();

        return view("bs_view", $data);
    }

    public function display_data(){
        $data['display'] = $this->usermodel->display();

        return view("bs_view", $data);
    }
}