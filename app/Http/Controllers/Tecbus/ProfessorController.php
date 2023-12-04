<?php

namespace App\Http\Controllers\Tecbus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function ProfessorDashboard()
    {
        return view('profesor.profesor_dashboard');

    }
}
