<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveVideoMaster extends Model
{
    protected $table = 'live_video_master';
    protected $primaryKey = 'live_video_id';

    protected $fillable = [
        'video_link',
        'iStatus',
        'isDelete',
        'created_at',
        'updated_at'
    ];
}
