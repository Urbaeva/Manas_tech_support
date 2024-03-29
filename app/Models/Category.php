<?php

namespace App\Models;

use App\Traits\HasMultilingualTitle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasMultilingualTitle;

    protected $table = 'categories';

    protected $guarded = false;

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
