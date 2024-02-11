<?php

namespace App\Models;

use App\Traits\HasMultilingualTitle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    use HasMultilingualTitle;

    protected $table = 'files';

    protected $guarded = false;

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
