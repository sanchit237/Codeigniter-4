<?php

namespace App\Controllers;

class MultipleUpload extends BaseController
{
    public function index(){
        $data = [];

        if ($this->request->getMethod() == 'post'){
            $img = $this->request->getFiles();

            foreach($img['upload'] as $mulimg){
                if ($mulimg->isvalid() && ! $mulimg->hasMoved()){
                    $mulimg->move(WRITEPATH . 'uploads');
                    echo "<p>File uploaded successfully</p>";
                }
            }
        }
        return view('multiple_view', $data);
    }

}
