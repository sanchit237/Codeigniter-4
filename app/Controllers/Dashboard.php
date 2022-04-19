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
}
