<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimetableMaster extends Model
{
    protected $table = 'timetable_master';
    protected $primaryKey = 'id';

    protected $fillable = [
        'image',
        'iStatus',
        'isDelete',
        'created_at',
        'updated_at'
    ];
}
