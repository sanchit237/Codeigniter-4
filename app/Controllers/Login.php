<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data = [];

        $rules = [
            'log_email' => 'required',
            'log_password' => 'required'
        ];

        if ($this->request->getMethod() == 'post'){
            if ($this->validate($rules)){

                $email = $this->request->getPost('log_email');
                $password = $this->request->getPost('log_password');

                $userdata = $this->LoginModel->loginemail($email);
                if ($userdata){
                    // $matchdata = password_verify($password, $userdata['password']);
                    if ($password == $userdata['password']){
                        if ($userdata['status'] == 'active'){
                            $this->session->setFlashdata('pass_match','Password matching');
                            $this->session->set('unid', $userdata['unid']);
                            return redirect()->to('Dashboard');
                        }
                        else {
                            $this->session->setFlashdata('status_error','status inactive');
                            return redirect()->to(current_url());
                        }
                    }
                    else {
                        $this->session->setFlashdata('pass_not_match','Password not matching');
                        return redirect()->to(current_url());
                    }
                }
            }
            else {
                $data['validation'] = $this->validator;
            }
        }
        return view('login_view', $data);
    }

    public function reset($token=null){

        $data = [];
        if (!empty($token)){

            if ($this->request->getMethod() == 'post'){

                $rules = [
                    'res_password' => 'required'
                ];

                if ($this->validate($rules)){

                    $res_pass = $this->request->getPost('res_password');

                    if ($this->LoginModel->reset_pass($token,$res_pass)){
                        $this->session->setFlashdata('success','New password updated');
                        return redirect()->to('/Login');
                    }
                    else {
                        $this->session->setFlashdata('error','New password setting failed');
                    }
                }
                else {
                    $data['validation'] = $this->validator;
                }
            }
            else {
                $this->session->setFlashdata('token_error','No token found');
            }
        }
        else {
            $this->session->setFlashdata('token_error','No token found');
        }
        return view("reset_pass", $data);
    }
}
