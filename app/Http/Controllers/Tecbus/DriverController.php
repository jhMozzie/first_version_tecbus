<?php

namespace App\Http\Controllers\Tecbus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function DriverDashboard()
    {
        return view('conductor.conductor_dashboard');

    }
}
