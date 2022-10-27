<?php

namespace App\Controllers;

use Config\Services;
use App\Models\usuarioModel;

class UsuarioController extends BaseController
{
    public function __construct()
    {
        $usuarioModel = new UsuarioModel($db);
        $usuario = $usuarioModel->where('usuario', 'admin')->findAll();
        if (sizeof($usuario) == 0) {
            $user = array(
                'usuario' => 'admin',
                'contrasena' => password_hash('admin', PASSWORD_DEFAULT),
                'tipo_usuario' => 0,
            );
            $usuarioModel->insert($user);
            $user = array(
                'usuario' => 'Jefe',
                'contrasena' => password_hash('admin', PASSWORD_DEFAULT),
                'tipo_usuario' => 0,
            );
            $usuarioModel->insert($user);
        }
        helper('form');
        $session = Services::session();
        $usuarioModel = new UsuarioModel($db);
        $user = array(
            'usuario' => 'admin',
            'contrasena' => password_hash('admin', PASSWORD_DEFAULT),
            'tipo_usuario' => 0,
        );
        $usuarioModel->insert($user);
        $user['usuario'] = 'Jefe';
        $usuarioModel->insert($user);
    }

    public function index()
    {
        if (!isset($_SESSION['usuario'])) {
            $data = [
                'user' => "",
                'password' => ""
            ];
            return  view("usuarioView/login", $data);
        } else {
            return view('sideBar/sideBar');
        }
    }

    public function connect()
    {
        $userModel = new UsuarioModel($db);
        $request = Services::request();
        if (!isset($_SESSION['usuario'])) {
            if (($u = $userModel->where('usuario', $request->getPostGet('inputUser'))->findAll()) &&
                (password_verify($request->getPostGet('inputPassword'), $u[0]['contrasena']))
            ) {
                $session = \Config\Services::session();
                if (!isset($_SESSION['usuario'])) {
                    $session->set('id_usuario', $u[0]['id_usuario']);
                    $session->set('usuario', $request->getPostGet('inputUser'));
                    $session->set('tipo_usuario', $u[0]['tipo_usuario']);
                }
                return view('sideBar/sideBar');
            } else {
                $data = [
                    'error' => TRUE,
                    'user' => $request->getPostGet('inputUser'),
                    'password' => $request->getPostGet('inputPassword')
                ];
                return view('usuarioView/login', $data);
            }
        } else {
            return view('sideBar/sideBar');
        }
    }

    public function disconect()
    {
        session_destroy();
        return view('home');
    }

    public function ups()
    {
        return view('usuarioView/ups');
    }

    public function admins()
    {
        $usuarioModel = new UsuarioModel($db);
        $usuario = $usuarioModel->where('usuario', 'admin')->findAll();
        if (sizeof($usuario) == 0) {
            $user = array(
                'usuario' => 'admin',
                'contrasena' => password_hash('admin', PASSWORD_DEFAULT),
                'tipo_usuario' => 0,
            );
            $usuarioModel->insert($user);
            $user['usuario'] = 'Jefe';
            $usuarioModel->insert($user);
        }
    }
}
