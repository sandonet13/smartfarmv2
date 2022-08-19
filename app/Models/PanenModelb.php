<?php

namespace App\Models;

use CodeIgniter\Model;

class PanenModelb extends Model
{
    protected $table = "panen_b";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'tanggal', 'umur', 'no_do', 'penerima', 'no_truk', 'nama_supir', 'jam_tangkap', 'jam_berangkat', 'tonase', 'ekor', 'lantai', 'sekat', 'bw_ekor_kg'];
}