<?php

namespace App\Models;

use CodeIgniter\Model;

class cuentaModel extends Model
{
    protected $table             = 'cuenta';
    protected $primaryKey        = 'id_cuenta';
    protected $useAutoIncrement  = true;
    protected $returnType        = 'array';
    protected $useSoftDeletes    = false;    //con esto no se borra el registro de la base de datos en realidad al hacer un delete
    protected $allowedFields = [
        'numero',
        'tipo_cuenta',
        'fecha_start',
        'tipo_moneda',
        'monto',
        'id_titular',
        'id_banco'
    ]; //Nos permite cambiar los campos que tengan estos nombre. Si no están acá no se podrán manipular
    protected $useTimestamps = false;
    protected $updatedFiel   = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules = [
        'numero' => 'required|is_unique[cuenta.numero,id_cuenta,{id_cuenta}]',
        'tipo_cuenta' => 'required',
        'fecha_start' => 'required',
        'tipo_moneda' => 'required',
        'monto' => 'required',
        'id_titular' => 'required',
        'id_banco' => 'required'
    ]; //['email' => 'required|valid_email|is_unique[usuarios.email]'];
    protected $validationMessages = [
        'numero' => ['required' => 'El campo número es requerido', 'is_unique' => "El elemento ya existe"],
        'tipo_cuenta' => ['required' => 'El campo tipo de cuenta es requerido'],
        'fecha_start' => ['required' => 'El campo fecha de inicio es requerido'],
        'tipo_moneda' => ['required' => 'El campo tipo de moneda es requerido'],
        'monto' => ['required' => 'El campo monto es requerido'],
        'id_titular' => ['required' => 'El campo documento titular es requerido'],
        'id_banco' => ['required' => 'El campo ID banco es requerido']
    ]; /*[
        'email' => ['is_unique' => 'Este e-mail ya pertenece a otro usuario']
    ];*/
    protected $skipValidation = false;  // es para indicar que use la validación
}
