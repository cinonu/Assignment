<?php

namespace App\Http\Controllers;

use App\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


use Faker\Provider\Image;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employee::all();
  
        return view('employees.index',compact('employees'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('employees.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $cover = $request->file('picture');
    $extension = $cover->getClientOriginalExtension();
    Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        
    $employees  = new employee ;
    $employees->firstname = $request->firstname;
    $employees->lastname = $request->lastname;
    $employees->email= $request->email;
    $employees->phonenumber = $request->phonenumber;
    $employees->city = $request->city;
    $employees->gender = $request->gender;
    $employees->status = $request->status;
    $employees->picture = $cover->getFilename().'.'.$extension;
    $employees->save();
    
       

    
   
        return redirect()->route('employees.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
          $employee->update($request->all());
    // $cover = $request->file('picture');
    // $extension = $cover->getClientOriginalExtension();
    // Storage::disk('public')->put($cover->getFilename().'.'.$extension, 
    //  File::get($cover));
   
    // $employee =employee;
    // $employee->firstname = $request->firstname;
    // $employee->lastname = $request->lastname;
    // $employee->email= $request->email;
    // $employee->phonenumber = $request->phonenumber;
    // $employee->city = $request->city;
    // $employee->gender = $request->gender;
    // $employee->status = $request->status;
    // $employee->picture = $cover->getFilename().'.'.$extension;
    // $employee->save();
  
  
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
         $employee->delete();
        return redirect()->route('employees.index');
    }
}
