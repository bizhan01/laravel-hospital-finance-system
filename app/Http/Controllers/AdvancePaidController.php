<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\AdvancePaid;
use DB;


class AdvancePaidController extends Controller
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
      $advancePaid= AdvancePaid::latest();

      if($month =request('month')){
        $advancePaid->whereMonth('created_at', Carbon::parse($month)->month);
      }

      if($year=request('year')){
        $advancePaid->whereYear('created_at', $year);
      }
      $advancePaid = $advancePaid->get();

      $archives= AdvancePaid::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
      ->groupBy('year','month')
      ->orderByRaw('min(created_at)desc')
      ->get()
      ->ToArray();

      return view('admin.expense.advancePaid', compact('advancePaid', 'archives'));
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
        'date'=>'required',
        'amount'=>'required', 'max:255',
        'description'=>'nullable',

    ]);
      AdvancePaid::create([
          'fullName' => request('fullName'),
          'date' => request('date'),
          'amount' => request('amount'),
          'description' => request('description'),
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
    public function show(AdvancePaid $product)
    {
        return view('registrar/details',compact('product'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvancePaid $advancePaid)
    {
        return view('admin.expense.editAdvancePaid',compact('advancePaid',$advancePaid));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvancePaid $advancePaid)
    {
        //Validate
        $request->validate([
          'fullName'=>'required',
          'date'=>'required',
          'amount'=>'required',
        ]);

        $advancePaid->fullName = $request->fullName;
        $advancePaid->date = $request->date;
        $advancePaid->amount = $request->amount;
        $advancePaid->description = $request->description;
        $advancePaid->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/advancePaid');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AdvancePaid $advancePaid)
    {
        $advancePaid->delete();
        return redirect('/advancePaid');
    }
}
