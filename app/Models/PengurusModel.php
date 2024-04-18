<?php

namespace App\Models;

use CodeIgniter\Model;

class PengurusModel extends Model
{
    protected $table = 'pengurus';
    /**
     * Menghitung total admin yang terdaftar.
     *
     * @return int Jumlah total admin.
     */
    public function countTotalPengurus()
    {
        return $this->countAll();
    }
}
