<?php

namespace App\Controllers;

use Config\Services;
use CodeIgniter\Controller;
use App\Models\usuarioModel;
use App\Models\bancoModel;

class BancoController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $session = \Config\Services::session();
    }

    public function create()
    {
        $request = \Config\Services::request();
        $bancoModel = new bancoModel($db);
        $dato = array(
            'nombre' => "",
            'direccion' => "",
            'numero_sucursal' => "",
        );
        if (strtolower($this->request->getMethod()) !== 'post') {
            $data['pantalla'] = 'create';
            $data['validation'] = $this->validator;
            return view('components\header') . view('components\navbar') . view('bancoView\createBancoView', $data);
        }
        $data = array(
            'nombre' => $request->getPost('inputNombre'),
            'direccion' => $request->getPost('inputDireccion'),
            'numero_sucursal' => $request->getPost('inputNroSucursal'),
        );
        //$rules = $bancoModel->getValidationRules();
        //if (!$this->validate($rules)) {
        //    $data['pantalla'] = 'create';
        //    $data['validation'] = $this->validator;
        //    return view('components\header') . view('components\navbar') . view('bancoView\createBancoView', $data);
        //}
        if (!$bancoModel->insert($data)) {
            var_dump($bancoModel->errors());
            $data['validation'] = $this->validator;
            $data['pantalla'] = 'create';
            return view('components\header') . view('components\navbar') . view('bancoView\createBancoView', $data);
        }
        return view('components\header') . view('components\navbar') . view('components\operacionExitosa');
    }

    public function delete($id)
    {
        $bancoModel = new bancoModel($db);
        $bancoModel->where('id_banco', $id)->delete();
        $data = $bancoModel->findAll();
        return view('components\header') . view('components\navbar') . view('bancoView\mostrarBancoView', [
            'validation' => $this->validator,
            'bancos' => $data,
        ]);
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $bancoModel = new bancoModel($db);
        $banco = $bancoModel->where('id_banco', $id)->findAll();
        $banco = $banco[0];
        if (strtolower($this->request->getMethod()) !== 'post') {
            $banco['pantalla'] = 'update';
            $banco['validation'] = $this->validator;
            return view('components\header') . view('components\navbar') . view('bancoView\createBancoView', $banco);
        }
        $data = array(
            'nombre' => $request->getPost('inputNombre'),
            'direccion' => $request->getPost('inputDireccion'),
            'numero_sucursal' => $request->getPost('inputNroSucursal'),
        );
        if (!$bancoModel->update($id, $data)) {
            var_dump($bancoModel->errors());
            $data['validation'] = $this->validator;
            $data['pantalla'] = 'update';
            return view('components\header') . view('components\navbar') . view('bancoView\createBancoView', $data);
        }
        return view('components\header') . view('components\navbar') . view('components\operacionExitosa');
    }

    public function mostrar()
    {
        $bancoModel = new bancoModel($db);
        $request = \Config\Services::request();
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('components\header') . view('components\navbar') . view('bancoView\mostrarBancoView', [
                'validation' => Services::validation(),
                'bancos' => $bancoModel->findAll(),
            ]);
        }
        $data = $bancoModel->where($request->getPost('selectForma'), $request->getPost('inputValor'))->findAll();
        if (sizeof($data) == 0) {
            $data = $bancoModel->findAll();
        }
        return view('components\header') . view('components\navbar') . view('bancoView\mostrarBancoView', [
            'validation' => $this->validator,
            'bancos' => $data,
        ]);
    }
}
