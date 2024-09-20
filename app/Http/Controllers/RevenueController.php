<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Revenue;
use DB;


class RevenueController extends Controller
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
      $revenues= Revenue::latest();

      if($month =request('month')){
        $revenues->whereMonth('date', Carbon::parse($month)->month);
      }

      if($year=request('year')){
        $revenues->whereYear('date', $year);
      }
      $revenues = $revenues->get();

      $archives= Revenue::selectRaw('year(date)year,monthname(date) month,COUNT(*)published')
      ->groupBy('year','month')
      ->orderByRaw('min(date)desc')
      ->get()
      ->ToArray();

      return view('admin.revenue.revenue', compact('revenues', 'archives'));
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
        'date'=>'required',
        'source'=>'required',
        'amount'=>'required', 'max:255',
        'description'=>'nullable',

    ]);
      Revenue::create([
          'date' => request('date'),
          'source' => request('source'),
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
    public function edit(Revenue $revenue)
    {
        return view('admin.revenue.editRevenue',compact('revenue',$revenue));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revenue $revenue)
    {
        //Validate
        $request->validate([
          'date'=>'required',
          'source'=>'required',
          'amount'=>'required',
          'description'=>'nullable',
        ]);

        $revenue->date = $request->date;
        $revenue->source = $request->source;
        $revenue->amount = $request->amount;
        $revenue->description = $request->description;
        $revenue->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/revenue');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Revenue $revenue)
    {
        $revenue->delete();
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('/revenue');
    }
}
