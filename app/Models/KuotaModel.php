<?php

namespace App\Models;

use CodeIgniter\Model;

class KuotaModel extends Model
{
    protected $table      = 'seksi';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['d_distribusi', 'd_produksi', 'd_sosial', 'd_neraca'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
