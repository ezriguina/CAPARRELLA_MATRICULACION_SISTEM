<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MatriculaController extends BaseController
{
    public function index()
    {
        $title = "MATRICULACION DE CURSO ";
        
        return view('matricula.php'); 
    }
}
