<?php

namespace App\Models;

use CodeIgniter\Model;

class PengurusModel extends Model
{
    protected $table = 'pengurus';
    protected $primaryKey = 'id_pengurus';
    protected $allowedFields = [
        'nama',
        'nama_panggilan',
        'nim',
        'foto',
        'divisi',
        'posisi',
        'ig_link',
        'github_link',
        'linkedin_link'
    ];

    public function countTotalPengurus()
    {
        return $this->countAll();
    }
    public function getAllPengurus()
    {
        return $this->findAll();
    }
    public function getPengurusById($id)
    {
        return $this->where('id_Pengurus', $id)->first();
    }
    public function editPengurus($id, array $data)
    {
        return $this->update($id, $data);
    }
    public function deletePengurus($id)
    {
        return $this->delete($id);
    }
}
