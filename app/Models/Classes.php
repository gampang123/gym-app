<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trainer;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'tbl_classes';
    protected $primaryKey = 'id_class';
    protected $fillable = [
        'id_trainers',
        'class_name',
        'picture',
        'description',
        'day',
        'start_time',
        'end_time',
    ];

    public $timestamps = false;

    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'id_trainers');
    }
}
