<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarModel extends Model
{
    protected $table = 'gambar';
    protected $primaryKey = 'id_gambar';
    protected $allowedFields = [
        'id_gambar',
        'img',
        'nama'
    ];

    public function countTotalGambar()
    {
        return $this->countAll();
    }
    public function getAllGambar()
    {
        return $this->findAll();
    }
    public function getLatestGambar($limit = 4)
    {
        return $this->db->table('Gambar')
        ->orderBy('id_Gambar', 'DESC')
        ->limit($limit)
            ->get()
            ->getResult();
    }
    public function getGambarById($id)
    {
        return $this->where('id_Gambar', $id)->first();
    }
    public function editGambar($id, array $data)
    {
        return $this->update($id, $data);
    }
    public function deleteGambar($id)
    {
        return $this->delete($id);
    }
}
