<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Student;
use DB;


class StudentController extends Controller
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
      $students= Student::latest();

      if($month =request('month')){
        $students->whereMonth('created_at', Carbon::parse($month)->month);
      }

      if($year=request('year')){
        $students->whereYear('created_at', $year);
      }
      $students = $students->get();

      $archives= Student::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
      ->groupBy('year','month')
      ->orderByRaw('min(created_at)desc')
      ->get()
      ->ToArray();

      return view('admin.students.student', compact('students', 'archives'));
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
        'stdName'=>'required',
        'schoolName'=>'required',
        'department'=>'required',
        'shift'=>'required',
        'fee'=>'nullable',

    ]);
      Student::create([
          'stdName' => request('stdName'),
          'schoolName' => request('schoolName'),
          'department' => request('department'),
          'shift' => request('shift'),
          'fee' => request('fee'),
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
    public function edit(Student $student)
    {
        return view('admin.students.editStudent',compact('student',$student));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //Validate
        $request->validate([
          'stdName'=>'required',
          'schoolName'=>'required',
          'department'=>'required',
          'shift'=>'required',
          'fee'=>'nullable',
        ]);

        $student->stdName = $request->stdName;
        $student->schoolName = $request->schoolName;
        $student->department = $request->department;
        $student->shift = $request->shift;
        $student->fee = $request->fee;
        $student->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Student $student)
    {
        $student->delete();
        return redirect('/student');
    }
}
