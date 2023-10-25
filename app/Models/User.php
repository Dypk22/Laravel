<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'created_at',
        'password',        
    ];    

    protected $hidden = [
        'password',
        'email_verified',
        'updated_at'
    ];

    public function user_address()
    {
        return $this->hasOne('App\Models\userAddress', 'user_id', 'id');
    }
}
