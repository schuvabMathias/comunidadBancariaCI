<?php

namespace App\Controllers;

use Config\Services;
use App\Models\usuarioModel;
use App\Models\bancoModel;
use App\Models\clienteModel;
use App\Models\cuentaModel;


class CuentaController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $session = \Config\Services::session();
    }

    public function index()
    {
        return view('components\header') . view('components\navbar') . view('clienteView\createCuentaView', [
            'validation' => Services::validation(),
        ]);
    }

    /*  public function create()
    {
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('components\header') . view('components\navbar') . view('clienteView\createClienteView', [
                'validation' => Services::validation(),
            ]);
        }
        // $rules = [
        //     'nombre_apellido' => 'required',
        //     'dni' => 'required'
        // ];
        // if (!$this->validate($rules)) {
        //     return view('components\header') . view('components\navbar') . view('clienteView\createClienteView', [
        //         'validation' => $this->validator,
        //     ]);
        // }
        $usuarioModel = new usuarioModel($db);
        
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
                var_dump($usuarioModel->errors());
                var_dump($clienteModel->errors());
                $usuarioModel->delete($user);
                return view('components\header') . view('components\navbar') . view('clienteView\createClienteView', [
                    'validation' => $this->validator,
                ]);
            }
        } else {
            var_dump($clienteModel->errors());
            return view('components\header') . view('components\navbar') . view('clienteView\createClienteView', [
                'validation' => $this->validator,
            ]);
        }
        return view('components\header') . view('components\navbar') . view('components\operacionExitosa');
    } */

    /* public function delete()
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
    } */

    /* funcion que muestra todas las cuentas que posee el banco */
    public function mostrarCuentas()
    {
        if ($_SESSION['tipo_usuario'] == 0) {
            $cuentaModel = new cuentaModel($db);
            if (strtolower($this->request->getMethod()) !== 'post') {
                return view('components\header') . view('components\navbar') . view('clienteView\mostrarClienteView', [
                    'validation' => Services::validation(),
                    'cuentas' => $cuentaModel->findAll(),
                ]);
            }
            $request = \Config\Services::request();
            $data = $cuentaModel->findAll();
            if (sizeof($data) == 0) {
                $data = $cuentaModel->findAll();
            }
            return view('components\header') . view('components\navbar') . view('clienteView\mostrarClienteView', [
                'validation' => $this->validator,
                'cuentas' => $data,
            ]);
        } else {
            if (strtolower($this->request->getMethod()) !== 'post') {
                $usuarioModel = new usuarioModel($db);
                $clienteModel = new clienteModel($db);
                $cuentaModel = new cuentaModel($db);
                $valoresUsuario = $usuarioModel->where('usuario', $_SESSION['usuario'])->findAll();
                if (sizeof($valoresUsuario) != 0) {
                    $valoresClientes = $clienteModel->where('id_usuario', $valoresUsuario[0]['id_usuario'])->findAll();
                    if (sizeof($valoresClientes) != 0) {
                        $valoresCuentas = $cuentaModel->where('titular', $valoresClientes[0]['id-cuenta'])->findAll();

                        return view('components\header') . view('components\navbar') . view('clienteView\mostrarClienteView', [
                            'validation' => Services::validation(),
                            'cuentas' => $valoresCuentas,

                        ]);
                    }
                }
            }
        }
    }
}
