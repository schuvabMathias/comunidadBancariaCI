<?php

namespace App\Models;

use CodeIgniter\Model;

class clienteModel extends Model
{
    protected $table              = 'cliente';
    protected $primaryKey         = 'id_cliente';
    protected $useAutoIncrement   = true;
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;    //con esto no se borra el registro de la base de datos en realidad al hacer un delete
    protected $allowedFields      = [
        'nombre_apellido',
        'direccion',
        'telefono',
        'fecha_nacimiento',
        'dni',
        'cuit_cuil',
        'id_usuario'
    ]; //Nos permite cambiar los campos que tengan estos nombre. Si no están acá no se podrán manipular
    protected $useTimestamps      = false;
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';
    protected $validationRules    = [
        'nombre_apellido' => 'required',
        'direccion' => 'required',
        'fecha_nacimiento' => 'required',
        'dni' => 'required',
        'cuit_cuil' => 'required'
    ]; //['email' => 'required|valid_email|is_unique[usuarios.email]'];
    protected $validationMessages = [
        'nombre_apellido' => ['required' => 'El campo nombre es requerido'],
        'direccion' => ['required' => 'El campo direccion es requerido'],
        'fecha_nacimiento' => ['required' => 'El campo fecha de nacimiento es requerido'],
        'dni' => ['required' => 'El campo dni es requerido'],
        'cuit_cuil' => ['required' => 'El campo CUIT/CUIL es requerido'],
    ]; /*[
        'email' => ['is_unique' => 'Este e-mail ya pertenece a otro usuario']
    ];*/
    protected $skipValidation = false;  // es para indicar que use la validación
}
