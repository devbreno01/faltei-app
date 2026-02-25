<?php
namespace App\Helpers; 

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

if (! function_exists('tenantId')) {
    function tenantId()
    {
        return Session::get('tenant_id');
    }
}

if (! function_exists('tenant')) {
    function tenant()
    {
        return Auth::user()?->tenant;
    }
}
