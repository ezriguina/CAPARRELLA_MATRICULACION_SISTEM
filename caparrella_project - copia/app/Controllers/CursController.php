<?php

namespace App\Controllers;

use App\Models\CursModel;
use CodeIgniter\Controller;

class CursController extends Controller
{
    public function index()
    {
        helper('form');

        $CursoModel = new CursModel();

        $data['cursos'] = $CursoModel->paginate(6);
        $data['pager'] = $CursoModel->pager;

        return view('privat/Cursos/Curs_list', $data);
    }

    public function create()
    {
        helper('form');

        return view('privat/Cursos/Curs_create');
    }

    public function store()
    {
        helper('form');

        $CursoModel = new CursModel();

        $rules = [
            'Nom_curs'    => 'required',
            'codigo_curs' => 'required',
            'precio'      => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->to('privat/Cursos/Curs_create')
                ->with('error', $this->validator->getErrors())
                ->withInput();
        }

        $data = [
            'Nom_curs'    => $this->request->getPost('Nom_curs'),
            'codigo_curs' => $this->request->getPost('codigo_curs'),
            'precio'      => $this->request->getPost('precio')
        ];

        $CursoModel->insert($data);

        return redirect()->to('privat/cursos')->with('success', 'Curso creado correctamente');
    }

    public function edit($id)
    {
        helper('form');

        $CursoModel = new CursModel();

        $curso = $CursoModel->find($id);

        if (!$curso) {
            return redirect()->to('privat/cursos')->with('error', 'Curso no encontrado');
        }

        $data['curso'] = $curso;

        return view('privat/Cursos/Curs_edit', $data);
    }

    public function update($id)
    {
        helper('form');

        $CursoModel = new CursModel();

        $rules = [
            'Nom_curs'    => 'required',
            'codigo_curs' => 'required',
            'precio'      => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->to('privat/cursos/edit/' . $id)
                ->with('error', $this->validator->getErrors())
                ->withInput();
        }

        $data = [
            'Nom_curs'    => $this->request->getPost('Nom_curs'),
            'codigo_curs' => $this->request->getPost('codigo_curs'),
            'precio'      => $this->request->getPost('precio')
        ];

        $CursoModel->update($id, $data);

        return redirect()->to('privat/cursos')->with('success', 'Curso actualizado correctamente');
    }

    public function delete($id)
    {
        helper('form');

        $CursoModel = new CursModel();

        $CursoModel->delete($id);

        return redirect()->to('privat/cursos')->with('success', 'Curso eliminado correctamente');
    }
}