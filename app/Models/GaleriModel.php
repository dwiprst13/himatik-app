<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';
    protected $allowedFields = [
        'img',
        'judul',
        'deskripsi',
    ];

    public function countTotalGaleri()
    {
        return $this->countAll();
    }
    public function getAllGaleri()
    {
        return $this->findAll();
    }
    public function getGaleriById($id)
    {
        return $this->where('id_galeri', $id)->first();
    }
    public function editGaleri($id, array $data)
    {
        return $this->update($id, $data);
    }
    public function deleteGaleri($id)
    {
        return $this->delete($id);
    }
}
