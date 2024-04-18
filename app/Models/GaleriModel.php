<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table = 'galeri';
    /**
     * Menghitung total admin yang terdaftar.
     *
     * @return int Jumlah total admin.
     */
    public function countTotalGaleri()
    {
        return $this->countAll();
    }
}
