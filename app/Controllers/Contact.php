<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        return view('contact_view');
    }

    public function contact_validate(){
        
        $data = array();
        $rules = [
            'username' => 'required',
            'password' => 'required',
            'mobile' => 'required'
        ];

        if ($this->request->getMethod() == 'post'){
            if ($this->validate($rules)){
                echo "validation successfull";
            }
            else {
                $data['validation'] = $this->validator;
            }
        }

        return view('contact_view', $data);
    } 
}
