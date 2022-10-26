<?php

namespace App\Controllers;

use Config\Services;
use CodeIgniter\Controller;
use App\Models\usuarioModel;
use App\Models\clienteModel;
use App\Models\cuentaModel;

class ClienteController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $session = \Config\Services::session();
    }

    public function index()
    {
        return  view('clienteView\opcionesClienteView');
    }

    public function create()
    {
        $encrypter = \Config\Services::encrypter();
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] == 0) {
            $request = \Config\Services::request();
            $usuarioModel = new usuarioModel($db);
            $clienteModel = new clienteModel($db);
            $dato = array(
                'nombre_apellido' => "",
                'direccion' => "",
                'telefono' => "",
                'fecha_nacimiento' => "",
                'dni' => "",
                'cuit_cuil' => "",
            );
            if (strtolower($this->request->getMethod()) !== 'post') {
                $dato['pantalla'] = 'create';
                $dato['validation'] = $this->validator;
                return  view('clienteView\createClienteView', $dato);
            }
            $data = array(
                'nombre_apellido' => $request->getPost('inputNomyApe'),
                'direccion' => $request->getPost('inputDireccion'),
                'telefono' => $request->getPost('inputTelefono'),
                'fecha_nacimiento' => $request->getPost('inputFechaNac'),
                'dni' => $request->getPost('inputDocumento'),
                'cuit_cuil' => $request->getPost('inputCUIT_CUIL'),
            );
            //$rules = $clienteModel->getValidationRules();
            //if (!$this->validate($rules)) {
            //    $data['validation'] = $this->validator;
            //    return  view('clienteView\createClienteView', $data);
            //}
            $user = array(
                'usuario' => $request->getPost('inputNomyApe'),
                'contrasena' => $encrypter->encrypt($request->getPost('inputDocumento')),
                'tipo_usuario' => 1,
            );
            if ($usuarioModel->insert($user)) {
                $u = $usuarioModel->where('usuario', $request->getPostGet('inputNomyApe'))->findAll();
                $data['id_usuario'] = (int)$u[0]["id_usuario"];
                if (!$clienteModel->insert($data)) {
                    $user['id_usuario'] = (int)$u[0]["id_usuario"];
                    $usuarioModel->delete($user);
                    $data['validation'] = $this->validator;
                    unset($data['id_usuario']);
                    $data['pantalla'] = 'create';
                    return  view('clienteView\createClienteView', $data);
                }
            } else {

                $data['validation'] = $this->validator;
                $data['pantalla'] = 'create';
                return  view('clienteView\createClienteView', $data);
            }
            return  view('components\operacionExitosa');
        } else {
            return view('components/header') . view('components/navbar') . view('home');
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION['tipo_usuario'])) {
            $clienteModel = new clienteModel($db);
            $clienteModel->where('id_cliente', $id)->delete();
            return  view('components\mostrarClienteView', [
                'validation' => $this->validator,
                'clientes' => $clienteModel->findAll(),
            ]);
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return   view("usuarioView/login", $data);
        }
    }

    public function update($dni)
    {
        if (isset($_SESSION['tipo_usuario'])) {
            $request = \Config\Services::request();
            $usuarioModel = new usuarioModel($db);
            $clienteModel = new clienteModel($db);
            $cliente = $clienteModel->where('dni', $dni)->findAll();
            $cliente = $cliente[0];
            if (strtolower($this->request->getMethod()) !== 'post') {
                $cliente['pantalla'] = 'update';
                $cliente['validation'] = $this->validator;
                return  view('clienteView\createClienteView', $cliente);
            }
            $user = array(
                'contrasena' => $dni,
                'tipo_usuario' => 1,
            );
            $u = $usuarioModel->where('contrasena', $dni)->findAll();
            $data = array(
                'nombre_apellido' => $request->getPost('inputNomyApe'),
                'direccion' => $request->getPost('inputDireccion'),
                'telefono' => $request->getPost('inputTelefono'),
                'fecha_nacimiento' => $request->getPost('inputFechaNac'),
                'dni' => $request->getPost('inputDocumento'),
                'cuit_cuil' => $request->getPost('inputCUIT_CUIL'),
            );
            $data['id_usuario'] = (int)$u[0]["id_usuario"];
            $user = array(
                'usuario' => $request->getPost('inputNomyApe'),
                'contrasena' => $request->getPost('inputDocumento'),
                'tipo_usuario' => 1,
            );
            $usuarioModel->update((int)$u[0]["id_usuario"], $user);
            if (!$clienteModel->update($cliente['id_cliente'], $data)) {
                $data['validation'] = $this->validator;
                unset($data['id_usuario']);
                $data['pantalla'] = 'update';
                return  view('clienteView\createClienteView', $data);
            }
            return  view('components\operacionExitosa');
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return   view("usuarioView/login", $data);
        }
    }

    public function mostrar()
    {
        if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 0) {
            $request = \Config\Services::request();
            $clienteModel = new clienteModel($db);
            if (strtolower($this->request->getMethod()) !== 'post') {
                return  view('clienteView\mostrarClienteView', [
                    'validation' => Services::validation(),
                    'clientes' => $clienteModel->findAll(),
                ]);
            }
            $data = $clienteModel->where($request->getPost('selectForma'), $request->getPost('inputValor'))->findAll();
            if ($request->getPost('inputValor') == "") {
                $data = $clienteModel->findAll();
            }
            return  view('clienteView\mostrarClienteView', [
                'validation' => $this->validator,
                'clientes' => $data,
            ]);
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return   view("usuarioView/login", $data);
        }
    }

    public function mostrarClientesSegunBanco($id)
    {
        if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 0) {
            $clienteModel = new clienteModel($db);
            $cuentaModel = new cuentaModel($db);
            $cuentas = $cuentaModel->select('id_titular')->where('id_banco', $id)->findAll();
            if (sizeof($cuentas) == 0) {
                return  view('clienteView\mostrarClienteView', [
                    'validation' => $this->validator,
                    'clientes' => [],
                ]);
            }
            for ($i = 0; $i < sizeof($cuentas); $i++) {
                $ids[$i] = $cuentas[$i]['id_titular'];
            }
            $clientes = $clienteModel->whereIn('id_cliente', $ids)->findAll();
            return  view('clienteView\mostrarClienteView', [
                'validation' => $this->validator,
                'clientes' => $clientes,
            ]);
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return   view("usuarioView/login", $data);
        }
    }
}
