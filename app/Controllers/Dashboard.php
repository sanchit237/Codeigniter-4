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
}
