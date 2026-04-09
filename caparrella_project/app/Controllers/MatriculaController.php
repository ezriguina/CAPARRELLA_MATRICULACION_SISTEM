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
        $cursModel = new CursModel(); 
        
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

    // Generar HTML desde la vista
    $html = view('pdf/matricula_pdf', $data);

    // Cargar TCPDF
    $pdf = new \TCPDF();

    // Configuración del documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Caparrella matriculacion ');
    $pdf->SetTitle('Matricula');
    $pdf->SetMargins(15, 15, 15);
    $pdf->SetAutoPageBreak(TRUE, 15);

    // Quitar header y footer si no los quieres
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // Añadir página
    $pdf->AddPage();

    // Escribir HTML
    $pdf->writeHTML($html, true, false, true, false, '');

    // Salida del PDF
    // 'I' = mostrar en navegador
    // 'D' = forzar descarga
    $pdf->Output('matricula.pdf', 'D');
}
//-----------------------------------------------------------------------------

private $mensajeModel;
    private $validationLockModel;
    private $expedienteModel;
    
    public function __construct()
    {
        $this->mensajeModel = new MensajeModel();
        $this->validationLockModel = new ValidationLockModel();
        $this->expedienteModel = new ExpedienteModel();
    }
    
    /**
     * Helper para obtener color de badge según tipo de mensaje
     */
public function historial_view()
   {
      return view('privat/historial');
   }
     public function education_dropdowns()
   {
       helper('url'); // necesario para usar base_url() en la vista

       $db = \Config\Database::connect();
       $niveles = $db->table('niveles')->orderBy('id')->get()->getResult();
       return view('privat/education_dropdowns', ['niveles' => $niveles]);
   }

    public function getBadgeColor($tipo)
    {
        $colors = [
            'info' => 'info',
            'warning' => 'warning',
            'error' => 'danger',
            'success' => 'success'
        ];
        return $colors[$tipo] ?? 'secondary';
    }


      public function expedientes_view(){
          return view('privat/expedient'); 
    }
   public function validados_view(){
      $alumneModel = new AlumneModel();
      $db = \Config\Database::connect();

      // Obtener alumnos con su curso
      $builder = $db->table('alumne a')
          ->select('a.id_alumne as id, a.nombre, a.apellidos, a.dni, a.estado, e.nombre as curso')
          ->join('estructuras e', 'e.id = a.estructura_curso_id', 'left');

      $alumnos = $builder->get()->getResultArray();

      // Mapear estado a clases y códigos para la vista
      foreach ($alumnos as &$alumno) {
          $estado = strtolower($alumno['estado'] ?? '');
          if ($estado === 'validado') {
              $alumno['estado_codigo'] = 'V';
              $alumno['estado_clase'] = 'bg-success';
              $alumno['estado_texto'] = 'Validado';
          } elseif ($estado === 'anulado') {
              $alumno['estado_codigo'] = 'AN';
              $alumno['estado_clase'] = 'bg-danger';
              $alumno['estado_texto'] = 'Anulado';
          } elseif ($estado === 'para validar') {
              $alumno['estado_codigo'] = 'PV';
              $alumno['estado_clase'] = 'bg-info text-dark';
              $alumno['estado_texto'] = 'Para validar';
          } else {
              // En revisión por defecto
              $alumno['estado_codigo'] = 'E';
              $alumno['estado_clase'] = 'bg-warning text-dark';
              $alumno['estado_texto'] = 'En revisión';
          }
      }
      unset($alumno);

      // Cursos disponibles para el filtro
      $cursos = $db->table('estructuras')
          ->where('tipo', 'curso')
          ->orderBy('nombre')
          ->get()
          ->getResultArray();

      $filtros_estado = [
          ['codigo' => 'PV', 'clase' => 'outline-info', 'texto' => 'PV (Para validar)'],
          ['codigo' => 'V', 'clase' => 'outline-success', 'texto' => 'V (Validado)'],
          ['codigo' => 'E', 'clase' => 'outline-warning', 'texto' => 'E (En revisión)'],
          ['codigo' => 'AN', 'clase' => 'outline-secondary', 'texto' => 'AN (Anulado)'],
          ['codigo' => 'ALL', 'clase' => 'outline-dark', 'texto' => 'TODOS'],
      ];

      $mensajeModel = new MensajeModel();
      $mensajeModel->initializeDefaultMessages();
      
      $mensajes = $mensajeModel->getActiveMessages();
      $missatges_rapids = array_column($mensajeModel->getQuickMessages(), 'mensaje');

      return view('privat/validados', [
          'alumnos' => $alumnos,
          'cursos' => $cursos,
          'filtros_estado' => $filtros_estado,
          'missatges_rapids' => $missatges_rapids,
          'mensajes' => $mensajes,
      ]);
      //rutas post para recivir de validar el id de alumno y el mensaje para enviar al alumno
  }
   public function validados_view_2($id): string{
      // Si más adelante quieres manejar POST con ID concreto,
      // puedes implementar la lógica aquí. De momento no se usa.
      return $this->validados_view();
   }

      public function validar_view($obfuscatedId){
          try {
              $id = IdObfuscator::extractIdFromUrl($obfuscatedId);
          } catch (\Exception $e) {
              throw new \CodeIgniter\Exceptions\PageNotFoundException('URL inválida');
          }
          $alumneModel = new AlumneModel();
          $estructurasModel = new EstructurasModel();

          // Filtros que llegan desde la lista de validados
          $filters = [
              'q'      => $this->request->getGet('q'),
              'curso'  => $this->request->getGet('curso'),
              'estado' => $this->request->getGet('estado'),
          ];

          // Alumno
          $alumne = $alumneModel->find($id);
          if (!$alumne) {
              throw new \CodeIgniter\Exceptions\PageNotFoundException('Alumno no encontrado');
          }

          // Curso al que pertenece
          $curso = $estructurasModel->find($alumne['estructura_curso_id']);
          $cicleId = $curso['parent_id'] ?? null;

          $cicleNombre = 'Desconocido';
          if ($cicleId) {
              $cicle = $estructurasModel->find($cicleId);
              if ($cicle) {
                  $cicleNombre = $cicle['nombre'];
              }
          }

          $estado = $alumne['estado'] ?? 'Para validar';
          $estadoLower = strtolower($estado);
          if ($estadoLower === 'anulado') {
              $estatClase = 'bg-danger text-white';
          } elseif ($estadoLower === 'validado') {
              $estatClase = 'bg-success text-white';
          } elseif ($estadoLower === 'para validar') {
              $estatClase = 'bg-info text-dark';
          } else {
              $estatClase = 'bg-warning text-dark';
          }

          // Check if student is locked by another user
          if ($this->validationLockModel->isStudentLocked($id)) {
              $lock = $this->validationLockModel->getActiveLock($id);
              $data['lock_warning'] = sprintf(
                  'Este alumno está siendo validado actualmente por %s',
                  $lock['usuario_nombre'] ?? 'otro usuario'
              );
          } else {
              // Lock the student for current user
              $this->validationLockModel->lockStudent($id, session()->get('user_id'), session()->get('user_name') ?? 'Usuario');
          }
          $data['matricula'] = [
              'any_escolar' => '2025 / 2026',
              'curs' => $curso['nombre'] ?? 'Desconocido',
              'cicle' => $cicleNombre,
              'estat' => $estado,
              'estat_clase' => $estatClase,
              'alumne' => [
                  'nom_complet' => $alumne['apellidos'] . ', ' . $alumne['nombre'],
                  'dni' => $alumne['dni'],
                  'data_naixement' => date('d/m/Y', strtotime($alumne['fecha_nacimiento'])),
                  'domicili' => $alumne['direccion'],
                  'municipi' => $alumne['municipio'],
                  'cp' => $alumne['codigo_postal'],
                  'telefon' => $alumne['telefono_alumno'],
                  'email' => $alumne['email_alumno'],
                  'poblacio_naixement' => $alumne['lugar_nacimiento'],
                  'id' => $alumne['id_alumne'],
              ],
              'filters' => $filters,
          ];

          $mensajeModel = new MensajeModel();
          $data['missatges_rapids'] = array_column($mensajeModel->getQuickMessages(), 'mensaje');
          $data['mensajes'] = $mensajeModel->getActiveMessages();
          $data['obfuscated_id'] = $obfuscatedId;

          return view('privat/validar', $data);
      }
      
      public function aprobarAlumno($obfuscatedId)
      {
          try {
              $id = IdObfuscator::extractIdFromUrl($obfuscatedId);
          } catch (\Exception $e) {
              throw new \CodeIgniter\Exceptions\PageNotFoundException('URL inválida');
          }
          
          $alumneModel = new AlumneModel();
          $filters = [
              'q'      => $this->request->getPost('f_q'),
              'curso'  => $this->request->getPost('f_curso'),
              'estado' => $this->request->getPost('f_estado'),
          ];

          $alumne = $alumneModel->find($id);
          if ($alumne) {
              $alumneModel->update($id, ['estado' => 'Validado']);
              
              // Generate expediente and PDF
              $this->generateExpediente($id);
          }
          
          // Unlock the student
          $this->validationLockModel->unlockStudent($id);

          return $this->redirectToNextParaValidar($id, $filters, $obfuscatedId);
      }

      public function anularAlumno($obfuscatedId)
      {
          try {
              $id = IdObfuscator::extractIdFromUrl($obfuscatedId);
          } catch (\Exception $e) {
              throw new \CodeIgniter\Exceptions\PageNotFoundException('URL inválida');
          }
          
          $alumneModel = new AlumneModel();
          $filters = [
              'q'      => $this->request->getPost('f_q'),
              'curso'  => $this->request->getPost('f_curso'),
              'estado' => $this->request->getPost('f_estado'),
          ];

          $mensaje = $this->request->getPost('mensaje'); // no se usa aún para enviar email

          $alumne = $alumneModel->find($id);
          if ($alumne) {
              $alumneModel->update($id, ['estado' => 'Anulado']);
          }
          
          // Unlock the student
          $this->validationLockModel->unlockStudent($id);

          return $this->redirectToNextParaValidar($id, $filters, $obfuscatedId);
      }

      private function redirectToNextParaValidar(int $currentId, array $filters, string $currentObfuscatedId = null)
      {
          $db = \Config\Database::connect();
          $builder = $db->table('alumne a')
              ->select('a.id_alumne as id, a.nombre, a.apellidos, a.dni, e.nombre as curso')
              ->join('estructuras e', 'e.id = a.estructura_curso_id', 'left')
              ->where('a.id_alumne >', $currentId)
              ->orderBy('a.id_alumne', 'ASC');

          // Aplicar filtro de estado solo si viene de la vista (PV, V, E, AN)
          if (!empty($filters['estado']) && $filters['estado'] !== 'ALL') {
              $estadoMap = [
                  'PV' => 'Para validar',
                  'V'  => 'Validado',
                  'E'  => 'En revisión',
                  'AN' => 'Anulado',
              ];
              if (isset($estadoMap[$filters['estado']])) {
                  $builder->where('a.estado', $estadoMap[$filters['estado']]);
              }
          }

          if (!empty($filters['curso'])) {
              $builder->where('e.nombre', $filters['curso']);
          }

          if (!empty($filters['q'])) {
              $q = $filters['q'];
              $builder->groupStart()
                  ->like('a.nombre', $q)
                  ->orLike('a.apellidos', $q)
                  ->orLike('a.dni', $q)
                  ->groupEnd();
          }

          $next = $builder->get()->getRow();

          $query = http_build_query(array_filter([
              'q'      => $filters['q'] ?? null,
              'curso'  => $filters['curso'] ?? null,
              'estado' => $filters['estado'] ?? null,
          ]));

          if ($next) {
              $nextObfuscatedId = IdObfuscator::generateUrlSegment($next->id);
              $url = 'privat/validar/' . $nextObfuscatedId;
              if ($query) {
                  $url .= '?' . $query;
              }
              return redirect()->to(base_url($url));
          }

          // Si no hay siguiente, volver a la lista respetando filtros
          $url = 'privat/validados';
          if ($query) {
              $url .= '?' . $query;
          }
          return redirect()->to(base_url($url));
      }
     public function mensatges_view(){
          // Cargar mensajes desde la base de datos
          $this->mensajeModel->initializeDefaultMessages();
          $mensajes = $this->mensajeModel->findAll();
          
          return view('privat/mensatges', ['mensajes' => $mensajes]); 
    }
}
