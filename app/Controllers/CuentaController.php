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

    public function create()
    {
        if (isset($_SESSION['tipo_usuario'])) {
            $request = \Config\Services::request();
            $bancoModel = new bancoModel($db);
            $cuentaModel = new cuentaModel($db);
            $clienteModel = new clienteModel($db);
            $bancos = $bancoModel->findAll();
            $data = array(
                'numero' => "",
                'tipo_cuenta' => "",
                'fecha_start' => "",
                'tipo_moneda' => "Pesos argentinos",
                'monto' => (int) 0,
            );
            if (strtolower($this->request->getMethod()) !== 'post') {
                $data['validation'] = Services::validation();
                $data['bancos'] = $bancos;
                $data['pantalla'] = 'create';
                return view('components\header') . view('components\navbar') . view('cuentaView\createCuentaView', $data);
            }
            $cliente = $clienteModel->where('id_usuario', $_SESSION['id_usuario'])->findAll();
            $data = array(
                'numero' => $request->getPost('inputNumero'),
                'tipo_cuenta' => $request->getPost('selectTipo'),
                'fecha_start' => $request->getPost('inputFechaCreacion'), //aca lo podemos hacer por programa que lo haga solo el dia que la crea el usuario
                'tipo_moneda' => $request->getPost('inputMoneda'), //aca tmb lo de arriba, o no?
                'monto' => 0,
                'id_titular' => $cliente[0]['id_cliente'],
                'id_banco' => $request->getPost('inputBanco'),
            );
            // $rules = [
            //     'nombre_apellido' => 'required',
            //     'dni' => 'required'
            // ];
            // if (!$this->validate($rules)) {
            //     return view('components\header') . view('components\navbar') . view('clienteView\createClienteView', [
            //         'validation' => $this->validator,
            //     ]);
            // }
            if (!$cuentaModel->insert($data)) {
                echo var_dump($cuentaModel->errors());
                return 0;
                $data['validation'] = $this->validator;
                $data['bancos'] = $bancos;
                $data['pantalla'] = 'create';
                return view('components\header') . view('components\navbar') . view('cuentaView\createCuentaView', $data);
            }
            return view('components\header') . view('components\navbar') . view('components\operacionExitosa');
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return  view('components\header') . view('components\navbar') . view("usuarioView/login", $data);
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 0) {
            $cuentaModel = new cuentaModel($db);
            $cuentaModel->where('id_cuenta', $id)->delete();
            $data = $cuentaModel->findAll();
            return view('components\header') . view('components\navbar') . view('cuentaView\mostrarCuentaView', [
                'validation' => $this->validator,
                'bancos' => $data,
            ]);
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return  view('components\header') . view('components\navbar') . view("usuarioView/login", $data);
        }
    }

    public function update($id)
    {

        if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 0) {
            $request = \Config\Services::request();
            $clienteModel = new clienteModel($db);
            $cuentaModel = new cuentaModel($db);
            $cuenta = $cuentaModel->where('id_cuenta', $id)->findAll();
            $cuenta = $cuenta[0];
            if (strtolower($this->request->getMethod()) !== 'post') {
                $cuenta['pantalla'] = 'update';
                $cuenta['validation'] = $this->validator;
                return view('components\header') . view('components\navbar') . view('cuentaView\createCuentaView', $cuenta);
            }
            $cliente = $clienteModel->where('id_usuario', $_SESSION['id_usuario'])->findAll();
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
                var_dump($cuentaModel->errors());
                $data['validation'] = $this->validator;
                $data['pantalla'] = 'update';
                return view('components\header') . view('components\navbar') . view('bancoView\createCuentaView', $data);
            }
            return view('components\header') . view('components\navbar') . view('components\operacionExitosa');
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return  view('components\header') . view('components\navbar') . view("usuarioView/login", $data);
        }
    }

    /* funcion que muestra todas las cuentas que posee el banco */
    public function mostrarCuentas()
    {
        if (isset($_SESSION['tipo_usuario'])) {
            if ($_SESSION['tipo_usuario'] == 0) {
                $cuentaModel = new cuentaModel($db);
                if (strtolower($this->request->getMethod()) !== 'post') {
                    $data['validation'] = $this->validator;
                    $data['cuentas'] = $cuentaModel->findAll();
                    return view('components\header') . view('components\navbar') . view('cuentaView\mostrarCuentaView', $data);
                }
                $request = \Config\Services::request();
                $data = $cuentaModel->findAll();
                if (sizeof($data) == 0) {
                    $data = $cuentaModel->where($request->getPost('selectForma'), $request->getPost('inputValor'))->findAll();
                }
                return view('components\header') . view('components\navbar') . view('cuentaView\mostrarCuentaView', [
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

                            return view('components\header') . view('components\navbar') . view('cuentaView\mostrarCuentaView', [
                                'validation' => Services::validation(),
                                'cuentas' => $valoresCuentas,

                            ]);
                        }
                    }
                }
            }
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return  view('components\header') . view('components\navbar') . view("usuarioView/login", $data);
        }
    }

    public function mostrarCuentasSegunCliente($id)
    {
        if (isset($_SESSION['tipo_usuario'])) {
            $cuentaModel = new cuentaModel($db);
            $cuentas = $cuentaModel->where('id_titular', $id)->findAll();
            return view('components\header') . view('components\navbar') . view('clienteView\mostrarCuentaView', [
                'validation' => $this->validator,
                'cuentas' => $cuentas,
            ]);
        } else {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return  view('components\header') . view('components\navbar') . view("usuarioView/login", $data);
        }
    }
}
