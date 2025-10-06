<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    protected $table = 'video_gallery';
    protected $primaryKey = 'video_Id';

    protected $fillable = [
        'video_link',
        'iStatus',
        'isDelete',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false; // Since your table handles timestamps manually
}
