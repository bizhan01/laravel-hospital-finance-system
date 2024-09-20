<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Operation;
use DB;


class OperationController extends Controller
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

      $operations = DB::table('operations')->whereDay('created_at', Carbon::today())->get();

      return view('reception.patient.operation', compact('operations'));
    }

    public function operations()
    {
      $operations= Operation::latest();

      if($month =request('month')){
        $operations->whereMonth('created_at', Carbon::parse($month)->month);
      }

      if($year=request('year')){
        $operations->whereYear('created_at', $year);
      }
      $operations = $operations->get();

      $archives= Operation::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
      ->groupBy('year','month')
      ->orderByRaw('min(created_at)desc')
      ->get()
      ->ToArray();


      return view('admin.revenue.operations', compact('operations', 'archives'));
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
        'patientName'=>'required',
        'docName'=>'required',
        'operationType'=>'required', 'max:255',
        'fee'=>'required',
        'docPercentage'=>'required',
        'assistantPercentage'=>'nullable',
        'anesthesiaPercentage'=>'nullable',
        'midwifePercentage'=>'nullable',
        'total'=>'required', 'max:255',

    ]);
      Operation::create([
          'user_id' => Auth::user()->id,
          'patientName' => request('patientName'),
          'docName' => request('docName'),
          'operationType' => request('operationType'),
          'fee' => request('fee'),
          'docPercentage' => request('docPercentage'),
          'assistantPercentage' => request('assistantPercentage'),
          'anesthesiaPercentage' => request('anesthesiaPercentage'),
          'midwifePercentage' => request('midwifePercentage'),
          'total' => request('total'),
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
    public function edit(Operation $operation)
    {
        return view('reception.patient.editOperation',compact('operation',$operation));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation)
    {
        //Validate
        $request->validate([
          'patientName'=>'required',
          'docName'=>'required',
          'operationType'=>'required', 'max:255',
          'fee'=>'required',
          'docPercentage'=>'required',
          'assistantPercentage'=>'nullable',
          'anesthesiaPercentage'=>'nullable',
          'midwifePercentage'=>'nullable',
          'total'=>'required', 'max:255',
        ]);

        $operation->patientName = $request->patientName;
        $operation->docName = $request->docName;
        $operation->operationType = $request->operationType;
        $operation->fee = $request->fee;
        $operation->docPercentage = $request->docPercentage;
        $operation->assistantPercentage = $request->assistantPercentage;
        $operation->anesthesiaPercentage = $request->anesthesiaPercentage;
        $operation->midwifePercentage = $request->midwifePercentage;
        $operation->total = $request->total;
        $operation->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/operation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Operation $operation)
    {
        $operation->delete();
        return redirect('/operation');
    }
}
