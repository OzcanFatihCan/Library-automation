<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model 
{
    use HasFactory;

    protected $table="books";
    protected $primaryKey="id";
    protected $fillable=[
        "kitap_adi",
        "kategori_id",
        "image"
    ];

    public function writer_book(){
        return $this->hasMany(WriterBook::class,"kitap_id","id");
    }

    // ara tablo için coka cok ilişki
    public function aratablo(){
        return $this->belongsToMany(Writer::class, 'writer_books', 'kitap_id', 'yazar_id');
    }
  

}
