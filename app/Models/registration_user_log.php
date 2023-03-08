<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class registration_user_log extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'property_id',
        'user_id',
        'in_admin',
        'out_admin'
    ];
    public function emp()
    {
        return $this->hasOne(employee::class, 'id', 'user_id')->withTrashed();
    }
    public function admin_out()
    {
        return $this->hasOne(User::class, 'id', 'out_admin');
    }
    public function admin_in()
    {
        return $this->hasOne(User::class, 'id', 'in_admin');
    }
}
