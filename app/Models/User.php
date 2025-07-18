<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'employee_id',
        'name',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

     protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["Operator", "Supervisor", "Admin"][$value],
        );
    }
}
