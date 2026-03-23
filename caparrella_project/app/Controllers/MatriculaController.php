<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlumneModel;
use App\Models\CursModel;
use App\Models\MatriculaModel;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use Dompdf\Options;

class MatriculaController extends BaseController
{
    public function index()
    {
        $title = "MATRICULACION DE CURSO ";
        
        }
    public function matricula_view(){
        helper('form');

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
     $messatges = [
        'check1'=> [
         'required' => 'este campo es obligatorio '
        ],
        'check2'=> [
         'required' => 'este campo es obligatorio '
        ],
        'check3'=> [
         'required' => 'este campo es obligatorio '
        ],
        'check4'=> [
         'required' => 'este campo es obligatorio '
        ],
     ];
     
     if(!$this->validate($validation_rules,$messatges)){
          redirect()->back()->withInput('error',$this->validator);
 
     }
    

     return redirect()->to('matricula/datos_alumne');
    
    }

    public function m_alumne_view(){
    helper('form') ;

    return view('matricula/matricula1');

    }
    public function m_alumne_post(){
        $SESSION=session();
      helper('form');
      $AlumneModel = new AlumneModel();
      
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

'nom_complet' => 'required|min_length[3]|max_length[100]',
'dni' => 'required|regex_match[/^[0-9]{8}[A-Za-z]$/]',
'TSI' => 'required|min_length[6]|max_length[20]',
'Poblacio' => 'required|min_length[2]|max_length[100]',
'data_nacimiento' => 'required|valid_date[Y-m-d]',
'domicili' => 'required|min_length[5]|max_length[150]',
'tlf_familiar' => 'required|numeric|min_length[9]|max_length[15]',
'municipi' => 'required|min_length[2]|max_length[100]',
'codi_postal' => 'required|regex_match[/^[0-9]{5}$/]',
'email_alumne' => 'required|valid_email|max_length[150]'

];


if (!$this->validate($validation_rules)) {

return redirect()->to('matricula/datos_alumne')->withInput()->with('errors', $this->validator);

}
$data = [

'Nom_alumne' => $this->request->getPost('nom_complet'),
'Dni_alumne' => $this->request->getPost('dni'),
'correo_alumne' => $this->request->getPost('email_alumne'),

'tsi' => $this->request->getPost('TSI'),
'poblacio' => $this->request->getPost('Poblacio'),
'data_naixement' => $this->request->getPost('data_nacimiento'),
'domicili' => $this->request->getPost('domicili'),
'tlf_familiar' => $this->request->getPost('tlf_familiar'),
'municipi' => $this->request->getPost('municipi'),
'codi_postal' => $this->request->getPost('codi_postal'),
'tlf_alumne' => $this->request->getPost('tlf_alumne')

];
$AlumneModel->insert($data);

 $alumne = $AlumneModel->where('Dni_alumne',$dni)->first() ;
    $sessionData = [
        'id_alumne' => $alumne['id_alumne'],
    ];
    $SESSION->set($sessionData);
return redirect()->to('matricula/datos_curs');

}
    public function m_curs_view(){
        helper('form');
    return view('matricula/matricula2');
    }

public function m_curs_post(){
$session = session();
helper('form');

$validation = [

'Nom_curs' => 'required',
'codigo_curs' => 'required|min_length[3]',
'precio' => 'required|decimal'

];

if(!$this->validate($validation)){

return redirect()
->back()
->withInput()
->with('errors',$this->validator);

}

$Cursmodel = new CursModel();

$data = [

'Nom_curs' => $this->request->getPost('Nom_curs'),
'codigo_curs' => $this->request->getPost('codigo_curs'),
'precio' => $this->request->getPost('precio')

];
$Cursmodel->insert($data);


$curs = $Cursmodel->where('nom_curs',$data['Nom_curs'])->first();
$sessionData=[
'id_curs' => $curs['id_curs']
];
$session ->set($sessionData); 

return redirect()->to('matricula/pago');

}

public function pago_view()
{
    $session=session(); 

    $matriculaModel = new MatriculaModel();
    $AlumneModel =  new AlumneModel();
    $Cursmodel =new CursModel();
    
    if (!$session->has('id_alumne') || !$session->has('id_curs')) {
    return redirect()->to('matricula/datos_curs')->with('error',' te falta datos del alumne o curs ')->withInput();
    }

    $id_Alumne = session()->get('id_alumne');
    $id_Curs = session()->get('id_curs');
    
    $alumne=$AlumneModel->find($id_Alumne);
    $curs=$Cursmodel ->find($id_Curs);

    $data = [
        'alumne' => $alumne,
        'curs' => $curs
    ];

    return view('matricula/matricula_pago', $data);
}

public function pago_post()
{
    $session = session();

    $matriculaModel = new MatriculaModel();

    if (!$session->has('id_alumne')) {
        return redirect()->to('login');
    }

    $id_alumne = $session->get('id_alumne');
    $id_curs = $session->get('id_curs') ;

    $data = [

        'id_alumne' => $id_alumne,
        'id_curs'   => $id_curs,
        'estado'    => 'pendiente',
        'pagado'    => 0

    ];

    $matriculaModel->insert($data);

    return redirect()->to('matricula/pago/pdf')->with('success','Matrícula registrada correctamente. Entregue el justificante en el instituto.');
}

}
