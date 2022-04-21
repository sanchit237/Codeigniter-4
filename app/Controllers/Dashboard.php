<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(){
        if (!$this->session->has('unid')){
            return redirect()->to('Login');
        }

        $unid = $this->session->get('unid');

        $data['dashcont'] = $this->DashboardModel->dashdata($unid);

        return view('dashboard_view', $data);
    }

    public function logout(){
        $this->session->remove('unid');
        $this->session->destroy();
        return redirect()->to('Login');
    }

    public function avatar(){
        if (!$this->session->has('unid')){
            return redirect()->to('Login');
        }
        $data= [];
        $unid = $this->session->get('unid');

        if ($this->request->getMethod() == 'post'){
            $img = $this->request->getFile('upload');

            if ($img->isvalid() && ! $img->hasMoved()){
                $img->move(WRITEPATH . 'uploads');
                $path = base_url() .'/writable/uploads/'. $img->getName();

                $this->DashboardModel->upload_avatar($path, $unid);
            }
        }
        return view('avatar_view', $data);
    }


    public function change_password(){
        if (!$this->session->has('unid')){
            return redirect()->to('Login');
        }

        $data = [];
        $unid = $this->session->get('unid');
        
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required',
            'conf_password' => 'required|matches[new_password]',
        ];

        if ($this->request->getMethod() == 'post'){

            if($this->validate($rules)){

                $old_password = $this->request->getPost('old_password');
                $new_password = $this->request->getPost('new_password');

                $verify = $this->DashboardModel->dashdata($unid);
                $db_password = $verify['password'];

                if ($old_password == $db_password){
                    if ($this->DashboardModel->change_pass($new_password, $unid)){
                        $this->session->setFlashdata('success', 'Password changed successfully');
                    }
                    else {
                        $this->session->setFlashdata('error', 'Password changing issue');
                    }
                }
                else {
                    $this->session->setFlashdata('error', 'Password changing issue');
                }
            }
            else {
                $data['validation'] = $this->validator;
            }
        }

        return view("password_view", $data);
    }

    public function edit(){
        if (!$this->session->has('unid')){
            return redirect()->to('Login');
        }

        $data = [];
        $unid = $this->session->get('unid');

        $data['edit_data'] = $this->DashboardModel->dashdata($unid);

        if ($this->request->getMethod() == 'post'){
            $rules = [
                'edit_username' => 'required',
                'edit_mobile' => 'required'
            ];

            if ($this->validate($rules)){
                $update_data = [
                    'username'=> $this->request->getPost('edit_username'),
                    'mobile'=> $this->request->getPost('edit_mobile'),
                ];

                if ($this->DashboardModel->update_data($update_data, $unid)){
                    $this->session->setFlashdata('success', 'Records updated successfully');
                }
                else {
                    $this->session->setFlashdata('error', 'Issue in updating records');
                }
            }
            else {
                $data['validation'] = $this->validator;
            }
        }
        return view("edit_view",$data);
    }

    public function forgot_pass(){
        $data = [];

        if ($this->request->getMethod() == 'post'){

            $rules = [
                'verify_email' => 'required'
            ];

            if ($this->validate($rules)){
                $email = $this->request->getPost('verify_email');

                $verify = $this->DashboardModel->verify_email($email);

                if (!empty($verify)){

                    $token = $verify['unid'];

                    $message = 'Hi User <br>
                    <a href="'.base_url().'/Login/reset/'.$token.'">Click on the link to reset password</a>';

                    $this->email->setFrom('gamingsn237@gmail.com', 'test');
                    $this->email->setTo($email);

                    $this->email->setSubject('Verify Password');
                    $this->email->setMessage($message);

                    if ($this->email->send()){
                        $this->session->setFlashdata('success', 'Email sent successfully');
                    }
                }
                else {
                    $this->session->setFlashdata('error', 'Email sending failed');
                }
            }
            else {
                $data['validation'] = $this->validator;
            }
        }
        return view("forgot_view", $data);
    }
}
