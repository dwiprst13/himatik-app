<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';
    protected $allowedFields = [
        'img',
        'judul',
        'content',
        'tag',
        'author',
        'date',
        'edited',
        'edited_by',
        'status'
    ];

    public function countTotalArtikel()
    {
        return $this->countAll();
    }
    public function getAllArtikel()
    {
        return $this->findAll();
    }
    public function getArtikelById($id)
    {
        return $this->where('id_artikel', $id)->first();
    }
    public function editArtikel($id, array $data)
    {
        return $this->update($id, $data);
    }
    public function deleteArtikel($id)
    {
        return $this->delete($id);
    }
}
