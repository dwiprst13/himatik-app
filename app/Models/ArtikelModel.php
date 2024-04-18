<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    /**
     * Menghitung total admin yang terdaftar.
     *
     * @return int Jumlah total artikel
     */
    public function countTotalArtikel()
    {
        return $this->countAll();
    }
}