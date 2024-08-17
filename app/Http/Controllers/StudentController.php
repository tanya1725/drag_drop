<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    // public function index()
    // {
      
    //     return Inertia=>=>render('studentlogin');
    // }

    // public function store(Request $request)
    // {
        
    //     $validatedData = $request->validate([
           
    //         'student_name' => 'required|string|max=>255',
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
    //             'student_name' => 'required|string|max=>255',
    //             'Roll_no' => 'required|integer',
    //         ]);
    
    //         // Attempt to find the student by name and roll number
    //         $student = Student=>=>where('student_name', $request->student_name)
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
function index()
{
    return Inertia::render('DataGridJson');
}
    function getStudentList()
    {
        $students = [
            [
                "ID" => "1",
                "StudentName" => "John Doe",
                "Class" => "10A",
                "RollNo" => "1",
                "ClassTeacher" => "Mrs. Smith",
                "ArrivalTime" => "08:00 AM",
                "DepartureTime" => "03:00 PM",
                "AddmissionDate" => "01/09/2024"
            ],
          [
            "ID"=>"2",
            "StudentName"=> "Jane Smith",
            "Class"=> "10B",
            "RollNo"=> "2",
            "ClassTeacher"=> "Mr. Johnson",
            "ArrivalTime"=> "08:05 AM",
            "DepartureTime"=> "03:05 PM",
            "AddmissionDate"=> "25/08/2024"
          ],
          [
            "ID"=>"3",
            "StudentName"=> "Emily Brown",
            "Class"=> "10A",
            "RollNo"=> "3",
            "ClassTeacher"=> "Mrs. Smith",
            "ArrivalTime"=> "08:10 AM",
            "DepartureTime"=> "03:10 PM",
            "AddmissionDate"=> "20/08/2024"
          ],
          [
            "ID"=>"4",
            "StudentName"=> "Michael Green",
            "Class"=> "10C",
            "RollNo"=> "4",
            "ClassTeacher"=> "Ms. Clark",
            "ArrivalTime"=> "08:15 AM",
            "DepartureTime"=> "03:15 PM",
            "AddmissionDate"=> "15/08/2024"
          ],
          [
            "ID"=>"5",
            "StudentName"=> "Sophia Lee",
            "Class"=> "10B",
            "RollNo"=> "5",
            "ClassTeacher"=> "Mr. Johnson",
            "ArrivalTime"=> "08:20 AM",
            "DepartureTime"=> "03:20 PM",
            "AddmissionDate"=> "14/08/2024"
          ],
          [
            "ID"=>"6",
            "StudentName"=> "Daniel Carter",
            "Class"=> "10A",
            "RollNo"=> "6",
            "ClassTeacher"=> "Mrs. Smith",
            "ArrivalTime"=> "08:25 AM",
            "DepartureTime"=> "03:25 PM",
            "AddmissionDate"=> "10/08/2024"
          ],
          [
            "ID"=>"7",
            "StudentName"=> "Olivia Davis",
            "Class"=> "10C",
            "RollNo"=> "7",
            "ClassTeacher"=> "Ms. Clark",
            "ArrivalTime"=> "08:30 AM",
            "DepartureTime"=> "03:30 PM",
            "AddmissionDate"=> "29/07/2024"
          ],
          [
            "ID"=>"8",
            "StudentName"=> "Liam Wilson",
            "Class"=> "10B",
            "RollNo"=> "8",
            "ClassTeacher"=> "Mr. Johnson",
            "ArrivalTime"=> "08:35 AM",
            "DepartureTime"=> "03:35 PM",
            "AddmissionDate"=> "25/07/2024"
          ],
          [
            "ID"=>"9",
            "StudentName"=> "Mia Anderson",
            "Class"=> "10A",
            "RollNo"=> "9",
            "ClassTeacher"=> "Mrs. Smith",
            "ArrivalTime"=> "08:40 AM",
            "DepartureTime"=> "03:40 PM",
            "AddmissionDate"=> "15/07/2024"
          ],
          [
            "ID"=>"10",
            "StudentName"=> "Noah Taylor",
            "Class"=> "10C",
            "RollNo"=> "10",
            "ClassTeacher"=> "Ms. Clark",
            "ArrivalTime"=> "08:45 AM",
            "DepartureTime"=> "03:45 PM",
            "AddmissionDate"=> "12/07/2024"
          ],
          [
            "ID"=>"11",
            "StudentName"=> "Ava Martinez",
            "Class"=> "10B",
            "RollNo"=> "11",
            "ClassTeacher"=> "Mr. Johnson",
            "ArrivalTime"=> "08:50 AM",
            "DepartureTime"=> "03:50 PM",
            "AddmissionDate"=> "10/07/2024"
          ],
          [
            "ID"=>"12",
            "StudentName"=> "Ethan Thompson",
            "Class"=> "10A",
            "RollNo"=> "12",
            "ClassTeacher"=> "Mrs. Smith",
            "ArrivalTime"=> "08:55 AM",
            "DepartureTime"=> "03:55 PM",
            "AddmissionDate"=> "07/07/2024"
          ]
          ];
          return response()->json($students);
         // return response()->json($students);
         // return Inertia::render('DataGridJson', $students);
        
          }
    }

