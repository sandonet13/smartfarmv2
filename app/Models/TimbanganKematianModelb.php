<?php

namespace App\Models;

use CodeIgniter\Model;

class TimbanganKematianModelb extends Model
{
    
    protected $table = "kematian_b";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'tanggal', 'waktu', 'sekat_1', 'sekat_2', 'sekat_3', 'sekat_4', 'sekat_5', 'total', 'lantai'];
}