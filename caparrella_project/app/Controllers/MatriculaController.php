<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlumneModel;
use App\Models\CursModel;
use App\Models\MatriculaModel;
use App\Models\MensajeModel;
use App\Models\ValidationLockModel;
use App\Models\ExpedienteModel;
use App\Models\EstructurasModel;
use App\Libraries\IdObfuscator;
use App\Models\TandadaModel;
use App\Models\TutorModel;
use App\Models\UserModel;
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
      $TutorModel = new TutorModel(); 

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
'tlf_familiar' => 'required',
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


    
 $tutor_nombre     = $this->request->getPost('tutor_nombre');
$tutor_apellidos  = $this->request->getPost('tutor_apellidos');
$tutor_dni        = $this->request->getPost('tutor_dni');
$tutor_telefono   = $this->request->getPost('tutor_telefono');
$tutor_email      = $this->request->getPost('tutor_email');
$tutor_direccion  = $this->request->getPost('tutor_direccion');
$tutor_ciudad     = $this->request->getPost('tutor_ciudad');
$tutor_cp         = $this->request->getPost('tutor_cp');


if (!empty($tutor_nombre)) {

    $tutorData = [
        'nombre'        => $tutor_nombre,
        'apellidos'     => $tutor_apellidos,
        'dni'           => $tutor_dni,
        'telefono'      => $tutor_telefono,
        'email'         => $tutor_email,
        'direccion'     => $tutor_direccion,
        'ciudad'        => $tutor_ciudad,
        'codigo_postal' => $tutor_cp,
        'alumno_id'     => $SESSION->get('id_alumne')
    ];

    $TutorModel->insert($tutorData);

return redirect()->to('matricula/datos_curs');

}

    }

    public function m_curs_view(){
        $cursModel = new CursModel(); 
        
        helper('form');
        $data ['curso'] = $cursModel->findAll();
        return view('matricula/matricula2',$data);
    } 


public function m_curs_post(){
    $matriculaModel = new MatriculaModel(); 

$session = session();
helper('form');
$curso = $this->request->getPost('Nom_curs');
$validation = [
'Nom_curs' => 'required',

];

if(!$this->validate($validation)){

return redirect()->back()->withInput()->with('errors',$this->validator);

}

$Cursmodel = new CursModel();
/*
$data = [

'Nom_curs' => $this->request->getPost('Nom_curs'),

]; */
//$Cursmodel->insert($data);


$curs = $Cursmodel->where('nom_curs',$curso)->first();

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
 
  public function generar_pdf()
{
    $session = session();

    $AlumneModel = new AlumneModel();
    $CursModel = new CursModel();
    
    $id_alumne = $session->get('id_alumne');
    $id_curs = $session->get('id_curs');

    $alumne = $AlumneModel->find($id_alumne);
    $curs = $CursModel->find($id_curs);
    
    $data = [
        'alumne' => $alumne,
        'curs' => $curs
    ];
     
    $html = view('pdf/matricula_pdf', $data);
   
    $pdf = new \TCPDF();

    $pdf->SetCreator($alumne['Nom_alumne']);
    $pdf->SetAuthor('Caparrella matriculacion ');
    $pdf->SetTitle('Matricula');
    $pdf->SetMargins(15, 15, 15);
    $pdf->SetAutoPageBreak(TRUE, 15);

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->AddPage();

    $pdf->writeHTML($html);

    
    $pdf->Output('matricula.pdf', 'D');
}

//----------------------------------------------------------------------------
//Dashboard PRIVAT FOR ADMINS 
public function Dashborad_view()
{   $session = session() ; 
    helper('form');
     
    $AlumneModel    = new AlumneModel();
    $CursModel      = new CursModel();
    $matriculaModel = new MatriculaModel();
    $mensajeModel   = new MensajeModel();
    $TandadaModel   = new TandadaModel();
    $UserModel     = new UserModel() ;  

    
            $nom = $session->get('name') ; 
            $email = $session->get('email'); 
            $role = $session->get('role'); 
    $data = [
        'totalAlumnos'    => $AlumneModel->countAll(),
        'totalCursos'     => $CursModel->countAll(),
        'totalMatriculas' => $matriculaModel->countAll(),
        'totalMensajes'   => $mensajeModel->countAll(),
        'totalTandadas'   => $TandadaModel->countAll(),
        'totalUsers'      => $UserModel->countAll(),
        'username'       => $nom,
        'useremail'       =>$email,
        'role'           =>$role
    ];   



    return view('privat/dashboard', $data);
}  

public function Matricula_list(){
    helper('form') ;
    $matriculaModel = new MatriculaModel(); 
    $alumneModel = new AlumneModel() ; 
    $cursModel = new CursModel() ; 
    $TandadaModel = new TandadaModel(); 


    $matriculas=$matriculaModel->paginate(10,'default') ; 

    $alumne=$alumneModel->findAll(); 
    $curs = $cursModel->findAll();  

    foreach ($matriculas as $m) {

        $alumno = $alumneModel->find($m['id_alumne']);
        $m['Nom_alumne'] = $alumno['Nom_alumne'];
        
        $curso = $cursModel->find($m['id_curs']);
        $m['Nom_curs'] = $curso['Nom_curs'];
    } 


    

    $data['matriculas'] = $matriculas; 
    $data['alumne'] = $alumne; 
    $data['curs'] = $curs;  

    $data['Tanda'] = $TandadaModel; 
    $data['pager'] = $matriculaModel->pager; 

    
    return view('privat/Expedientes/matriculas/matriculas_list',$data) ; 

}

public function Matricula_validar($id)
{
    $matriculaModel = new MatriculaModel();
    $alumneModel = new AlumneModel();
    $cursModel = new CursModel();
    $tutorModel = new TutorModel();
    
    $matricula = $matriculaModel->find($id);

    if (!$matricula) {
        return redirect()->back()->with('error','Matricula no Existe ');
    }

    $alumno = $alumneModel->find($matricula['id_alumne']);
    $curso  = $cursModel->find($matricula['id_curs']);
    $tutor = null;
    if (!empty($alumno['id_tutor'])) {
        $tutor = $tutorModel->find($alumno['id_tutor']);
    }
    $data = [
        'matricula' => $matricula,
        'alumno'    => $alumno,
        'curso'     => $curso,
        'tutor'     => $tutor

    ];

    return view('privat/Expedientes/matriculas/validar', $data);
}

public function Matricula_validar_post($id)
{
    $matriculaModel = new MatriculaModel();

    $accion = $this->request->getPost('accion');
    
    if ($accion == 'validar') {
        $estado = 1;
    } elseif ($accion == 'denegar') {
        $estado = 2;
    } else {
        return redirect()->back()->with('error', 'Acción no válida');
    }

    $matriculaModel->update($id, [
        'estado' => $estado
    ]);

    return redirect()->to(base_url('privat/Matriculas/listado'))->with('success', 'Estado actualizado correctamente');
}





}


//-----------------------------------------------------------------------------

