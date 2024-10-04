<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public function video_categories(){
        return $this->belongsTo(VideoCategory::class, 'video_category_id','id');
    }
}
