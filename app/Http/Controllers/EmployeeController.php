<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Employee;
use App\User;
use DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $employees = Employee::all();
      return view('admin/employee.employees', compact('employees'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/employee.addEmployee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate(request(),[
            'fullName'=>'required',
            'position'=>'required',
            'dob'=>'required',
            'profileImage' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
        ]);
        if($image = $request->file('profileImage')){
          $new_name =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages"), $new_name);
        }
        else {
          $new_name = 'about.png';
        }

        if($image = $request->file('tazkira')){
          $new_name2 =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages"), $new_name2);
        }
        else {
          $new_name2 = 'about.png';
        }

        if($image = $request->file('warranty')){
          $new_name3 =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages"), $new_name3);
        }
        else {
          $new_name3 = 'about.png';
        }
          Employee::create([
              'fullName' => request('fullName'),
              'position' => request('position'),
              'salary' => request('salary'),
              'dob' => request('dob'),
              'phone' => request('phone'),
              'email' => request('email'),
              'province1' => request('province1'),
              'district1' => request('district1'),
              'region1' => request('region1'),
              'province2' => request('province2'),
              'district2' => request('district2'),
              'region2' => request('region2'),
              'profileImage' => $new_name,
              'tazkira' => $new_name2,
              'warranty' => $new_name3,
              'created_at'=>carbon::now(),
              'updated_at'=>carbon::now(),

            ]);
            try {
            session()->flash('success', 'عملیات موافقانه اجرا شد ');
            return back();
            } catch(Exception $ex) {
            session()->flash('failed', 'خطا! دوباره کوشش کنید');
            return back();
          }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin/employee.editEmployee',compact('employee',$employee));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //Validate
        $request->validate([
            'fullName' => 'required',
            'position' => 'required',
            'salary' => 'required',
        ]);

        $employee->fullName = $request->fullName;
        $employee->position = $request->position;
        $employee->salary = $request->salary;
        $employee->dob = $request->dob;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->province1 = $request->province1;
        $employee->district1 = $request->district1;
        $employee->region1 = $request->region1;
        $employee->province2 = $request->province2;
        $employee->district2 = $request->district2;
        $employee->region2 = $request->region2;
        $employee->profileImage = $request->profileImage;
        $employee->tazkira = $request->tazkira;
        $employee->warranty = $request->warranty;
        $employee->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Employee $employee)
    {
        $employee->delete();
        return redirect('/employees');
    }
}
