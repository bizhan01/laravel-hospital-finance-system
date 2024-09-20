<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Percentage;
use App\Doctor;
use App\User;
use DB;

class PercentageController extends Controller
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

      $percentages = DB::table('percentages')->whereDay('created_at', Carbon::today())->latest()->get();

      return view('reception.expense.percentage', compact('doctors','percentages') );
    }

    public function percentages()
    {
      $percentages = Percentage::latest();

      if($month =request('month')){
        $percentages->whereMonth('created_at', Carbon::parse($month)->month);
      }

      if($year=request('year')){
        $percentages->whereYear('created_at', $year);
      }
      $percentages = $percentages->get();

      $archives= Percentage::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
      ->groupBy('year','month')
      ->orderByRaw('min(created_at)desc')
      ->get()
      ->ToArray();

      return view('admin.expense.percentages', compact('percentages', 'archives') );
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
            'docName'=>'required',
            'procedure' => 'required',
            'income' =>'required',
            'percentage' => 'required',
            'total' => 'required',

        ]);

          Percentage::create([
              'user_id' => Auth::user()->id,
              'docName' => request('docName'),
              'procedure' => request('procedure'),
              'income' => request('income'),
              'percentage' => request('percentage'),
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
    public function show(User $user)
    {
      $expenses = DB::table('expenses')->where('category', 'اجناس')->get();
      return view('admin.expense.assets', compact('expenses') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Percentage $percentage)
    {
        return view('reception.expense.editPercentage',compact('percentage',$percentage));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Percentage $percentage)
    {
        //Validate
        $request->validate([
            'docName' => 'required',
            'procedure' => 'required',
            'income' => 'required',
            'percentage' => 'required',
            'total' => 'required',
        ]);

        $percentage->docName = $request->docName;
        $percentage->procedure = $request->procedure;
        $percentage->income = $request->income;
        $percentage->percentage = $request->percentage;
        $percentage->total = $request->total;
        $percentage->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/percentage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Percentage $percentage)
    {
        $percentage->delete();
        return redirect('/percentage');
    }
}
