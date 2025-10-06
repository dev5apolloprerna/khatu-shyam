<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album_master';
    protected $primaryKey = 'album_id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'iStatus', 'isDelete',
    ];

    // Scope: only not-deleted
    public function scopeAlive($q) {
        return $q->where('isDelete', 0);
    }
}
