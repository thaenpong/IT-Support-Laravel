<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class request_repair extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'emp_id',
        'regis_id',
        'emp_behave',
        'admin_id',
        'admin_date',
        'st_be',
        'st_af',
        'admin_behave'
    ];
    public function employee()
    {
        return $this->hasOne(employee::class, 'id', 'emp_id');
    }
    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'admin_id');
    }
    public function regis()
    {
        return $this->hasOne(registration::class, 'id', 'regis_Id');
    }
}
