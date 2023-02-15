<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class department extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name'
    ];

    public function employee()
    {
        return $this->hasOne(employee::class, 'id', 'department_id');
    }
}
