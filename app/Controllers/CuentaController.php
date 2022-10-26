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
        return  view('cuentaView\opcionesCuentaView');
    }

    public function create()
    {
        if (isset($_SESSION['tipo_usuario'])) {
            $request = \Config\Services::request();
            $cuentaModel = new cuentaModel($db);
            $clienteModel = new clienteModel($db);
            $bancoModel = new bancoModel($db);
            $bancos = $bancoModel->findAll();
            $data = array(
                'numero' => "",
                'tipo_cuenta' => "",
                'fecha_start' => "",
                'tipo_moneda' => "Pesos argentinos",
                'monto' => (int) 0,
                'id_titular' => "",
                'id_banco' => "",
            );
            $validation = array(
                'numero' => "",
                'tipo_cuenta' => "",
                'fecha_start' => "",
                'tipo_moneda' => "",
                'monto' => "",
                'id_titular' => "",
                'id_banco' => "",
            );
            if (strtolower($this->request->getMethod()) !== 'post') {
                $data['validation'] = $validation;
                $data['bancos'] = $bancos;
                $data['pantalla'] = 'create';
                return  view('cuentaView\createCuentaView', $data);
            }
            $data = array(
                'numero' => $request->getPost('inputNumero'),
                'tipo_cuenta' => $request->getPost('selectTipo'),
                'fecha_start' => $request->getPost('inputFechaCreacion'), //aca lo podemos hacer por programa que lo haga solo el dia que la crea el usuario
                'tipo_moneda' => $request->getPost('inputMoneda'), //aca tmb lo de arriba, o no?
                'monto' => 0,
                'id_titular' => "",
                'id_banco' => $request->getPost('inputBanco'),
            );
            if ($_SESSION['tipo_usuario'] == 0) {
                $cliente = $clienteModel->where('dni', $request->getPost('inputTitularDoc'))->findAll();
                if (sizeof($cliente) > 0) {
                    $data['id_titular'] = $cliente[0]['id_cliente'];
                }
            } else {
                $cliente = $clienteModel->where('id_usuario', $_SESSION['id_usuario'])->findAll();
                $data['id_titular'] = $cliente[0]['id_cliente'];
            }
            if (!$cuentaModel->insert($data)) {
                foreach ($cuentaModel->errors() as $clave => $valor) {
                    $validation[$clave] = $valor;
                }
                $data['validation'] = $validation;
                $data['bancos'] = $bancos;
                if ($_SESSION['tipo_usuario'] == 1) {
                    $data['id_titular'] = $request->getPost('inputTitular');
                } else {
                    $data['id_titular'] = $request->getPost('inputTitularDoc');
                }
                $data['pantalla'] = 'create';
                return  view('cuentaView\createCuentaView', $data);
            }
            $tipo = array('tipo' => "cuenta");
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
            $cuentaModel = new cuentaModel($db);
            $cuentaModel->where('id_cuenta', $id)->delete();
            $tipo = array('tipo' => "cuenta");
            return  view('operacionExitosa', $tipo);
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
            $clienteModel = new clienteModel($db);
            $cuentaModel = new cuentaModel($db);
            $bancoModel = new bancoModel($db);
            $bancos = $bancoModel->findAll();
            $cuenta = $cuentaModel->where('id_cuenta', $id)->findAll();
            $cliente = $clienteModel->where('id_cliente', $cuenta[0]['id_titular'])->findAll();
            $cuenta = $cuenta[0];
            $validation = array(
                'numero' => "",
                'tipo_cuenta' => "",
                'fecha_start' => "",
                'tipo_moneda' => "",
                'monto' => "",
                'id_titular' => "",
                'id_banco' => "",
            );
            if (strtolower($this->request->getMethod()) !== 'post') {
                $cuenta['pantalla'] = 'update';
                $cuenta['validation'] = $validation;
                $cuenta['bancos'] = $bancos;
                $cuenta['id_titular'] = $cliente[0]['dni'];
                return  view('cuentaView/createCuentaView', $cuenta);
            }
            $data = array(
                'numero' => $request->getPost('inputNumero'),
                'tipo_cuenta' => $request->getPost('selectTipo'),
                'fecha_start' => $request->getPost('inputFechaCreacion'), //aca lo podemos hacer por programa que lo haga solo el dia que la crea el usuario
                'tipo_moneda' => $request->getPost('inputMoneda'), //aca tmb lo de arriba, o no?
                'monto' => 0,
                'id_titular' => $cliente[0]['id_cliente'],
                'id_banco' => $request->getPost('inputBanco')
            );
            if (!$cuentaModel->update($id, $data)) {
                foreach ($cuentaModel->errors() as $clave => $valor) {
                    $validation[$clave] = $valor;
                }
                $data['validation'] = $validation;
                $data['pantalla'] = 'update';
                $cuenta['bancos'] = $bancos;
                return  view('bancoView\createCuentaView', $data);
            }
            $tipo = array('tipo' => "cuenta");
            return  view('operacionExitosa', $tipo);
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return   view("usuarioView/login", $data);
        }
    }

    /* funcion que muestra todas las cuentas que posee el banco */
    public function mostrar()
    {
        if (isset($_SESSION['tipo_usuario'])) {
            $request = \Config\Services::request();
            $usuarioModel = new usuarioModel($db);
            $clienteModel = new clienteModel($db);
            $cuentaModel = new cuentaModel($db);
            $bancoModel = new bancoModel($db);
            if ($_SESSION['tipo_usuario'] == 0) {
                if (strtolower($this->request->getMethod()) !== 'post') {
                    $valoresCuentas = $cuentaModel->findAll();
                    for ($i = 0; sizeof($valoresCuentas) > $i; $i++) {
                        $valoresClientes = $clienteModel->where('id_cliente', $valoresCuentas[$i]['id_titular'])->findAll();
                        $valoresBanco = $bancoModel->where('id_banco', $valoresCuentas[$i]['id_banco'])->findAll();
                        $valoresCuentas[$i]['id_titular'] = $valoresClientes[0]['nombre_apellido'];
                        $valoresCuentas[$i]['id_banco'] = $valoresBanco[0]['nombre'];
                        $valoresCuentas[$i]['numero_sucursal'] = $valoresBanco[0]['numero_sucursal'];
                    }
                    $data['cuentas'] = $valoresCuentas;
                    return  view('cuentaView\mostrarCuentaView', $data);
                }
                $valoresCuentas = $cuentaModel->where($request->getPost('selectForma'), $request->getPost('inputValor'))->findAll();
                if ($request->getPost('inputValor') == "") {
                    $valoresCuentas = $cuentaModel->findAll();
                }
                for ($i = 0; sizeof($valoresCuentas) > $i; $i++) {
                    $valoresClientes = $clienteModel->where('id_cliente', $valoresCuentas[$i]['id_titular'])->findAll();
                    $valoresBanco = $bancoModel->where('id_banco', $valoresCuentas[$i]['id_banco'])->findAll();
                    $valoresCuentas[$i]['id_titular'] = $valoresClientes[0]['nombre_apellido'];
                    $valoresCuentas[$i]['id_banco'] = $valoresBanco[0]['nombre'];
                    $valoresCuentas[$i]['numero_sucursal'] = $valoresBanco[0]['numero_sucursal'];
                }
                $data['cuentas'] = $valoresCuentas;
                return  view('cuentaView\mostrarCuentaView', $data);
            } else {
                if (strtolower($this->request->getMethod()) !== 'post') {
                    $valoresUsuario = $usuarioModel->where('usuario', $_SESSION['usuario'])->findAll();
                    if (sizeof($valoresUsuario) > 0) {
                        $valoresClientes = $clienteModel->where('id_usuario', $valoresUsuario[0]['id_usuario'])->findAll();
                        if (sizeof($valoresClientes) > 0) {
                            $valoresCuentas = $cuentaModel->where('id_titular', $valoresClientes[0]['id_cliente'])->findAll();
                            for ($i = 0; sizeof($valoresCuentas) > $i; $i++) {
                                $valoresBanco = $bancoModel->where('id_banco', $valoresCuentas[$i]['id_banco'])->findAll();
                                $valoresCuentas[$i]['id_titular'] = $valoresClientes[0]['nombre_apellido'];
                                $valoresCuentas[$i]['id_banco'] = $valoresBanco[0]['nombre'];
                                $valoresCuentas[$i]['numero_sucursal'] = $valoresBanco[0]['numero_sucursal'];
                            }
                            return  view('cuentaView\mostrarCuentaView', ['cuentas' => $valoresCuentas,]);
                        }
                    }
                }
            }
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return   view("usuarioView/login", $data);
        }
    }

    public function mostrarCuentasSegunCliente($id)
    {
        if (isset($_SESSION['tipo_usuario'])) {
            $cuentaModel = new cuentaModel($db);
            $cuentas = $cuentaModel->where('id_titular', $id)->findAll();
            return  view('clienteView\mostrarCuentaView', ['cuentas' => $cuentas,]);
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
        return view("cuentaView/opcionesCuentaView.php");
    }
}
