<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id']; // value id yang ngisi sistem, semua selain id boleh kita isi

    public function sampah()
    {
        return $this->hasMany(Sampah::class);
    }
}
