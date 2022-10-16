<?php

namespace App\Models;

use CodeIgniter\Model;

class ususariosModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id_usuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;    //con esto no se borra el registro de la base de datos en realidad al hacer un delete
    protected $allowedFields = [
        'usuario',
        'tipo_cuenta',
        'contrasena',

    ]; //Nos permite cambiar los campos que tengan estos nombre. Si no están acá no se podrán manipular
    protected $useTimestamps = false;
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [
        'usuario' => 'required',
        'contrasena' => 'required'
    ]; //['email' => 'required|valid_email|is_unique[usuarios.email]'];
    protected $validationMessages = [
        'usuario' => ['required' => 'El campo usuario es requerido'],
        'contrasena' => ['required' => 'El campo contrasena es requerido']
    ]; /*[
        'email' => ['is_unique' => 'Este e-mail ya pertenece a otro usuario']
    ];*/
    protected $skipValidation = false;  // es para indicar que use la validación
}
