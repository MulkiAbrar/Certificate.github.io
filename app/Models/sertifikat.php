<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sertifikat extends Model
{
    use HasFactory;
    protected $fillable = ['id','nisn','nomor','image'];
    protected $table = 'sertifikat';
    public $timestamps = false;
}
