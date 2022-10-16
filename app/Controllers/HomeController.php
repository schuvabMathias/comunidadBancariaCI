<?php

namespace App\Controllers;


class HomeController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $session = \Config\Services::session();
    }

    public function index()
    {
        return view('components/header') . view('components/navbar') . view('home');
    }
}
