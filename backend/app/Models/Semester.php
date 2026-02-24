<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;

class Semester extends Model
{
    use HasFactory, HasApiTokens;

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
