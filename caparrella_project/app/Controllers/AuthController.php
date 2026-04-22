<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
      $_SESSION = session()->start() ;
      helper('form') ; 
      $email = $this->request->getPost('email');
      $password = $this->request->getPost('password') ; 


      $rules=[
      'email' => 'required',
      'password'=>'required' 
      ];

      if(!$this->validate($rules)){
        return redirect()->to('Admin/Auth/Login')->with('Error',$rules)->withInput();
      }
      
      return redirect()->to('privat/Dashboard/Instiut-Caparrella'); 

    }      
    public function logout(){
    $_SESSION = session() ;
    $_SESSION ->start() ;
     

    $_SESSION->destroy(); 


    return redirect()->to('Admin/Auth/Login')->with('Succes' , 'has cerrado session'); 
     
    }
}
