<?php

namespace App\Controllers;

use Config\Services;
use CodeIgniter\Controller;
use App\Models\clienteModel;
use App\Models\usuarioModel;

class ClienteController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $session = \Config\Services::session();
    }

    public function index()
    {
        return view('components\header') . view('components\navbar') . view('clienteView\createClienteView', [
            'validation' => Services::validation(),
        ]);
    }

    public function create()
    {
        $usuarioModel = new usuarioModel($db);
        $clienteModel = new clienteModel($db);
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('components\header') . view('components\navbar') . view('clienteView\createClienteView', [
                'validation' => Services::validation(),
            ]);
        }
        $rules = $clienteModel->getValidationRules();
        if (!$this->validate($rules)) {
            return view('components\header') . view('components\navbar') . view('clienteView\createClienteView', [
                'validation' => $this->validator,
            ]);
        }
        $request = \Config\Services::request();
        $user = array(
            'usuario' => $request->getPost('inputNomyApe'),
            'contrasena' => $request->getPost('inputDocumento'),
            'tipo_usuario' => 1,
        );
        if ($usuarioModel->insert($user)) {
            $u = $usuarioModel->where('usuario', $request->getPostGet('inputNomyApe'))->findAll();
            $data = array(
                'nombre_apellido' => $request->getPost('inputNomyApe'),
                'direccion' => $request->getPost('inputDireccion'),
                'telefono' => $request->getPost('inputTelefono'),
                'fecha_nacimiento' => $request->getPost('inputFechaNac'),
                'dni' => $request->getPost('inputDocumento'),
                'cuit_cuil' => $request->getPost('inputCUIT_CUIL'),
                'id_usuario' => (int)$u[0]["id_usuario"],
            );
            if (!$clienteModel->insert($data)) {
                var_dump($clienteModel->errors());
                $usuarioModel->delete($user);
                return view('components\header') . view('components\navbar') . view('clienteView\createClienteView', [
                    'validation' => $this->validator,
                ]);
            }
        } else {
            var_dump($usuarioModel->errors());
            return view('components\header') . view('components\navbar') . view('clienteView\createClienteView', [
                'validation' => Services::validation(),
            ]);
        }
        return view('components\header') . view('components\navbar') . view('components\operacionExitosa');
    }

    public function delete()
    {
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('components\header') . view('components\navbar') . view('clienteView\mostrarClienteView', [
                'validation' => Services::validation(),
            ]);
        }
        $rules = [
            'nombre_apellido' => 'required',
            'dni' => 'required'
        ];
        if (!$this->validate($rules)) {
            return view('components\header') . view('components\navbar') . view('clienteView\mostrarClienteView', [
                'validation' => $this->validator,
            ]);
        }
        $clienteModel = new clienteModel($db);
        $request = \Config\Services::request();
        $data = array(
            'nombre_apellido' => $request->getPost('inputNomyApe'),
            'direccion' => $request->getPost('inputDireccion'),
            'telefono' => $request->getPost('inputTelefono'),
            'fecha_nacimiento' => $request->getPost('inputFechaNac'),
            'dni' => $request->getPost('inputDocumento'),
            'cuit_cuil' => $request->getPost('inputCUIT_CUIL'),
        );
        if (!$clienteModel->insert($data)) {
            var_dump($clienteModel->errors());
            return view('components\header') . view('components\navbar') . view('clienteView\createClienteView', [
                'validation' => $this->validator,
            ]);
        };
        return view('components\header') . view('components\navbar') . view('components\operacionExitosa');
    }

    public function mostrar()
    {
        $clienteModel = new clienteModel($db);
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('components\header') . view('components\navbar') . view('clienteView\mostrarClienteView', [
                'validation' => Services::validation(),
                'clientes' => $clienteModel->findAll(),
            ]);
        }
        $rules = $clienteModel->getValidationRules();
        if (!$this->validate($rules)) {
            return view('components\header') . view('components\navbar') . view('clienteView\mostrarClienteView', [
                'validation' => $this->validator,
                'clientes' => [],
            ]);
        }
        $request = \Config\Services::request();
        $data = $clienteModel->where($request->getPost('selectForma'), (int) $request->getPost('inputValor'))->findAll();
        if (sizeof($data) == 0) {
            $data = $clienteModel->findAll();
        }
        return view('components\header') . view('components\navbar') . view('clienteView\mostrarClienteView', [
            'validation' => $this->validator,
            'clientes' => $data,
        ]);
    }
}
