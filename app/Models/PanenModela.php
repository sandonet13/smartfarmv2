<?php

namespace App\Models;

use CodeIgniter\Model;

class PanenModela extends Model
{
    protected $table = "panen_a";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'tanggal', 'umur', 'no_do', 'penerima', 'no_truk', 'nama_supir', 'jam_tangkap', 'jam_berangkat', 'tonase', 'ekor', 'lantai', 'sekat', 'bw_ekor_kg'];
}