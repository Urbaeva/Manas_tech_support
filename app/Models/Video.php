<?php

namespace App\Models;

use App\Traits\HasMultilingualTitle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    use HasMultilingualTitle;

    protected $table = 'videos';

    protected $guarded = false;

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    function video_views()
    {
        return $this->hasMany(VideoView::class);
    }
}
