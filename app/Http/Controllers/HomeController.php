<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Patient;
use App\Operation;
use App\Expense;
use App\Percentage;
use App\AdvancePaid;
use App\Employee;
use App\Sale;
use App\Transaction;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = DB::table('users')->where('id', Auth::user()->id)->get();
      $todayPatients = DB::table('patients')->whereDay('created_at', Carbon::today())->sum('total');
      $yesterdayPatients = DB::table('patients')->whereDay('created_at', Carbon::yesterday())->sum('total');
      $todayOperations = DB::table('operations')->whereDay('created_at', Carbon::today())->sum('total');
      $yesterdayOperations = DB::table('operations')->whereDay('created_at', Carbon::yesterday())->sum('total');
      $todayExpenses = DB::table('expenses')->whereDay('created_at', Carbon::today())->where('user_id', '!=', 1)->sum('total');
      $yesterdayExpenses = DB::table('expenses')->whereDay('created_at', Carbon::yesterday())->where('user_id', '!=', 1)->sum('total');
      $todayPercentages = DB::table('percentages')->whereDay('created_at', Carbon::today())->sum('percentage');
      $yesterdayPercentages = DB::table('percentages')->whereDay('created_at', Carbon::yesterday())->sum('percentage');
      $todayReceptionPerscription = DB::table('patients')->whereDay('created_at', Carbon::today())->sum('perscription');
      $todayReceptionRetail = DB::table('patients')->whereDay('created_at', Carbon::today())->sum('retail');

      $currentMonthPatients = DB::table('patients')->whereMonth('created_at', Carbon::now())->sum('total');
      $currentMonthOperations = DB::table('operations')->whereMonth('created_at', Carbon::now())->sum('total');
      $currentMonthRevenues = DB::table('revenues')->whereMonth('created_at', Carbon::now())->sum('amount');

      $currentMonthExpense = DB::table('expenses')->whereMonth('created_at', Carbon::now())->sum('total');
      $currentMonthPercentages = DB::table('percentages')->whereMonth('created_at', Carbon::now())->sum('percentage');
      $currentMonthAdvancePaid = DB::table('advance_paids')->whereMonth('created_at', Carbon::now())->sum('amount');

      $empCount = DB::table('employees')->count('id');

      // Pharmacy
      $yesterday_prescript = Sale::where('type', 0)->whereDay('created_at', Carbon::yesterday())->sum('prescript');
      $today_prescript = Sale::where('type', 0)->whereDay('created_at', Carbon::now()->day)->sum('prescript');
      $yesterday_retail = Sale::where('type', 0)->whereDay('created_at', Carbon::yesterday())->sum('retail');
      $today_retail = Sale::where('type', 0)->whereDay('created_at', Carbon::now()->day)->sum('retail');
      $this_month_prescript = Sale::where('type', 0)->whereMonth('created_at', Carbon::now()->month)->sum('prescript');
      $this_month_retail = Sale::where('type', 0)->whereMonth('created_at', Carbon::now()->month)->sum('retail');
      $this_month_sales = $this_month_prescript + $this_month_retail;
      $this_month_buy_tot = Transaction::where('type', 0)->whereMonth('created_at', Carbon::now()->month)->sum('buy_tot');
      $this_month_pay_tot = Transaction::where('type', 0)->whereMonth('created_at', Carbon::now()->month)->sum('pay_tot');


      return view('home', compact
      (
      'users', 'todayPatients', 'yesterdayPatients', 'todayOperations', 'yesterdayOperations', 'todayExpenses',
      'yesterdayExpenses', 'todayPercentages', 'yesterdayPercentages', 'todayReceptionPerscription', 'todayReceptionRetail',
      'currentMonthPatients', 'currentMonthOperations', 'currentMonthRevenues', 'currentMonthExpense', 'currentMonthPercentages',
      'currentMonthAdvancePaid', 'empCount', 'yesterday_prescript', 'today_prescript', 'yesterday_retail', 'today_retail', 'this_month_sales',
      'this_month_buy_tot', 'this_month_pay_tot',
      )
     );
    }

}
