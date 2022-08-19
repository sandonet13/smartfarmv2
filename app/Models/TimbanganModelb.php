<?php

namespace App\Models;

use CodeIgniter\Model;

class TimbanganModelb extends Model
{
    
    protected $table = "timbangan_harian_b";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'tanggal', 'umur', 'waktu', 'vaksin', 'sekat_1', 'sekat_2', 'sekat_3', 'sekat_4', 'sekat_5', 'bw', 'kenaikan_harian', 'masuk', 'pakai', 'sisa', 'lantai'];
}