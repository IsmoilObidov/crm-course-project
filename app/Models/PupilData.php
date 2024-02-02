<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PupilData extends Model
{
    use HasFactory;
    protected $table = 'pupil_data';
    public $timestamps = false;
    protected $guarded = [];

    function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
