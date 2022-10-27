<?php

namespace App\Models;

use CodeIgniter\Model;

class usuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id_usuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;    //con esto no se borra el registro de la base de datos en realidad al hacer un delete
    protected $allowedFields = [
        'usuario',
        'tipo_usuario',
        'contrasena',
    ]; //Nos permite cambiar los campos que tengan estos nombre. Si no están acá no se podrán manipular
    protected $useTimestamps = false;
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [
        'usuario' => 'required|is_unique[usuarios.contrasena,id_usuario,{id_usuario}]',
        'contrasena' => 'required|is_unique[usuarios.contrasena,id_usuario,{id_usuario}]'
    ];
    protected $validationMessages = [
        'usuario' => ['required' => 'El campo usuario es requerido'],
        'contrasena' => ['required' => 'El campo contraseña es requerido']
    ];
    protected $skipValidation = false;  // es para indicar que use la validación
}
