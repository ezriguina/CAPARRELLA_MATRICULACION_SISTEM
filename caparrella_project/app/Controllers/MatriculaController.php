<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MatriculaController extends BaseController
{
    public function index()
    {
        $title = "MATRICULACION DE CURSO ";
        
        }
    public function matricula_view(){
         return view('matricula/matricula'); 

    }
    public function matricula_post(){
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
     if(!$this->validate($validation_rules)){
          redirect()->back()->withInput()->with('error de validacion ',$validation_rules);

     }
    

     return redirect()->to('matricula/datos_alumne');
    
    }

    public function m_alumne_view(){
    
    return view('matricula/matricula1');

    }
    public function m_alumne_post(){
      helper('form');

     $nom_cognom = $this->request->getPost('nom_complet');
     $dni =$this->request->getPost('dni');
     $sanitat = $this->request->getPost('TSI');
     $poblacio = $this->request->getPost('Poblacio');
     $data = $this->request->getPost('data_nacimiento');
     $domicili=$this->request->getPost('domicili');
     $tlf_familiar = $this->request->getPost('tlf_familiar');
     $municipi = $this->request->getPost('municipi');
     $codi_Postal = $this->request->getPost('codi_postal');
     $tlf_alumne = $this->request->getPost('tlf_alumne');
     $correo = $this->request->getPost('email_alumne');

     $validation_rules = [
    'nom_complet' => [
        'label' => 'Nombre completo',
        'rules' => 'required|min_length[3]|max_length[100]|regex_match[/^[\p{L}\s\-]+$/u]'
    ],
    'dni' => [
        'label' => 'DNI',
        'rules' => 'required|regex_match[/^[0-9]{8}[A-Za-z]$/]|is_unique[alumnos.dni]'
    ],
    'TSI' => [
        'label' => 'Tarjeta Sanitaria',
        'rules' => 'required|min_length[6]|max_length[20]'
    ],
    'Poblacio' => [
        'label' => 'Población',
        'rules' => 'required|min_length[2]|max_length[100]'
    ],
    'data_nacimiento' => [
        'label' => 'Fecha de nacimiento',
        'rules' => 'required|valid_date[Y-m-d]'
    ],
    'domicili' => [
        'label' => 'Domicilio',
        'rules' => 'required|min_length[5]|max_length[150]'
    ],
    'tlf_familiar' => [
        'label' => 'Teléfono familiar',
        'rules' => 'required|numeric|min_length[9]|max_length[15]'
    ],
    'municipi' => [
        'label' => 'Municipio',
        'rules' => 'required|min_length[2]|max_length[100]'
    ],
    'codi_postal' => [
        'label' => 'Código Postal',
        'rules' => 'required|regex_match[/^[0-9]{5}$/]'
    ],
    'tlf_alumne' => [
        'label' => 'Teléfono alumno',
        'rules' => 'permit_empty|numeric|min_length[9]|max_length[15]'
    ],
    'email_alumne' => [
        'label' => 'Correo electrónico',
        'rules' => 'required|valid_email|max_length[150]'
    ],
];

if (!$this->validate($validation_rules)) {
    return redirect()->to('matricula/datos_alumne')->withInput()->with('errors', $this->validator->getErrors());
}

return  redirect()->to('matricula/datos_pagament');

    }
    public function m_pagament_view(){
    return view('matricula/matricula2');
    }
    public function m_pagament_post(){
        
    }
}
