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
        $session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'user' => "",
            'password' => ""
        ];
        return  view('components\header') . view('components\navbar') . view("usuarioView/login", $data);
    }

    public function connect()
    {
        $userModel = new UsuarioModel($db);
        $request = \Config\Services::request();
        if (!isset($_SESSION['usuario'])) {
            if (($u = $userModel->where('usuario', $request->getPostGet('inputUser'))->findAll()) &&
                ($u[0]['contrasena'] == $request->getPostGet('inputPassword'))
            ) {
                $session = \Config\Services::session();
                if (!isset($_SESSION['usuario'])) {
                    $session->set('usuario', $request->getPostGet('inputUser'));
                    $session->set('tipo_usuario', $u[0]['tipo_usuario']);
                }
                return view('components/header') . view('components/navbar') . view('home');
            } else {
                $data = [
                    'error' => TRUE,
                    'user' => $request->getPostGet('inputUser'),
                    'password' => $request->getPostGet('inputPassword')
                ];
                return view('components/header') . view('components/navbar') . view('usuarioView/login', $data);
            }
        } else {
            return view('components/header') . view('components/navbar') . view('home');
        }
    }

    public function disconect()
    {
        session_destroy();
        return view('components/header') . view('components/navbar') . view('home');
    }
}
