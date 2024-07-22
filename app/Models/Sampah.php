<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;
    protected $guarded = ['id']; // value id yang ngisi sistem, semua selain id boleh kita isi
    public function olahan()
    {
        return $this->hasMany(Olahan::class);  // untuk menghubungkan antara sampah dengan olahan (1 sampah bisa dimiliki banyak 1 olahan)
    }
}
