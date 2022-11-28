<?php

namespace App\Controllers;

use Config\Services;
use CodeIgniter\Controller;
use App\Models\usuarioModel;
use App\Models\cuentaModel;
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
                return view('bancoView\createBancoView', $data);
            }
            $tipo = array('tipo' => "banco");
            $tipo['pantalla'] = "create";
            return  view('operacionExitosa', $tipo);
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
            $cuentaModel = new cuentaModel($db);
            $cuentas = $cuentaModel->where('id_banco', $id)->findAll();
            if (sizeof($cuentas) <= 0) {
                $bancoModel->where('id_banco', $id)->delete();
                $tipo = array('tipo' => "banco");
                $tipo['pantalla'] = "delete";
                return  view('operacionExitosa', $tipo);
            } else {
                $message = "Existen cuentas para este banco";
                $tipo = array('tipo' => "banco");
                $tipo['pantalla'] = "delete";
                $tipo['message'] = $message;
                return view('operacionNoExitosa', $tipo);
            }
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
            $validation = array(
                'nombre' => "",
                'direccion' => "",
                'numero_sucursal' => "",
            );
            if (strtolower($this->request->getMethod()) !== 'post') {
                $banco['validation'] = $validation;
                $banco['pantalla'] = 'update';
                return  view('bancoView\createBancoView', $banco);
            }
            $data = array(
                'id_banco' => $banco['id_banco'],
                'nombre' => $request->getPost('inputNombre'),
                'direccion' => $request->getPost('inputDireccion'),
                'numero_sucursal' => $request->getPost('inputNroSucursal'),
            );
            if (!$bancoModel->update($id, $data)) {
                foreach ($bancoModel->errors() as $clave => $valor) {
                    $validation[$clave] = $valor;
                }
                $data['validation'] = $validation;
                $data['pantalla'] = 'update';
                return  view('bancoView\createBancoView', $data);
            }
            $tipo = array('tipo' => "banco");
            $tipo['pantalla'] = "update";
            return  view('operacionExitosa', $tipo);
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return view("usuarioView/login", $data);
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

    public function volver()
    {
        return view("bancoView/opcionesBancoView.php");
    }
}
