<?php

namespace App\Models;

use CodeIgniter\Model;

class KondanganModel extends Model
{
    protected $table = 'kondangan';
    protected $allowedFields = ['id', 'nama', 'nominal', 'alamat', 'status', 'tanggal', 'id_user', 'created_at'];
}
