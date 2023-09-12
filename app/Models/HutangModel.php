<?php

namespace App\Models;

use CodeIgniter\Model;

class HutangModel extends Model
{
    protected $table = 'hutang';
    protected $allowedFields = ['id', 'nama', 'nominal', 'jenis', 'status', 'tanggal', 'id_user', 'created_at'];
}
