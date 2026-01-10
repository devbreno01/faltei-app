<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'name',
        'maximum_allowed_absence_percentage',
        'total_hours',
        'hours_per_class',
        'color',
        'semester_id'
    ];

    public function semester(){
        return $this->belongsTo(Semester::class);
    }

    public function subjectDays(){
        return $this->hasMany(SubjectDay::class);
    }
}
