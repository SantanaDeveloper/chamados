<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'name', 'email', 'password', 'rank'];
}
