<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userclass extends Model
{
    use HasFactory;

    protected $table = 'tbl_userclasses';
    protected $primaryKey = 'id_userclass';

    protected $fillable = [
        'id_booking',
        'id_class',
        'start_date',
        'end_date',
        'status',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'id_class');
    }
}
