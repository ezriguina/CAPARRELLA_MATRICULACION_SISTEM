<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UsersController extends BaseController
{
    public function index()
    {
        //
    } 

    public function user_list(){
        helper('form') ; 
        $UsersModel = new UserModel() ; 

        $data['usuarios'] = $UsersModel->findAll();

        return view('privat/Usuarios/User_list' ,$data) ; 
    }

    public function U_create(){
       $UsersModel = new UserModel() ; 
       
       return view('privat/Usuarios/User_create') ; 


    }
    public function U_post(){
        $userModel = new UserModel();

    $validation = [
        'name' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required'   => 'El nombre es obligatorio',
                'min_length' => 'El nombre debe tener al menos 3 caracteres',
                'max_length' => 'El nombre no puede superar los 100 caracteres',
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email|is_unique[usuarios.email]',
            'errors' => [
                'required'    => 'El email es obligatorio',
                'valid_email' => 'El email no es válido',
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[6]',
            'errors' => [
                'required'   => 'La contraseña es obligatoria',
                'min_length' => 'La contraseña debe tener al menos 6 caracteres',
            ]
        ],
        'role' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'El rol es obligatorio',
            ]
        ],
        'active' => [
            'rules' => 'required|in_list[0,1]',
            'errors' => [
                'required' => 'El estado es obligatorio',
                'in_list'  => 'El estado no es válido',
            ]
        ],
    ];

    if (!$this->validate($validation)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    } 

    $password = $this->request->getPost('password');
    $password_hash = password_hash($password,PASSWORD_DEFAULT) ;
    $data = [
        'name'     => $this->request->getPost('name'),
        'email'    => $this->request->getPost('email'),
        'password' => $password_hash,
        'role'     => $this->request->getPost('role'),
        'active'   => $this->request->getPost('active'),
    ];

    $userModel->insert($data);

     return redirect()->to('privat/Users/list')->with('success', 'Usuario creado correctamente');

 
    }
    public function U_edit($id) {

    
        helper('form') ; 
        $UsersModel = new UserModel() ; 

        $data['user'] = $UsersModel->find($id);

        return view('privat/Usuarios/User_edit' ,$data) ; 
    } 

    public function U_edit_post($id){
      helper('form') ; 
        $UsersModel = new UserModel() ; 
        
        $data['user'] = $UsersModel->find($id);
        
        $validation = [
        'name' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required'   => 'El nombre es obligatorio',
                'min_length' => 'El nombre debe tener al menos 3 caracteres',
                'max_length' => 'El nombre no puede superar los 100 caracteres',
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required'    => 'El email es obligatorio',
                'valid_email' => 'El email no es válido',
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[6]',
            'errors' => [
                'required'   => 'La contraseña es obligatoria',
                'min_length' => 'La contraseña debe tener al menos 6 caracteres',
            ]
        ],
        'role' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'El rol es obligatorio',
            ]
        ],
        'active' => [
            'rules' => 'required|in_list[0,1]',
            'errors' => [
                'required' => 'El estado es obligatorio',
                'in_list'  => 'El estado no es válido',
            ]
        ],
    ];
    

    if (!$this->validate($validation)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    } 

     $password = $this->request->getPost('password');
    $password_hash = password_hash($password,PASSWORD_DEFAULT) ; 

    $data = [
        'name'     => $this->request->getPost('name'),
        'email'    => $this->request->getPost('email'),
        'password' => $password_hash,
        'role'     => $this->request->getPost('role'),
        'active'   => $this->request->getPost('active'),
    ];
    $UsersModel->update($id,$data) ; 


    return redirect()->to('privat/Users/list')->with('succes','datos Actualizados') ; 
    }  

    public function U_delete($id){
    $session = session(); 

    $UsersModel = new UserModel() ; 
    $user_actual = $session->get('id') ;

    $user = $UsersModel->where('id',$id)->first() ;
    
    $UsersModel->delete($id) ;
     
     
    return redirect()->to('privat/Users/list')->with('succes','Usuario eleminiado') ;

    }
}
