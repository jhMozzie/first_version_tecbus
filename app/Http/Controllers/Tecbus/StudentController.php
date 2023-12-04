<?php

namespace App\Http\Controllers\Tecbus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function StudentDashboard()
    {
        return view('estudiante.estudiante_dashboard');

    }
}
