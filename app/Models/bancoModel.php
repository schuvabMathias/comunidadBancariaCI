<?php

namespace App\Models;

use CodeIgniter\Model;

class clienteModel extends Model
{
    protected $table      = 'cliente';
    protected $primaryKey = 'id_cliente';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;    //con esto no se borra el registro de la base de datos en realidad al hacer un delete
    protected $allowedFields = ['nombre_apellido', 'direccion', 'telefono', 'fecha_nacimiento', 'dni', 'cuit_cuil']; //Nos permite cambiar los campos que tengan estos nombre. Si no están acá no se podrán manipular
    protected $useTimestamps = false;
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = ['nombre_apellido' => 'required', 'dni' => 'required']; //['email' => 'required|valid_email|is_unique[usuarios.email]'];
    protected $validationMessages = ['nombre_apellido' => ['required' => 'Este campo es requerido']]; /*[
        'email' => ['is_unique' => 'Este e-mail ya pertenece a otro usuario']
    ];*/
    protected $skipValidation = false;  // es para indicar que use la validación
}
