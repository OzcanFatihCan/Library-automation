<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WriterBook extends Model
{
    use HasFactory;

    protected $table="writer_books";
    protected $primaryKey="id";

    
}
