<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        $data = array();
        $rules = [
            'reg_username' => 'required',
            'reg_email' => 'required',
            'reg_password' => 'required',
            'reg_Conf_password' => 'required|matches[reg_password]',
            'reg_mobile' => 'required'
        ];

        if ($this->request->getMethod() == 'post'){
            if ($this->validate($rules)){

                $unid = str_shuffle('abcdefgh');
                $registerdata = [
                    'username' => $this->request->getPost('reg_username'),
                    'email' => $this->request->getPost('reg_email'),
                    'password' => $this->request->getPost('reg_password'),
                    'mobile' => $this->request->getPost('reg_mobile'),
                    'unid' => $unid,
                    'activation_date' => date("Y-m-d h:i:s")
                ];

                $result = $this->RegisterModel->registerdata($registerdata);
                
                if ($result){
                    $this->email->setFrom('gamingsn237@gmail.com', 'sanchit');
                    $this->email->setTo($this->request->getPost('reg_email'));
                    $this->email->setSubject('Email Test');
                    $this->email->setMessage('Testing the email class.');
                    if ($this->email->send()){
                        $this->session->setFlashdata('reg_success', 'Account created successfully');
                        return redirect()->to(current_url());
                    }
                    else {
                        $this->session->setFlashdata('reg_failure', 'Error in Account creation');
                        return redirect()->to(current_url());
                    }
                }
                else {
                    $this->session->setFlashdata('reg_failure', 'Error in Account creation');
                    return redirect()->to(current_url());
                }
            }
            else {
                $data['validation'] = $this->validator;
            }
        }

        return view('register_view', $data);
    }

}
