<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'department_id',
    ];

    public function department()
    {
        return $this->hasOne(department::class, 'id', 'department_id');
    }

    public function registration()
    {
        return $this->hasOne(registration::class, 'user_id', 'id');
    }
}
