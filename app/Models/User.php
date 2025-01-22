<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'userid';

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'gender',
        'dateofbirth',
        'password',
    ];

    public function memoirs()
    {
        return $this->hasMany(Memoir::class, 'userid', 'userid');
    }
}
