<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'course_id',
        'role_id',
        'subject_id',
        'name',
        'email',
        'photo',
        'password',
        'number',
        'adress',
        'instagram',
        'telegram',
        'bill',
        'is_blocked'
    ];

    function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    function course()
    {
        return $this->hasOne(User::class, 'id', 'course_id');
    }

    function get_pupil()
    {
        return $this->hasOne(PupilData::class, 'user_id', 'id');
    }

    function get_admin()
    {
        return $this->hasOne(AdminData::class, 'user_id', 'id');
    }

    function get_course()
    {
        return $this->hasOne(self::class, 'id', 'course_id');
    }

    function get_groups()
    {
        return $this->hasMany(Groups::class, 'teacher_id', 'id');
    }
}
