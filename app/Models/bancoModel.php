<?php

namespace App\Models;

use CodeIgniter\Model;

class bancoteModel extends Model
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
        'nombre' => 'required',
        'direccion' => 'required',
        'numero_sucursal' => 'required'
    ]; //['email' => 'required|valid_email|is_unique[usuarios.email]'];
    protected $validationMessages = [
        'nombre' => ['required' => 'El campo nombre es requerido'],
        'direccion' => ['required' => 'El campo direccion es requerido'],
        'numero_sucursal' => ['required' => 'El campo numero de sucursal es requerido']
    ]; /*[
        'email' => ['is_unique' => 'Este e-mail ya pertenece a otro usuario']
    ];*/
    protected $skipValidation = false;  // es para indicar que use la validación
}
