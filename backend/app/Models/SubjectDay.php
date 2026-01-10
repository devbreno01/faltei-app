<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectDay extends Model
{
    use HasFactory;

    protected $table = 'subject_days';

    protected $fillable = [
        'day',
        'subject_id'
    ];

    public function subject(){
        return $this->belongsTo(Subject::class); 
    }
}
