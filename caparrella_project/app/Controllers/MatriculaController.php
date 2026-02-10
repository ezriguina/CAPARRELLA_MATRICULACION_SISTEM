<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MatriculaController extends BaseController
{
    public function index()
    {
        $title = "MATRICULACION DE CURSO ";
        
        return view('/matricula.php'); 
    }
    public function index_post(){
     helper('form');
     $check1 = $this->request->getPost('check1');
     $check2 =$this->request->getPost('check2');
     $check3 = $this->request->getPost('check3');
     $check4 = $this->request->getPost('check4');

     $validation_rules = [
        'check1'=> 'required',
        'check2'=> 'required',
        'check3'=> 'required',
        'check4'=> 'required'
     ];
     if($this->validate($validation_rules)){
        
        return view('matricula/matricula1');
     }else{

        redirect()->to('matricula')->withInput()->with('error de validacion ',$validation_rules);

     }
    }
    public function m_alumne_view(){

    }
    public function m_alumne_post(){

    }
    public function m_pagament_view(){

    }
    public function m_pagament_post(){
        
    }
}
