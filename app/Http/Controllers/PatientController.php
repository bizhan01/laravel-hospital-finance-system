<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Patient;
use App\Doctor;
use App\Section;
use DB;


class PatientController extends Controller
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
      $doctors = Doctor::get();
      $sections = Section::get();

      $patients = DB::table('patients')->whereDay('created_at', Carbon::today())->latest()->get();

      return view('reception.patient.addPatient', compact('doctors', 'sections','patients'));
    }


    public function patients()
    {

      $patients = Patient::latest();

      if($month =request('month')){
        $patients->whereMonth('created_at', Carbon::parse($month)->month);
      }

      if($year=request('year')){
        $patients->whereYear('created_at', $year);
      }
      $patients = $patients->get();

      $archives= Patient::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
      ->groupBy('year','month')
      ->orderByRaw('min(created_at)desc')
      ->get()
      ->ToArray();

      return view('admin.revenue.patientList', compact( 'patients','archives'));
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
        'patientName'=>'nullable',
        'OPD'=>'nullable',
        'docName'=>'nullable',
        'fee'=>'nullable',
        'total'=>'required', 'max:255',

    ]);
      Patient::create([
          'user_id' => Auth::user()->id,
          'patientName' => request('patientName'),
          'OPD' => request('OPD'),
          'docName' => request('docName'),
          'fee' => request('fee'),
          'perscription' => request('perscription'),
          'retail' => request('retail'),
          'emergency' => request('emergency'),
          'lab' => request('lab'),
          'xray' => request('xray'),
          'US' => request('US'),
          'dental' => request('dental'),
          'physicalTherapy' => request('physicalTherapy'),
          'echo' => request('echo'),
          'doblar' => request('doblar'),
          'pft' => request('pft'),
          'endoscopy' => request('endoscopy'),
          'ambulance' => request('ambulance'),
          'bed' => request('bed'),
          'other' => request('other'),
          'total' => request('total'),
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
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Revenue $product)
    {
        return view('registrar/details',compact('product'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $sections = Section::get();
        return view('reception.patient.editPatient',compact('patient',$patient, 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //Validate
        $request->validate([
          'patientName'=>'nullable',
          'OPD'=>'nullable',
          'docName'=>'nullable',
          'fee'=>'nullable',
        ]);

        $patient->patientName = $request->patientName;
        $patient->OPD = $request->OPD;
        $patient->docName = $request->docName;
        $patient->fee = $request->fee;
        $patient->perscription = $request->perscription;
        $patient->retail = $request->retail;
        $patient->emergency = $request->emergency;
        $patient->lab = $request->lab;
        $patient->xray = $request->xray;
        $patient->US = $request->US;
        $patient->dental = $request->dental;
        $patient->physicalTherapy = $request->physicalTherapy;
        $patient->echo = $request->echo;
        $patient->doblar = $request->doblar;
        $patient->pft = $request->pft;
        $patient->endoscopy = $request->endoscopy;
        $patient->ambulance = $request->ambulance;
        $patient->bed = $request->bed;
        $patient->other = $request->other;
        $patient->total = $request->total;
        $patient->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/patient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Patient $patient)
    {
        $patient->delete();
        // $patient->session()->flash('message', 'Successfully deleted the task!');
        return redirect('/patient');
    }
}
