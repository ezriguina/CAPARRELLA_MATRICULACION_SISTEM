<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BonifModel;
use App\Models\CursModel;

class BonificacionesController extends BaseController
{
    public function index(){}

    public function bonificaciones_view()
    {
        helper('form');

        $model = new BonifModel();

        $bonificaciones = $model
            ->select('bonificaciones.*, curs.Nom_curs')
            ->join('curs', 'curs.id_curs = bonificaciones.id_curso')
            ->paginate(6);

        $data['bonificaciones'] = $bonificaciones;

        return view('privat/Bonificaciones/B_list', $data);
    }

    public function B_create()
    {
        helper('form');

        $cursoModel = new CursModel();

        $data['cursos'] = $cursoModel->findAll();

        return view('privat/Bonificaciones/B_create', $data);
    }

    public function B_post()
    {
        helper('form');

        $model = new BonifModel();

        $rules = [
            'nombre'   => 'required',
            'precio'   => 'required|decimal',
            'id_curso' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('privat/Bonificaciones/create')
                ->with('error', $this->validator->getErrors())
                ->withInput();
        }

        $data = [
            'nombre'   => $this->request->getPost('nombre'),
            'precio'   => $this->request->getPost('precio'),
            'id_curso' => $this->request->getPost('id_curso')
        ];

        $model->insert($data);

        return redirect()->to('privat/Bonificaciones')
            ->with('success', 'Bonificación creada');
    }

    public function B_edit($id)
    {
        helper('form');

        $model = new BonifModel();
        $cursoModel = new CursModel();

        $data['bonificacion'] = $model->find($id);
        $data['cursos'] = $cursoModel->findAll();

        return view('privat/Bonificaciones/B_edit', $data);
    }

    public function B_edit_post($id)
    {
        helper('form');

        $model = new BonifModel();

        $rules = [
            'nombre'   => 'required',
            'precio'   => 'required|decimal',
            'id_curso' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('privat/Bonificaciones/edit/' . $id)
                ->with('error', $this->validator->getErrors())
                ->withInput();
        }

        $data = [
            'nombre'   => $this->request->getPost('nombre'),
            'precio'   => $this->request->getPost('precio'),
            'id_curso' => $this->request->getPost('id_curso')
        ];

        $model->update($id, $data);

        return redirect()->to('privat/Bonificaciones')
            ->with('success', 'Actualizada correctamente');
    }

    public function B_delete($id)
    {
        $model = new BonifModel();

        $model->delete($id);

        return redirect()->to('privat/Bonificaciones')
            ->with('success', 'Eliminada');
    }

    public function B_view($id)
    {
        $model = new BonifModel();

        $data['bonificacion'] = $model->find($id);
        
        return view('privat/Bonificaciones/B_list', $data);
    }
}