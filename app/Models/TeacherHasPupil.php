<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherHasPupil extends Model
{
    use HasFactory;
    protected $table = 'teacher_has_pupil';
    public $timestamps = false;
    protected $guarded = [];

    function pupil()
    {
        return $this->hasOne(User::class, 'id', 'pupil_id');
    }
}
