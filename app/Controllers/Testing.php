<?php

namespace App\Controllers;

class Testing extends BaseController
{
    public function index()
    {
        echo "testing";
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
}