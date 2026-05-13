<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthenFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (!$session->get('logged_in')) {
            return redirect()->to('Admin/Auth/Login')
                ->with('error', 'Debes iniciar sesión');
        }

        if (!empty($arguments)) {
            $userRole = $session->get('role');

            if (!in_array($userRole, $arguments)) {
                return redirect()->to('Admin/Auth/Login')
                    ->with('error', 'No tienes permisos');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    { 
        
    }
}