<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Products extends Entity
{
    protected $nama;
    protected $harga;
    protected $stok;
    protected $berat;
    protected $created_date;
    protected $created_by;
    protected $updated_by;
    protected $updated_date;

    // Getter dan setter untuk setiap properti jika diperlukan

    public function getNama()
    {
        return $this->attributes['nama'];
    }

    public function getHarga()
    {
        return $this->attributes['harga'];
    }

    public function getStok()
    {
        return $this->attributes['stok'];
    }

    public function getBerat()
    {
        return $this->attributes['berat'];
    }

    public function getCreatedDate()
    {
        return $this->attributes['created_date'];
    }
    public function getCreatedBy()
    {
        return $this->attributes['created_by'];
    }
    public function getUpdatedDate()
    {
        return $this->attributes['updated_date'];
    }
    public function getUpdatedBy()
    {
        return $this->attributes['updated_by'];
    }
}