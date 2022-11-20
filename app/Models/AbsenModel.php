<?php
 
namespace App\Models;

use CodeIgniter\Model;

class AbsenModel extends Model
{
    protected $table      = 'absen';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['user_id', 'datang', 'pulang', 'date', 'latitude', 'longitude'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
