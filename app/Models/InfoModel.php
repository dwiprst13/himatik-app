<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoModel extends Model
{
    protected $table = 'info';
    protected $primaryKey = 'id_info';
    protected $allowedFields = [
        'img',
        'detail'
    ];

    public function countTotalInfo()
    {
        return $this->countAll();
    }
    public function getAllInfo()
    {
        return $this->findAll();
    }
    public function getLatestInfo($limit = 4)
    {
        return $this->db->table('info')
        ->orderBy('id_info', 'DESC')
        ->limit($limit)
            ->get()
            ->getResult();
    }
    public function getInfoById($id)
    {
        return $this->where('id_Info', $id)->first();
    }
    public function editInfo($id, array $data)
    {
        return $this->update($id, $data);
    }
    public function deleteInfo($id)
    {
        return $this->delete($id);
    }
}
