<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class registration extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'property_code',
        'serial_number',
        'brand',
        'type',
        'spec',
        'color',
        'refer',
        'user_id'
    ];

    public function employee()
    {
        return $this->hasOne(employee::class, 'id', 'user_id');
    }

    public function property_key()
    {
        return $this->hasOne(property_key::class, 'id', 'property_id');
    }
    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'admin_id');
    }
    public function unregis()
    {
        return $this->hasOne(unregistration::class, 'registration_id', 'id');
    }
    public function regislog()
    {
        return $this->hasOne(registration_user_log::class, 'registration_id', 'id');
    }
}
