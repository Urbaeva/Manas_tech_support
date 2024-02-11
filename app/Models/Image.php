<?php

namespace App\Models;

use App\Traits\HasMultilingualTitle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    use HasMultilingualTitle;

    protected $table = 'images';

    protected $guarded = false;

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
