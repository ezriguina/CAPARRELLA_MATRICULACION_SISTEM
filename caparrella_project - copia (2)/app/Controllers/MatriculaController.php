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
use App\Models\BonifModel;
use App\Models\ReduccModel;
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
    $TandadaModel=new TandadaModel();
    $data['Tand'] = $TandadaModel->where('estado','1')->first() ; 

    return view('matricula/matricula1',$data);
       
    }

    public function m_alumne_post(){
      $SESSION=session();
      helper('form');
      $AlumneModel = new AlumneModel();
      $TutorModel = new TutorModel(); 

     $nom_alumne = $this->request->getPost('nom_alumne');
     $cognom_alumne = $this->request->getPost('cognom_alumne');
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
     $dni_front = $this->request->getFile('dni_f'); 
     $dni_back = $this->request->getFile('dni_b'); 

  

 
$tutor_tipo       =$this->request->getPost('tipo_tutor');   
$tutor_nombre    = $this->request->getPost('tutor_nombre');
$tutor_apellidos  = $this->request->getPost('tutor_apellidos');
$tutor_dni        = $this->request->getPost('tutor_dni');
$tutor_telefono   = $this->request->getPost('tutor_telefono');
$tutor_email      = $this->request->getPost('tutor_email');



    $validation_rules = [

'nom_alumne' => 'required|min_length[3]|max_length[100]',
'cognom_alumne' => 'required|min_length[3]|max_length[100]',
'dni' => 'required|regex_match[/^([0-9]{8}[A-Za-z]|[XYZ][0-9]{7}[A-Za-z]|[A-Za-z0-9]{6,9})$/]',
'TSI' => 'required|min_length[6]|max_length[20]',
'Poblacio' => 'required|min_length[2]|max_length[100]',
'data_nacimiento' => 'required|valid_date[Y-m-d]',
'domicili' => 'required|min_length[5]|max_length[150]',
'tlf_familiar' => 'required',
'municipi' => 'required|min_length[2]|max_length[100]',
'codi_postal' => 'required|regex_match[/^[0-9]{5}$/]',
'email_alumne' => 'required|valid_email|max_length[150]',
'dni_f' => 'uploaded[dni_f]',
'dni_b' => 'uploaded[dni_b]',
];


if (!$this->validate($validation_rules)) {

return redirect()->to('matricula/datos_alumne')->withInput()->with('errors', $validation_rules);

}
     $dniFrontName = null;
     $dniBackName = null;

if ($dni_front && $dni_front->isValid() && !$dni_front->hasMoved()) {
    $dniFrontName = $dni_front->getRandomName();
    $dni_front->move(FCPATH.'uploads/', $dniFrontName);
}

if ($dni_back && $dni_back->isValid() && !$dni_back->hasMoved()) {
    $dniBackName = $dni_back->getRandomName();
    $dni_back->move(FCPATH.'uploads/', $dniBackName);
}
//datos tutor 
$tutor = null;

if (!empty($tutor_nombre)) {
    $tutorData = [
        'tipo_tutor' => $tutor_tipo,
        'nombre' => $tutor_nombre,
        'apellidos' => $tutor_apellidos,
        'dni' => $tutor_dni,
        'telefono' => $tutor_telefono,
        'email' => $tutor_email,
        'alumno_id' => null 
    ];

    $tutor = $TutorModel->insert($tutorData);
}
   

$data = [

'Nom_alumne' => $this->request->getPost('nom_alumne'),
'Cognom_alumne' => $this->request->getPost('cognom_alumne'),

'Dni_alumne' => $this->request->getPost('dni'),
'correo_alumne' => $this->request->getPost('email_alumne'),

'tsi' => $this->request->getPost('TSI'),
'poblacio' => $this->request->getPost('Poblacio'),
'data_naixement' => $this->request->getPost('data_nacimiento'),
'domicili' => $this->request->getPost('domicili'),
'tlf_familiar' => $this->request->getPost('tlf_familiar'),
'municipi' => $this->request->getPost('municipi'),
'codi_postal' => $this->request->getPost('codi_postal'),
'tlf_alumne' => $this->request->getPost('tlf_alumne'),
'id_tutor'   => $tutor ,
'foto_documento_frente'  => $dniFrontName ,
'foto_documento_reverso'  =>$dniBackName

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
        $cursModel = new CursModel(); 
        $bonificacionModel=new BonifModel(); 
     
        helper('form');
        $data['bonif'] = $bonificacionModel->findAll(); 
        $data ['curso'] = $cursModel->findAll();
        return view('matricula/matricula2',$data);
    } 


public function m_curs_post(){
    $matriculaModel = new MatriculaModel(); 
    $bonifModel = new BonifModel(); 

$session = session();
helper('form');
$curso = $this->request->getPost('Nom_curs');
$bonif = $this->request->getPost('bonif'); 

$validation = [
'Nom_curs' => 'required',
'bonif'    => 'required'
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
$bonificacion = $bonifModel->where('nombre',$bonif)->first(); 

$sessionData=[
'id_curs' => $curs['id_curs'] ,
//'id_bonif' => $bonificacion['id_bonificacion']
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
    //$id_bonificaion = session()->get('id_bonificacion'); 

    $alumne=$AlumneModel->find($id_Alumne);
    $curs=$Cursmodel ->find($id_Curs);
    
    $data = [
        'alumne' => $alumne,
        'curs' => $curs,
       // 'bonif'=> $id_bonificaion
    ];


    return view('matricula/matricula_pago', $data);
}



public function pago_post()
{   helper('form'); 
    $session = session();
    
    $matriculaModel = new MatriculaModel();
    $tandadaModel = new TandadaModel() ; 

    if (!$session->has('id_alumne')) {
        return redirect()->to('login');
    }

    $id_alumne = $session->get('id_alumne');
    $id_curs = $session->get('id_curs') ; 
    $id_bonificacion = $session->get('id_bonificacion') ; 

    $tandada = $tandadaModel->where('estado', '1')->first();
    
    if (!$tandada) {
        return redirect()->back()->with('error', 'No hay tandada activa.');
    }

    $comp = $this->request->getFile('comprov_pago');

    $data = [
        'id_alumne'        => $id_alumne,
        'id_curs'          => $id_curs,
        //'id_bonificacion'  => $id_bonificacion,
        'id_tandada'       => $tandada['id_tandada'],
        'estado'           => 'pendiente',
        'pagado'           => 0
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
    $bonifModel    =new BonifModel(); 
    //$reduccModel   =new ReduccModel(); 

    
            $nom = $session->get('name') ; 
            $email = $session->get('email'); 
            $role = $session->get('role');  
            $MatriculaValid = $matriculaModel->where('estado','1'); 

    $data = [
        'totalAlumnos'    => $AlumneModel->countAll(),
        'totalCursos'     => $CursModel->countAll(),
        'totalMatriculas' => $matriculaModel->countAll(),
        'MatriculaV'      => $MatriculaValid->countAll(),
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
    $cursoSeleccionado = $this->request->getGet('id_curs') ?? '';
    $busquedaAlumno = $this->request->getGet('alumno') ?? '';

    if (!empty($cursoSeleccionado)) {
        $matriculaModel->where('id_curs', $cursoSeleccionado);
    }

    $matriculas = $matriculaModel
        ->orderBy('created_at', 'DESC')
        ->paginate(10, 'default');

    foreach ($matriculas as &$m) {

    $alumno = $alumneModel->find($m['id_alumne']);
    
    if ($alumno) {
        $m['Nom_alumne'] = $alumno['Nom_alumne'];
    } 

    $curso = $cursModel->find($m['id_curs']);

    if ($curso) {
        $m['Nom_curs'] = $curso['Nom_curs'];
    } 
      $Tanda = $TandadaModel->find($m['id_tandada']);

   $m['Nom_Tanda'] = $Tanda['nom_tandada'] ?? 'Null';

}
    
    $data['matriculas'] = $matriculas; 
    $data['alumne'] = $alumne; 
    $data['curs'] = $curs;  
    $data['cursoSeleccionado'] = $cursoSeleccionado ;
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
        return redirect()->back()->with('error', 'Accion no valida');
    }
     
    $matriculaModel->update($id, [
        'estado' => $estado
    ]);

    return redirect()->to(base_url('privat/Matriculas/listado'))->with('success', 'Estado actualizado correctamente');
}

public function search()
{
    $keyword = $this->request->getGet('keyword');
    $cursoSeleccionado = $this->request->getGet('curso') ?? '';

    $matriculaModel = new MatriculaModel();
    $cursModel = new CursModel();
    $TandadaModel = new TandadaModel(); 

    $cursos = $cursModel->findAll();

    $builder = $matriculaModel
        ->select('
            matricula.*,
            alumne.Nom_alumne,
            alumne.Cognom_alumne,
            curs.Nom_curs
        ')
        ->join('alumne', 'alumne.id_alumne = matricula.id_alumne')
        ->join('curs', 'curs.id_curs = matricula.id_curs')
        ->orderBy('matricula.created_at', 'DESC');

    if ($keyword) {
        $builder->groupStart()
            ->like('alumne.Nom_alumne', $keyword)
            ->orLike('alumne.Cognom_alumne', $keyword)
            ->groupEnd();
    }

    if (!empty($cursoSeleccionado)) {
        $builder->where('matricula.id_curs', $cursoSeleccionado);
    }

    $matriculas = $builder->paginate(10);

    $data = [
        'matriculas' => $matriculas,
        'pager' => $matriculaModel->pager,
        'curs' => $cursos,
        'cursoSeleccionado' => $cursoSeleccionado,
        'keyword' => $keyword
    ];

    return view('privat/Expedientes/matriculas/matriculas_list', $data);
}

public function matricula_delete($id)
{
    $matriculaModel = new MatriculaModel();

    $matricula = $matriculaModel->find($id);

    if (!$matricula) {
        return redirect()->back()->with('error', 'La matrícula no existe.');
    }

    $matriculaModel->delete($id);

    return redirect()->to('privat/Matriculas/listado')->with('success', 'Matrícula eliminada correctamente.');
}


public function matricula_recup($id)
{
    $matriculaModel = new MatriculaModel();

    $matricula = $matriculaModel->withDeleted()->find($id);

    if (!$matricula) {
        return redirect()->to('privat/Matriculas/listado')->with('error', 'La matrícula no existe.');
    }
     
    $matriculaModel->update($id, ['deleted_at' => null]);
    
    return redirect()->to('privat/Matriculas/listado')->with('success', 'Matrícula restaurada correctamente.');
}

public function matricula_papelera()
{
    $matriculaModel = new MatriculaModel();

    $data['matriculas'] = $matriculaModel
        ->onlyDeleted()
        ->findAll();

    return view('privat/Expedientes/matriculas/papelera', $data);
}

 public function crear()
    {
        helper('form');

        $cursModel = new CursModel();
        $bonifModel = new BonifModel();
        
        $data = [
            'cursos' => $cursModel->findAll(),
            'bonificaciones' => $bonifModel->findAll()
        ];

        return view('privat/Expedientes/matriculas/Matricula_Manual', $data);
    }
    

    public function crear_post()
    {
        helper('form');

        $AlumneModel = new AlumneModel();
        $TutorModel = new TutorModel();
        $MatriculaModel = new MatriculaModel();
        $TandadaModel = new TandadaModel();

        $validation = [
            'nom_alumne' => 'required|min_length[3]',
            'dni' => 'required',
            'email_alumne' => 'required|valid_email',
            'id_curs' => 'required'
        ];

        if (!$this->validate($validation)) {
            return redirect()->back()->withInput()->with('errors', $this->validator);
        }

        $dni = $this->request->getPost('dni');

        $alumnoExistente = $AlumneModel->where('Dni_alumne', $dni)->first();

        if ($alumnoExistente) {
            $id_alumno = $alumnoExistente['id_alumne'];
        } else {

            // subir archivos
            $dni_front = $this->request->getFile('dni_f');
            $dni_back  = $this->request->getFile('dni_b');

            $dniFrontName = null;
            $dniBackName = null;

            if ($dni_front && $dni_front->isValid()) {
                $dniFrontName = $dni_front->getRandomName();
                $dni_front->move(FCPATH . 'uploads/', $dniFrontName);
            }

            if ($dni_back && $dni_back->isValid()) {
                $dniBackName = $dni_back->getRandomName();
                $dni_back->move(FCPATH . 'uploads/', $dniBackName);
            }

            $alumnoData = [
                'Nom_alumne' => $this->request->getPost('nom_alumne'),
                'Cognom_alumne' => $this->request->getPost('cognom_alumne'),
                'Dni_alumne' => $dni,
                'correo_alumne' => $this->request->getPost('email_alumne'),
                'tsi' => $this->request->getPost('TSI'),
                'poblacio' => $this->request->getPost('Poblacio'),
                'data_naixement' => $this->request->getPost('data_nacimiento'),
                'domicili' => $this->request->getPost('domicili'),
                'tlf_familiar' => $this->request->getPost('tlf_familiar'),
                'municipi' => $this->request->getPost('municipi'),
                'codi_postal' => $this->request->getPost('codi_postal'),
                'tlf_alumne' => $this->request->getPost('tlf_alumne'),
                'foto_documento_frente' => $dniFrontName,
                'foto_documento_reverso' => $dniBackName
            ];

            $id_alumno = $AlumneModel->insert($alumnoData);
        }

        $id_tutor = null;

        if ($this->request->getPost('tutor_nombre')) {

            $tutorData = [
                'tipo_tutor' => $this->request->getPost('tipo_tutor'),
                'nombre' => $this->request->getPost('tutor_nombre'),
                'apellidos' => $this->request->getPost('tutor_apellidos'),
                'dni' => $this->request->getPost('tutor_dni'),
                'telefono' => $this->request->getPost('tutor_telefono'),
                'email' => $this->request->getPost('tutor_email'),
                'alumno_id' => $id_alumno
            ];

            $id_tutor = $TutorModel->insert($tutorData);
        }
        
        $tandada = $TandadaModel->where('estado', '1')->first();

        if (!$tandada) {
            return redirect()->back()->with('error', 'No hay tandada activa');
        }

        $existe = $MatriculaModel
            ->where('id_alumne', $id_alumno)
            ->where('id_curs', $this->request->getPost('id_curs'))
            ->first();

        if ($existe) {
            return redirect()->back()->with('error', 'Ya existe matrícula para este alumno en este curso');
        }
        
        $comp = $this->request->getFile('comprov_pago');
        $compName = null;
       
        if ($comp && $comp->isValid()) {
            $compName = $comp->getRandomName();
            $comp->move(FCPATH . 'uploads/', $compName);
        }

        $matriculaData = [
            'id_alumne' => $id_alumno,
            'id_curs' => $this->request->getPost('id_curs'),
            'id_bonificacion' => $this->request->getPost('id_bonificacion'),
            'id_tandada' => $tandada['id_tandada'],
            'estado' => $this->request->getPost('estado'),
            'pagado' => $this->request->getPost('pagado'),
            'tipo_matricula' => $this->request->getPost('tipo_matricula'),
            'reduccion' => $this->request->getPost('reduccion'),
            'comprobante_pago' => $compName
        ];

        $MatriculaModel->insert($matriculaData);

        return redirect()->to('privat/Matriculas/listado')->with('success', 'Matrícula creada correctamente');
    }


    public function edit_matricula($id)
{
    helper('form');

    $MatriculaModel = new MatriculaModel();
    $AlumneModel = new AlumneModel();
    $TutorModel = new TutorModel();
    $CursModel = new CursModel();
    $BonifModel = new BonifModel();

    $matricula = $MatriculaModel->find($id);

    if (!$matricula) {
        return redirect()->back()->withInput()->with('error','Mattricula no valida '); 

    }

    $alumno = $AlumneModel->find($matricula['id_alumne']);
    //$tutor = $TutorModel->where('alumno_id', $matricula['id_alumne'])->first();

    $data = [
        'matricula' => $matricula,
        'alumno' => $alumno,
        //'tutor' => $tutor,
        'cursos' => $CursModel->findAll(),
        'bonificaciones' => $BonifModel->findAll()
    ];

    return view('privat/Expedientes/matriculas/Matricula_edit', $data);
}
public function edit_matricula_post($id)
{
    helper('form');

    $MatriculaModel = new MatriculaModel();
    $AlumneModel = new AlumneModel();
    $TutorModel = new TutorModel();

    $matricula = $MatriculaModel->find($id);

    if (!$matricula) {
        return redirect()->back()->with('error', 'Matrícula no encontrada');
    }

    $id_alumno = $matricula['id_alumne'];

    $alumnoData = [
        'Nom_alumne' => $this->request->getPost('nom_alumne'),
        'Cognom_alumne' => $this->request->getPost('cognom_alumne'),
        'Dni_alumne' => $this->request->getPost('dni'),
        'correo_alumne' => $this->request->getPost('email_alumne'),
        'tsi' => $this->request->getPost('TSI'),
        'poblacio' => $this->request->getPost('Poblacio'),
        'data_naixement' => $this->request->getPost('data_nacimiento'),
        'domicili' => $this->request->getPost('domicili'),
        'tlf_familiar' => $this->request->getPost('tlf_familiar'),
        'municipi' => $this->request->getPost('municipi'),
        'codi_postal' => $this->request->getPost('codi_postal'),
        'tlf_alumne' => $this->request->getPost('tlf_alumne'),
    ];

    $AlumneModel->update($id_alumno, $alumnoData);

   /* $tutor = $TutorModel->where('alumno_id', $id_alumno)->first();

    $tutorData = [
        'tipo_tutor' => $this->request->getPost('tipo_tutor'),
        'nombre' => $this->request->getPost('tutor_nombre'),
        'apellidos' => $this->request->getPost('tutor_apellidos'),
        'dni' => $this->request->getPost('tutor_dni'),
        'telefono' => $this->request->getPost('tutor_telefono'),
        'email' => $this->request->getPost('tutor_email'),
    ];

    if ($tutor) {
        $TutorModel->update($tutor['id'], $tutorData);
    } else {
        $tutorData['alumno_id'] = $id_alumno;
        $TutorModel->insert($tutorData);
    }*/

    $matriculaData = [
        'id_curs' => $this->request->getPost('id_curs'),
        'id_bonificacion' => $this->request->getPost('id_bonificacion'),
        'estado' => $this->request->getPost('estado'),
        'pagado' => $this->request->getPost('pagado'),
        'tipo_matricula' => $this->request->getPost('tipo_matricula'),
        'reduccion' => $this->request->getPost('reduccion'),
    ];

    $MatriculaModel->update($id, $matriculaData);
    
    return redirect()->to('privat/Matriculas/listado')->with('success', 'Matrícula actualizada');
}


}


   
//-----------------------------------------------------------------------------

