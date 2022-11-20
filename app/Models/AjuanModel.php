<?php

namespace App\Models;

use CodeIgniter\Model;

class AjuanModel extends Model
{
    protected $table      = 'pengajuan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['iduser', 'nama', 'email', 'jenisKelamin', 'tglLahir', 'role', 'status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
