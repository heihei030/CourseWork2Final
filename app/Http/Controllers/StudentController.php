<?php

namespace App\Http\Controllers;

use App/Student

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('dashboard', ['students' => $students]);
    }
}
