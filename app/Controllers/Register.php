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
                    $message = "Click on the link to activate your account <br> <a href='".base_url()."/Register/activate/".$unid."'>Activate Now</a>";
                    $this->email->setFrom('gamingsn237@gmail.com', 'sanchit');
                    $this->email->setTo($this->request->getPost('reg_email'));
                    $this->email->setSubject('Email Test');
                    $this->email->setMessage($message);
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

    public function activate($unid = null){
        $data = [];

        if (!empty($unid)){

            $result = $this->RegisterModel->verifyid($unid);

            if ($result){
                
                if($this->expirycheck($result->activation_date)){

                    if ($result->status == 'inactive'){
                        $status = $this->RegisterModel->updatestatus($unid);
                        
                        if ($status == true)
                        {
                            $data['success'] = "Activation success";
                        }
                    }
                    else {
                        $data['act_fail'] = 'Account is already activated';
                    }
                }
                else {

                }
            }
            else {

            }
        }
        else {
            $data['error'] = "Error in activation";
        }
        return view('activate_view', $data);
    }

    public function expirycheck($exptime){
        $currtime = now();
        $exptime = strtotime($exptime);
        $difftime = (int)$currtime - (int)$exptime;

        if ($difftime < 3600){
            return true;
        }
        else {
            return false;
        }
    }

}
