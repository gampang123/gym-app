<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $table = 'tbl_trainers';

    protected $primaryKey = 'id_trainers';

    protected $fillable = [
        'name',
        'category',
        'description',
        'picture',
        'gender',
        'age',
        'phone',
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class, 'id_trainers');
    }
}
