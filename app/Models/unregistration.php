<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unregistration extends Model
{
    use HasFactory;
    protected $fillable = [
        'registration_id',
        'user_id',
        'cause'
    ];

    public function registration()
    {
        return $this->hasOne(registration::class, 'id', 'registration_id')->withTrashed();
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
