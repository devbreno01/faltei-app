<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';

    protected $fillable = [
        'starter_month',
        'period',
        'end_month',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
