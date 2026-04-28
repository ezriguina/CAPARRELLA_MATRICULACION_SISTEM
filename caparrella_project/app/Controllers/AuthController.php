<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        //
    }

    public function login(){
        helper('form'); 
       
        return view('privat/Auth/login'); 
    } 

    public function login_post(){

    $session = session();   
    $UserModel = new UserModel();

    helper('form'); 

    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password'); 

    $usuario = $UserModel->where('email', $email)->first(); 

    $rules = [
        'email' => 'required',
        'password' => 'required' 
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->with('error', $this->validate($rules));
    }
    
    if ($usuario) {
        if (password_verify($password, $usuario['password'])) {

            $sessionData = [
                'id'    => $usuario['id'],
                'name'  => $usuario['name'],
                'email' => $usuario['email'],
                'role'  => $usuario['role'],
                'logged_in' => true
            ]; 

            $session->set($sessionData); 

            return redirect()->to('privat/Dashboard/Instiut-Caparrella')->with('success', 'Logged correctamente');
        }
    }

    return redirect()->to('Admin/Auth/Login')->with('error', 'Credenciales incorrectas')->withInput();
} 

    public function logout(){
      helper('form'); 

    $session =session() ;
     

    $session->destroy(); 
    return redirect()->to('Admin/Auth/Login')->with('Succes' , 'has cerrado session'); 
     
    }
}
