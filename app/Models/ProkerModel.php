<?php

namespace App\Models;

use CodeIgniter\Model;

class ProkerModel extends Model
{
    protected $table = 'proker';
    protected $primaryKey = 'id_proker';
    protected $allowedFields = [
        'img',
        'judul',
        'deskripsi',
        'date',
        'divisi'
    ];

    public function countTotalProker()
    {
        return $this->countAll();
    }
    public function getAllProker()
    {
        return $this->findAll();
    }
    public function getLatestProker($limit = 10)
    {
        return $this->db->table('proker')
        ->orderBy('id_proker', 'DESC')
        ->limit($limit)
            ->get()
            ->getResult();
    }

    public function getProkerById($id)
    {
        return $this->where('id_proker', $id)->first();
    }
    public function editProker($id, array $data)
    {
        return $this->update($id, $data);
    }
    public function deleteProker($id)
    {
        return $this->delete($id);
    }
}
