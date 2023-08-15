<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data   = Staff::all();
        $skill = Skill::all();
        return view('admin.pages.staff.index',[
            'type'   => 'add',
            'skill'  =>  $skill,
            'data'   =>  $data
        ] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $this -> validate($request, [
            'name'           => 'required',
            'stack'          => 'required',
            'gender'         => 'required',
            'profile'        => 'required'

          ]);


          // img manage 
        //   if($request -> hasFile('photo')){

        //     $img =$request -> photo;
        //     $file_name =time().'.'. $img->getClientOriginalExtension();
     
        //     $request -> photo -> move('img/staff', $file_name);


        // }
        

           // image manegement
           if($request -> hasFile('photo')){

            $img =$request -> file('photo');
            $file_name = md5(time().rand()).'.'. $img -> clientExtension();

            $image = Image::make($img -> getRealPath());
            $image -> save (storage_path('app/public/staff/'. $file_name));

        }

           // data send


          Staff::create([
            'name'           => $request -> name,
            'stack'          => $request -> stack,
            'profile'        => $request -> profile,
            'gender'         => $request -> gender,
            'photo'          => $file_name,
            'skills'         => json_encode($request -> skills),
        ]); 


        return back() -> with('success', 'Data added Successfully');
         
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $staff =Staff::findOrFail($id);
        $data   = Staff::all();
        $skill = Skill::all();
        return view('admin.pages.staff.index',[
            'type'   => 'edit',
            'skill'  =>  $skill,
            'data'   =>  $data,
            'staff'  =>  $staff
        ] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $staffupdate =Staff::findOrFail($id);
        $this -> validate($request, [
            'name'           => 'required',
            'stack'          => 'required',
            'gender'         => 'required',
            'profile'        => 'required'

          ]);

           // image manegement
           if($request -> hasFile('photo')){

            $img =$request -> file('photo');
            $file_name = md5(time().rand()).'.'. $img -> clientExtension();

            $image = Image::make($img -> getRealPath());
            $image -> save (storage_path('app/public/staff/'. $file_name));

        }

           // data send


    $staffupdate -> update([
            'name'           => $request -> name,
            'stack'          => $request -> stack,
            'profile'        => $request -> profile,
            'gender'         => $request -> gender,
            'photo'          => $file_name,
            'skills'         => json_encode($request -> skills),
        ]); 


        return redirect()->back() -> with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = Staff::findOrfail($id);

        $deleteData -> delete();

        return redirect()->back() -> with('success', 'Data Deleted Successfuly');
    }
}
