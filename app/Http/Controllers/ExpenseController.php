<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Expense;
use App\User;
use DB;

class ExpenseController extends Controller
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
      $expenses= Expense::latest();

      if($month =request('month')){
        $expenses->whereMonth('created_at', Carbon::parse($month)->month);
      }

      if($year=request('year')){
        $expenses->whereYear('created_at', $year);
      }
      $expenses = $expenses->get();

      $archives= Expense::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
      ->groupBy('year','month')
      ->orderByRaw('min(created_at)desc')
      ->get()
      ->ToArray();



      // Current Month Expenses Summary
      $CMfoods = DB::table('expenses')->whereMonth('created_at', Carbon::now())->where('category', 'مواد غذایی')->sum('total');
      $CMoil = DB::table('expenses')->whereMonth('created_at', Carbon::now())->where('category', 'مخروقات')->sum('total');
      $CMdrugs = DB::table('expenses')->whereMonth('created_at', Carbon::now())->where('category', 'پرداخت شرکت دوای')->sum('total');
      $CMsubDurgs = DB::table('expenses')->whereMonth('created_at', Carbon::now())->where('category', 'دوای پرچون')->sum('total');
      $CMnotebooks = DB::table('expenses')->whereMonth('created_at', Carbon::now())->where('category', 'قرطاسیه')->sum('total');
      $CMassets = DB::table('expenses')->whereMonth('created_at', Carbon::now())->where('category', 'اجناس')->sum('total');
      $CMadvertisements = DB::table('expenses')->whereMonth('created_at', Carbon::now())->where('category', 'تبلیغات')->sum('total');
      $CMmaintains = DB::table('expenses')->whereMonth('created_at', Carbon::now())->where('category', 'ترمیمات')->sum('total');
      $CMsalary = DB::table('expenses')->whereMonth('created_at', Carbon::now())->where('category', 'معاش')->sum('total');
      $CMpower = DB::table('expenses')->whereMonth('created_at', Carbon::now())->where('category', 'برق')->sum('total');
      $CMtax = DB::table('expenses')->whereMonth('created_at', Carbon::now())->where('category', 'مالیه')->sum('total');
      $CMother = DB::table('expenses')->whereMonth('created_at', Carbon::now())->where('category', 'سایر')->sum('total');
      $CMtotal = DB::table('expenses')->whereMonth('created_at', Carbon::now())->sum('total');

      // Last Month Expenses Summary
      $dt = Carbon::now();
      $LMfoods = DB::table('expenses')->whereMonth('created_at',  $dt->subMonths(1))->where('category', 'مواد غذایی')->sum('total');
      $dt = Carbon::now();
      $LMoil = DB::table('expenses')->whereMonth('created_at', $dt->subMonths(1))->where('category', 'مخروقات')->sum('total');
      $dt = Carbon::now();
      $LMdrugs = DB::table('expenses')->whereMonth('created_at', $dt->subMonths(1))->where('category', 'پرداخت شرکت دوای')->sum('total');
      $dt = Carbon::now();
      $LMsubDurgs = DB::table('expenses')->whereMonth('created_at', $dt->subMonths(1))->where('category', 'دوای پرچون')->sum('total');
      $dt = Carbon::now();
      $LMnotebooks = DB::table('expenses')->whereMonth('created_at', $dt->subMonths(1))->where('category', 'قرطاسیه')->sum('total');
      $dt = Carbon::now();
      $LMassets = DB::table('expenses')->whereMonth('created_at', $dt->subMonths(1))->where('category', 'اجناس')->sum('total');
      $dt = Carbon::now();
      $LMadvertisements = DB::table('expenses')->whereMonth('created_at', $dt->subMonths(1))->where('category', 'تبلیغات')->sum('total');
      $dt = Carbon::now();
      $LMmaintains = DB::table('expenses')->whereMonth('created_at', $dt->subMonths(1))->where('category', 'ترمیمات')->sum('total');
      $dt = Carbon::now();
      $LMsalary = DB::table('expenses')->whereMonth('created_at', $dt->subMonths(1))->where('category', 'معاش')->sum('total');
      $dt = Carbon::now();
      $LMpower = DB::table('expenses')->whereMonth('created_at', $dt->subMonths(1))->where('category', 'برق')->sum('total');
      $dt = Carbon::now();
      $LMtax = DB::table('expenses')->whereMonth('created_at', $dt->subMonths(1))->where('category', 'مالیه')->sum('total');
      $dt = Carbon::now();
      $LMother = DB::table('expenses')->whereMonth('created_at', $dt->subMonths(1))->where('category', 'سایر')->sum('total');
      $dt = Carbon::now();
      $LMtotal = DB::table('expenses')->whereMonth('created_at', $dt->subMonths(1))->sum('total');

      return view('admin.expense.expense', compact('expenses', 'archives',
       'CMfoods', 'CMoil', 'CMdrugs', 'CMsubDurgs', 'CMnotebooks', 'CMassets','CMadvertisements', 'CMmaintains', 'CMsalary', 'CMpower', 'CMtax', 'CMother', 'CMtotal',
       'LMfoods', 'LMoil', 'LMdrugs', 'LMsubDurgs', 'LMnotebooks', 'LMassets','LMadvertisements', 'LMmaintains', 'LMsalary', 'LMpower', 'LMtax', 'LMother', 'LMtotal',
     ));
    }



    public function generalAssets()
    {
      $expenses= Expense::latest();

      if($month =request('month')){
        $expenses->whereMonth('created_at', Carbon::parse($month)->month);
      }

      if($year=request('year')){
        $expenses->whereYear('created_at', $year);
      }
      $expenses = $expenses->where('category', 'اجناس')->get();

      $archives= Expense::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
      ->groupBy('year','month')
      ->orderByRaw('min(created_at)desc')
      ->get()
      ->ToArray();

      // $expenses = DB::table('expenses')->where('category', 'اجناس')->get();
      return view('admin.assets', compact('expenses', 'archives'));
    }

    public function expense()
    {
      $expenses = DB::table('expenses')->whereDay('created_at', Carbon::today())->where('user_id', '!=', 1)->latest()->get();
      return view('reception.expense.expense', compact('expenses',) );
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
            'item'=>'required',
            'category' =>'required',
            'consumer' => 'required',
            'billNumber' =>'required',
            'price' => 'required','max:255',
            'quantity' => 'required',
            'unit' => 'required',
            'total' => 'required','max:255',
            'description'=>'nullable',

        ]);

          Expense::create([
             'user_id' => Auth::user()->id,
              'item' => request('item'),
              'category' => request('category'),
              'consumer' => request('consumer'),
              'billNumber' => request('billNumber'),
              'price' => request('price'),
              'quantity' => request('quantity'),
              'unit' => request('unit'),
              'total' => request('total'),
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
    public function edit(Expense $expense)
    {
        return view('admin.expense.editExpense',compact('expense',$expense));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //Validate
        $request->validate([
            'item' => 'required',
            'category' => 'required',
            'consumer' => 'required',
            'billNumber' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description'=>'nullable',
        ]);

        $expense->item = $request->item;
        $expense->category = $request->category;
        $expense->consumer = $request->consumer;
        $expense->billNumber = $request->billNumber;
        $expense->price = $request->price;
        $expense->quantity = $request->quantity;
        $expense->unit = $request->unit;
        $expense->total = $request->total;
        $expense->description = $request->description;
        $expense->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('expense');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Expense $expense)
    {
        $expense->delete();
        return redirect('/expensez');
    }
}
