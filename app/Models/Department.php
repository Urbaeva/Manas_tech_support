<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $guarded = false;

    public function categories()
    {
        return $this->hasMany(Category::class, 'department_id', 'id');
    }
}
