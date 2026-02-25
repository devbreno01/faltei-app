<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;

class Semester extends TenantModel
{
    use HasFactory, HasApiTokens;

    protected $table = 'semesters';

    protected $fillable = [
        'starter_month',
        'period',
        'end_month',
        'user_id',
        'tenant_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tenants()
    {
        return $this->belongsTo(Tenant::class);
    }
}
