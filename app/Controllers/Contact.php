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
                
                $cdata = [
                    'username' => $this->request->getPost('username'),
                    'userpass' => $this->request->getPost('password'),
                    'usermob' => $this->request->getPost('mobile'),
                ];

                $result = $this->ContactModel->savedata($cdata);

                if ($result){
                    $this->session->setFlashdata('success', 'Data inserted successfully');
                    // echo "data inserted sucessfully";
                    return redirect()->to('Contact');
                }
                else {
                    $this->session->setFlashdata('error', 'Data not inserted successfully');
                    echo "Data insertion error";
                    return redirect()->to('Contact');
                }
            }
            else {
                $data['validation'] = $this->validator;
            }
        }

        return view('contact_view', $data);
    } 
}
