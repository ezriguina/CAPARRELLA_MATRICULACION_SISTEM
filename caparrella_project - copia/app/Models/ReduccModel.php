<?php

namespace App\Models;

use CodeIgniter\Model;

class ReduccionModel extends Model
{
    protected $table            = 'reducciones';
    protected $primaryKey       = 'id_reduccion';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $useSoftDeletes   = true;

    protected $protectFields    = true;

    protected $allowedFields = [
        'nombre',
        'precio',
        'documento'
    ];
    
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}