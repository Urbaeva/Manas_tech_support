<?php

namespace App\Models;

use App\Traits\HasMultilingualTitle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory, HasMultilingualTitle;

    protected $table = 'departments';

    protected $guarded = false;

    public function categories()
    {
        return $this->hasMany(Category::class, 'department_id', 'id');
    }
}
