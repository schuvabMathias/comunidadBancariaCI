<?php

namespace App\Controllers;

use Config\Services;
use App\Models\usuarioModel;

class UsuarioController extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        helper('form');
        $session = Services::session();
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
            return view('sideBar/sideBar.php');
        }
    }

    public function connect()
    {
        $userModel = new UsuarioModel($db);
        $request = Services::request();
        if (!isset($_SESSION['usuario'])) {
            if (($u = $userModel->where('usuario', $request->getPostGet('inputUser'))->findAll()) &&
                ($u[0]['contrasena'] == $request->getPostGet('inputPassword'))
            ) {
                $session = \Config\Services::session();
                if (!isset($_SESSION['usuario'])) {
                    $session->set('id_usuario', $u[0]['id_usuario']);
                    $session->set('usuario', $request->getPostGet('inputUser'));
                    $session->set('tipo_usuario', $u[0]['tipo_usuario']);
                }
                return view('sideBar/sideBar.php');
            } else {
                $data = [
                    'error' => TRUE,
                    'user' => $request->getPostGet('inputUser'),
                    'password' => $request->getPostGet('inputPassword')
                ];
                return view('usuarioView/login', $data);
            }
        } else {
            return view('sideBar/sideBar.php');
        }
    }

    public function disconect()
    {
        session_destroy();
        return view('home');
    }
}
