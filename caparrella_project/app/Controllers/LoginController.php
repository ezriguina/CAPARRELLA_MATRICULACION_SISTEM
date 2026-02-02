<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

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
}
