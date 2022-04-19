<?php

namespace App\Controllers;

class FileUpload extends BaseController
{
    public function index(){
        $data = [];

        if ($this->request->getMethod() == 'post'){
            $img = $this->request->getFile('upload');

            if ($img->isvalid() && ! $img->hasMoved()){
                $img->move(WRITEPATH . 'uploads');
                echo "<p>File uploaded successfully</p>";
            }
        }
        return view('upload_view', $data);
    }


}
