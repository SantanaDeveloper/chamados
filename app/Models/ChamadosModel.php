<?php

namespace App\Models;

use CodeIgniter\Model;

class ChamadosModel extends Model
{
    protected $table = 'tickets';
    protected $primarykey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'id_user', 'title', 'description', 'created', 'status'];
}
