<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\WriterBook;
class Writer extends Model
{
    use HasFactory;
    protected $table="writers";
    protected $primaryKey="id";
    protected $fillable=[
        "writer_name",
        "email",
        "phone"
    ];

    public function book_writer(){
        return $this->hasMany(WriterBook::class,"yazar_id","id");
    }
    
}
