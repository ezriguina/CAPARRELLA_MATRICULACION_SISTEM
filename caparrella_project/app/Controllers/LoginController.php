<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Email;

class LoginController extends BaseController
{
    public function index()
    {
     
    }
    public function log (){
     
     $title = "LOG PARA MATRICULARTE";
     $data = [$title];   

     return view('login/login_public',$data);
    }
    public function log_post(){
     $email = \Config\services::email();
     $correo = $this ->request->getPost('email');
     $code_pass=$this->request->getPost('code');
     $codegenerated =random_int(15, 18);


     $email ->setFrom('ezriguina@inscaparrella.cat','institut caparrella');
     $email ->setTo($correo);
     $email ->setSubject('Processo de matriculacion instuto caparrella tandada 1');
     $email->setMessage('tu codigo de acceso para matricularse es : '.$codegenerated) ;
     if(!$correo){

        echo" sin correo no se puede enviar el code pass ";
        redirect()->to('login/login_public')->withInput();

     }
    if($email->send()){
       redirect()->to('matricula.php');
    }else{
       echo" no se ha enviado el correo correctamente";
    }
    return view('matricula.php');

    }
}
