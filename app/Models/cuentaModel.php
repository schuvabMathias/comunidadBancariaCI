<?php

namespace App\Models;

use CodeIgniter\Model;

class cuentaModel extends Model
{
    protected $table      = 'cuenta';
    protected $primaryKey = 'id_cuenta';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;    //con esto no se borra el registro de la base de datos en realidad al hacer un delete
    protected $allowedFields = ['numero', 'tipo_cuenta', 'fecha_start', 'tipo_moneda', 'monto']; //Nos permite cambiar los campos que tengan estos nombre. Si no están acá no se podrán manipular
    protected $useTimestamps = false;
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = ['numero' => 'required']; //['email' => 'required|valid_email|is_unique[usuarios.email]'];
    protected $validationMessages = ['numero' => ['required' => 'Este campo es requerido']]; /*[
        'email' => ['is_unique' => 'Este e-mail ya pertenece a otro usuario']
    ];*/
    protected $skipValidation = false;  // es para indicar que use la validación
}
