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

    public function index()
    {
        return  view('bancoView\opcionesBancoView');
    }

    public function create()
    {
        if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 0) {
            $request = \Config\Services::request();
            $bancoModel = new bancoModel($db);
            $data = array(
                'nombre' => "",
                'direccion' => "",
                'numero_sucursal' => "",
            );
            $validation = array(
                'nombre' => "",
                'direccion' => "",
                'numero_sucursal' => "",
            );
            if (strtolower($this->request->getMethod()) !== 'post') {
                $data['pantalla'] = 'create';
                $data['validation'] = $validation;
                return  view('bancoView\createBancoView', $data);
            }
            $data = array(
                'nombre' => $request->getPost('inputNombre'),
                'direccion' => $request->getPost('inputDireccion'),
                'numero_sucursal' => $request->getPost('inputNroSucursal'),
            );
            if (!$bancoModel->insert($data)) {
                foreach ($bancoModel->errors() as $clave => $valor) {
                    $validation[$clave] = $valor;
                }
                $data['validation'] = $validation;
                $data['pantalla'] = 'create';
                return  view('bancoView\createBancoView', $data);
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

    public function delete($id)
    {
        if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 0) {
            $bancoModel = new bancoModel($db);
            $bancoModel->where('id_banco', $id)->delete();
            $data = $bancoModel->findAll();
            return  view('bancoView\mostrarBancoView', [
                'validation' => $this->validator,
                'bancos' => $data,
            ]);
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return   view("usuarioView/login", $data);
        }
    }

    public function update($id)
    {
        if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 0) {
            $request = \Config\Services::request();
            $bancoModel = new bancoModel($db);
            $banco = $bancoModel->where('id_banco', $id)->findAll();
            $banco = $banco[0];
            if (strtolower($this->request->getMethod()) !== 'post') {
                $banco['pantalla'] = 'update';
                $banco['validation'] = $this->validator;
                return  view('bancoView\createBancoView', $banco);
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
                return  view('bancoView\createBancoView', $data);
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
        if (isset($_SESSION['tipo_usuario'])) {
            $bancoModel = new bancoModel($db);
            $request = \Config\Services::request();
            if (strtolower($this->request->getMethod()) !== 'post') {
                return  view('bancoView\mostrarBancoView', [
                    'validation' => Services::validation(),
                    'bancos' => $bancoModel->findAll(),
                ]);
            }
            $data = $bancoModel->where($request->getPost('selectForma'), $request->getPost('inputValor'))->findAll();
            if ($request->getPost('inputValor') == "") {
                $data = $bancoModel->findAll();
            }
            return  view('bancoView\mostrarBancoView', [
                'validation' => $this->validator,
                'bancos' => $data,
            ]);
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return   view("usuarioView/login", $data);
        }
    }

    public function mostrarSucursales($nombre)
    {
        if (isset($_SESSION['tipo_usuario'])) {
            $bancoModel = new bancoModel($db);
            $data = $bancoModel->where('nombre', $nombre)->findAll();
            return  view('bancoView\mostrarBancoView', [
                'validation' => $this->validator,
                'bancos' => $data,
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
