<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    // public function index()
    // {
      
    //     return Inertia::render('studentlogin');
    // }

    // public function store(Request $request)
    // {
        
    //     $validatedData = $request->validate([
           
    //         'student_name' => 'required|string|max:255',
    //         'Roll_no' => 'required|integer',
    //     ]);
        
    //     $student = new Student();
    //     $student->student_name = $validatedData['student_name'];
    //     $student->Roll_no = $validatedData['Roll_no'];
    //     $student->save();

    //     return response()->json(['message' => 'Student data saved successfully'], 201);
    // }
    // public function show(Request $request)
    // {

    //         // Validate the incoming request
    //         $request->validate([
    //             'student_name' => 'required|string|max:255',
    //             'Roll_no' => 'required|integer',
    //         ]);
    
    //         // Attempt to find the student by name and roll number
    //         $student = Student::where('student_name', $request->student_name)
    //                           ->where('Roll_no', $request->Roll_no)
    //                           ->first();
    
    //         // If student exists, return success response
    //         if ($student) {
    //             return response()->json([
    //                 'message' => 'Login successfully',
    //             ], 200);
    //         }
    
    //         // If student does not exist, return error response
    //         return response()->json([
    //             'message' => 'Incorrect login information',
    //         ], 401);
    //   

    function show()
    {
        return Inertia::render('DragDropComponent');
    }
    }

