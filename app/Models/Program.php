<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'tbl_programs';
    
    protected $primaryKey = 'id_program';

    protected $fillable = [
        'nama_program',
        'picture',
        'description',
        'price'
    ];

}
