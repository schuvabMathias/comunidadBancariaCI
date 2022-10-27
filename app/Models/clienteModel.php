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
        'nombre_apellido' => 'required|alpha_space',
        'direccion' => 'required',
        'telefono' => 'required',
        'fecha_nacimiento' => 'required',
        'dni' => 'required|is_unique[cliente.dni,id_cliente,{id_cliente}]',
        'cuit_cuil' => 'required|is_unique[cliente.cuit_cuil,id_cliente,{id_cliente}]',
        'id_usuario' => 'required'
    ];
    protected $validationMessages = [
        'nombre_apellido' => ['required' => 'El campo nombre y apellido es requerido', 'alpha_space' => "Solo debe ingresar letras"],
        'direccion' => ['required' => 'El campo dirección es requerido'],
        'telefono' => ['required' => 'El campo teléfono es requerido'],
        'fecha_nacimiento' => ['required' => 'El campo fecha de nacimiento es requerido'],
        'dni' => ['required' => 'El campo documento es requerido', 'is_unique' => "Ya existe otro cliente con este documento"],
        'cuit_cuil' => ['required' => 'El campo CUIT/CUIL es requerido', 'is_unique' => "Ya existe otro cliente con este CUIT/CUIL"],
    ];
    protected $skipValidation = false;  // es para indicar que use la validación
}
