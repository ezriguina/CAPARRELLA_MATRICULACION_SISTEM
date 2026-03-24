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
     helper('form');

     $title = "LOG PARA MATRICULARTE";
     $data = [$title];   
     
     echo view('login/login_public',$data);
    }

public function log_post(){
$session = session() ;
helper('form');

$validation = [
'email' => 'required|valid_email',
'code_pass' => 'required|min_length[5]'
];

if(!$this->validate($validation)){
    return redirect()->back()->withInput()->with('errors',$this->validator);
}

$email_user = $this->request->getPost('email');

$code = random_int(100000,999999);

$session->set('login_code',$code);
$session->set('login_email',$email_user);

$email = \Config\Services::email();

$email->setFrom('elbachirzriguinat@gmail.com','Instituto');
$email->setTo($email_user);
$email->setSubject('Codigo de acceso para la matricula');
$message = view('emails/login_code', ['code' => $code]);

$email->setMessage('Tu codigo es: '.$message);

$email->send();




return redirect()->to('/public/login_code');

}


 public function login_code(){
    $session=session(); 
    $data['email'] = $session ->get('login_email') ;
    helper('form');
    
  return view('login/login_code',$data); 
     
 }
 
 public function login_code_post(){
   $session=session(); 

   helper('form');
   $correo = $this->request->getPost('email');
   $code_pass=$this->request->getPost('code_pass');
   
   
   $validation_rules=[
   'code_pass'=> 'required'
   ];

   if(!$this->validate($validation_rules)){
      redirect()->back()->withInput()->with('error',$validation_rules);
   }

   $code_pass = $this->request->getPost('code_pass');
$pass_code = $session->get('login_code');

if ($code_pass !== $pass_code) { 

    return redirect()->back()->withInput()->with('error', 'Código inválido');
}

   return redirect()->to('matricula');
 }
}
