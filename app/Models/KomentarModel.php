<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = "komentar";
    protected $primaryKey = "id_komentar";
    protected $allowedFields = ["id_komentar", "id_artikel", "id_user", "komentar", "date_posted", "parent_comment_id", "status"];

    public function countTotalKomentar()
    {
        return $this->countAll();
    }
    public function getAllKomentar()
    {
        return $this->findAll();
    }
    public function getKomentarByIdArtikel($id_artikel)
    {
        return $this->where('id_artikel', $id_artikel)->orderBy('date_posted', 'DESC')->findAll();
    }
}
