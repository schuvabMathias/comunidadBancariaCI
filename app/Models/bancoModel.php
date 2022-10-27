<?php

namespace App\Models;

use CodeIgniter\Model;

class bancoModel extends Model
{
    protected $table            = 'banco';
    protected $primaryKey       = 'id_banco';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;    //con esto no se borra el registro de la base de datos en realidad al hacer un delete
    protected $allowedFields    = [
        'nombre',
        'direccion',
        'numero_sucursal',
    ]; //Nos permite cambiar los campos que tengan estos nombre. Si no están acá no se podrán manipular
    protected $useTimestamps    = false;
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
    protected $validationRules  = [
        'nombre' => 'required|alpha_space',
        'direccion' => 'required',
        'numero_sucursal' => 'required|is_unique[banco.numero_sucursal,id_banco,{id_banco}]'
    ]; //['email' => 'required|valid_email|is_unique[usuarios.email]'];
    protected $validationMessages = [
        'nombre' => ['required' => 'El campo nombre es requerido', 'alpha_space' => "Solo debe ingresar letras"],
        'direccion' => ['required' => 'El campo dirección es requerido'],
        'numero_sucursal' => ['required' => 'El campo número de sucursal es requerido', 'is_unique' => 'Ya existe otro banco con este número']
    ]; /*[
        'email' => ['is_unique' => 'Este e-mail ya pertenece a otro usuario']
    ];*/
    protected $skipValidation = false;  // es para indicar que use la validación
}
