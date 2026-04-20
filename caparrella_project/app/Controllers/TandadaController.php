<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CursModel;
use App\Models\TandadaModel;
use CodeIgniter\HTTP\ResponseInterface;
use PHPUnit\TextUI\XmlConfiguration\Validator;

class TandadaController extends BaseController
{
    public function index()
    {
        
    }
    public function tanda_view(){
        helper('from');
   $TandadaModel=new TandadaModel();

   $CursoModel = new CursModel() ;
    
   $Tandadas = $TandadaModel->paginate(6,'default'); 

   $data['tandada']=$Tandadas ; 

    return view('privat/Tandada/Tandadas_list',$data);
    
    }  

   public function T_create(){
    helper('form'); 
    $CursoModel = new CursModel() ;
    
    $data['cursos'] = $CursoModel->findAll() ;
    return view('privat/Tandada/T_create',$data) ;
   }


   public function T_post(){
   helper('form');
   $TandadaModel=new TandadaModel();

   $CursoModel = new CursModel() ;

   $nom_tanda = $this->request->getPost('nom');
   $estado = $this->request->getPost('estado');
   $curso = $this->request->getPost('curso') ;
   $fecha_i =$this->request->getPost('fecha_inicio');
   $fecha_f= $this->request->getPost('fecha_fin') ;
   
   $validatio_rules = [
    'nom'   => 'required' ,
    'estado' => 'required' ,
    'curso' => 'required',
    'fecha_inicio' => 'required',
    'fecha_fin' => 'required'
   ];

   
   if(!$this->validate($validatio_rules)){
     return redirect()->to('privat/Tandada/create')->with('error',$validatio_rules)->withInput();
   }

   $data_tanda = [
   'nom_tandada' => $nom_tanda,
   'fecha_inici' => $fecha_i,
   'fecha_fin' => $fecha_f,
   'estado' => $estado
   ];
  
   $TandadaModel ->insert($data_tanda);
   return redirect()->to('privat/Tandada/create')->with('succes','Tandada Created exitoso') ;
   }
    
}
