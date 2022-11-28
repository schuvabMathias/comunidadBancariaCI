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
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] == 0) {
            $request = \Config\Services::request();
            $usuarioModel = new usuarioModel($db);
            $clienteModel = new clienteModel($db);
            $data = array(
                'nombre_apellido' => "",
                'direccion' => "",
                'telefono' => "",
                'fecha_nacimiento' => "",
                'dni' => "",
                'cuit_cuil' => "",
            );
            $validation = array(
                'nombre_apellido' => "",
                'direccion' => "",
                'telefono' => "",
                'fecha_nacimiento' => "",
                'dni' => "",
                'cuit_cuil' => "",
            );
            if (strtolower($this->request->getMethod()) !== 'post') {
                $data['pantalla'] = 'create';
                $data['validation'] = $validation;
                return  view('clienteView\createClienteView', $data);
            }
            $data = array(
                'nombre_apellido' => $request->getPost('inputNomyApe'),
                'direccion' => $request->getPost('inputDireccion'),
                'telefono' => $request->getPost('inputTelefono'),
                'fecha_nacimiento' => $request->getPost('inputFechaNac'),
                'dni' => $request->getPost('inputDocumento'),
                'cuit_cuil' => $request->getPost('inputCUIT_CUIL'),
            );
            $user = array(
                'usuario' => $request->getPost('inputNomyApe'),
                'contrasena' => password_hash($request->getPost('inputDocumento'), PASSWORD_DEFAULT),
                'tipo_usuario' => 1,
            );
            $u = $usuarioModel->where('usuario', $request->getPostGet('inputNomyApe'))->findAll();
            if (sizeof($u) == 0) {
                if ($usuarioModel->insert($user)) {
                    $u = $usuarioModel->where('usuario', $request->getPostGet('inputNomyApe'))->findAll();
                    $data['id_usuario'] = (int)$u[0]["id_usuario"];
                    if (!$clienteModel->insert($data)) {
                        $usuario['id_usuario'] = (int)$u[0]["id_usuario"];
                        $usuarioModel->delete($usuario);
                        foreach ($clienteModel->errors() as $clave => $valor) {
                            $validation[$clave] = $valor;
                        }
                        $data['validation'] = $validation;
                        unset($data['id_usuario']);
                        $data['pantalla'] = 'create';
                        return  view('clienteView\createClienteView', $data);
                    }
                } else {
                    $validation['contrasena'] = "";
                    $validation['usuario'] = "";
                    foreach ($usuarioModel->errors() as $clave => $valor) {
                        $validation[$clave] = $valor;
                    }
                    $clienteModel->insert($data);
                    foreach ($clienteModel->errors() as $clave => $valor) {
                        $validation[$clave] = $valor;
                    }
                    $data['validation'] = $validation;
                    $data['pantalla'] = 'create';
                    return  view('clienteView\createClienteView', $data);
                }
                $tipo = array('tipo' => "cliente");
                $tipo['pantalla'] = "create";
                return  view('operacionExitosa', $tipo);
            } else {
                foreach ($usuarioModel->errors() as $clave => $valor) {
                    $validation[$clave] = $valor;
                }
                $clienteModel->insert($data);
                foreach ($clienteModel->errors() as $clave => $valor) {
                    $validation[$clave] = $valor;
                }
                $data['validation'] = $validation;
                $data['pantalla'] = 'create';
                return  view('clienteView\createClienteView', $data);
            }
        } else {
            return view('home');
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION['tipo_usuario'])) {
            $clienteModel = new clienteModel($db);
            $cuentaModel = new cuentaModel($db);
            $usuarioModel = new usuarioModel($db);
            $cuentas = $cuentaModel->where('id_titular', $id)->findAll();
            $cliente = $clienteModel->where('id_cliente', $id)->findAll();
            if (sizeof($cuentas) <= 0) {
                $clienteModel->where('id_cliente', $id)->delete();
                $usuarioModel->where('usuario', $cliente[0]['id_usuario'])->delete();
                $tipo = array('tipo' => "cliente");
                $tipo['pantalla'] = "delete";;
                return  view('operacionExitosa', $tipo);
            } else {
                $message = "Existen cuentas creadas para este cliente";
                $tipo = array('tipo' => "cliente");
                $tipo['pantalla'] = "delete";
                $tipo['message'] = $message;
                return  view('operacionNoExitosa', $tipo);
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
        if (isset($_SESSION['tipo_usuario'])) {
            $request = \Config\Services::request();
            $usuarioModel = new usuarioModel($db);
            $clienteModel = new clienteModel($db);
            $cliente = $clienteModel->where('id_cliente', $id)->findAll();
            $cliente = $cliente[0];
            $validation = array(
                'nombre_apellido' => "",
                'direccion' => "",
                'telefono' => "",
                'fecha_nacimiento' => "",
                'dni' => "",
                'cuit_cuil' => "",
            );
            if (strtolower($this->request->getMethod()) !== 'post') {
                $cliente['pantalla'] = 'update';
                $cliente['id_cliente'] = $id;
                $cliente['validation'] = $validation;
                return  view('clienteView\createClienteView', $cliente);
            }
            $u = $usuarioModel->where('id_usuario', $cliente['id_usuario'])->findAll();
            $data = array(
                'id_cliente' => $cliente['id_cliente'],
                'nombre_apellido' => $request->getPost('inputNomyApe'),
                'direccion' => $request->getPost('inputDireccion'),
                'telefono' => $request->getPost('inputTelefono'),
                'fecha_nacimiento' => $request->getPost('inputFechaNac'),
                'dni' => $request->getPost('inputDocumento'),
                'cuit_cuil' => $request->getPost('inputCUIT_CUIL'),
                'id_usuario' => (int)$u[0]["id_usuario"],
            );
            $user = array(
                'id_usuario' => (int)$u[0]["id_usuario"],
                'usuario' => $request->getPost('inputNomyApe'),
                'contrasena' => password_hash($request->getPost('inputDocumento'), PASSWORD_DEFAULT),
                'tipo_usuario' => 1,
            );
            if ($usuarioModel->update((int)$u[0]["id_usuario"], $user)) {
                if (!$clienteModel->update((int)$cliente['id_cliente'], $data)) {
                    foreach ($clienteModel->errors() as $clave => $valor) {
                        $validation[$clave] = $valor;
                    }
                    $data['validation'] = $validation;
                    $data['pantalla'] = 'update';
                    return  view('clienteView\createClienteView', $data);
                }
                $tipo = array('tipo' => "cliente");
                $tipo['pantalla'] = "update";
                return  view('operacionExitosa', $tipo);
            } else {
                $data['pantalla'] = 'update';
                $data['id_cliente'] = $id;
                return  view('clienteView\createClienteView', $data);
            }
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
                    'clientes' => [], 'condicion' => 'banco'
                ]);
            }
            for ($i = 0; $i < sizeof($cuentas); $i++) {
                $ids[$i] = $cuentas[$i]['id_titular'];
            }
            $clientes = $clienteModel->whereIn('id_cliente', $ids)->findAll();
            return  view('clienteView\mostrarClienteView', [
                'clientes' => $clientes, 'condicion' => 'banco'
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
        return view("clienteView/opcionesClienteView.php");
    }
}
