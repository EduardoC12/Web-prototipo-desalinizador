<?php 
namespace App\Models;

use CodeIgniter\Model;

class Datos extends Model{
    protected $table      = 'temperatura';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['temp'];
}