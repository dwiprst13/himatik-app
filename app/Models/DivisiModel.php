<?php

namespace App\Models;

use CodeIgniter\Model;

class DivisiModel extends Model
{
    protected $table = 'divisi';
    protected $primaryKey = 'id_divisi';
    protected $allowedFields = [
        'proker'
    ];
    
    public function countTotalDivsi()
    {
        return $this->countAll();
    }
    public function getAllDivsi()
    {
        return $this->findAll();
    }
    public function getDivsiById($id)
    {
        return $this->where('id_Divsi', $id)->first();
    }
    public function editDivsi($id, array $data)
    {
        return $this->update($id, $data);
    }
    public function deleteDivsi($id)
    {
        return $this->delete($id);
    }
}
