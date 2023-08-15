<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $this -> validate($request, [
            'name'         => 'required',
            'cell'         => 'required',
            'email'        => 'required',

          ]);

               // photo manegement
               $file_name = '';

               if($request -> hasFile('photo')){

                $img =$request -> photo;
                $file_name =time().'.'. $img->getClientOriginalExtension();
         
                $img -> move(storage_path('app/public/students/'), $file_name);
    
            }

             Student::create([

                'email'          => $request -> email,
                'name'        => $request -> name,
                'cell'           => $request -> cell,
                'photo'          => $file_name,
        
              ]);

              return true;

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

     /**
     * show fontpage
     */

    public function showStudentPage()
    {
       $data = Student::all();
        $i = 1;
       $student_data = '';
       foreach($data as $student){
            $student_data .= "<tr>";
            $student_data .= "<td>{$i}</td>";
            $student_data .= "<td>{$student ->name}</td>";
            $student_data .= "<td>{$student ->email}</td>";
            $student_data .= "<td>{$student ->cell}</td>";
            $student_data .= "<td><img src='".asset('storage/students/'. $student ->photo). "'></td>";
            $student_data .= '<td>
                                
                                <a id="edit_student" eid_id="'. $student->id .'" class="btn btn-sm btn-warning" href="#">Edit</a>
                                <a id="del_id" del_id="'. $student->id .'" class="btn btn-sm btn-danger" href="#">Delete</a>
                             </td>';
            $student_data .= "</tr>";
            $i++;
       }
     

       return $student_data; 
    }


    // delete student data

    public function delStudent($id)
    {
       $delete_data = Student::find($id);

       $delete_data-> delete();
    }



}

