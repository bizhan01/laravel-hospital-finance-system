<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Revenue;
use App\Expense;
use App\Patient;
use App\Operation;
use App\Percentage;
use App\Student;
use App\User;
use DB;

class BalanceController extends Controller
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
         $patients= Patient::latest();

         if($month =request('month')){
           $patients->whereMonth('created_at', Carbon::parse($month)->month);
         }

         if($year=request('year')){
           $patients->whereYear('created_at', $year);
         }
          $patients = $patients->get();

         $archives1= Patient::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
         ->groupBy('year','month')
         ->orderByRaw('min(created_at)desc')
         ->get()
         ->ToArray();


        //  operations
        $operations= Operation::latest();

        if($month =request('month')){
          $operations->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year=request('year')){
          $operations->whereYear('created_at', $year);
        }
        $operations = $operations->get();

        $archives2= Operation::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at)desc')
        ->get()
        ->ToArray();



          // Extra Revenue
         $revenues= Revenue::latest();

         if($month =request('month')){
           $revenues->whereMonth('date', Carbon::parse($month)->month);
         }

         if($year=request('year')){
           $revenues->whereYear('date', $year);
         }
         $revenues = $revenues->get();

         $archives3= Revenue::selectRaw('year(date)year,monthname(date) month,COUNT(*)published')
         ->groupBy('year','month')
         ->orderByRaw('min(date)desc')
         ->get()
         ->ToArray();

        //  Student fee
        $students= Student::latest();

        if($month =request('month')){
          $students->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year=request('year')){
          $students->whereYear('created_at', $year);
        }
        $students = $students->get();

        $archives4= Student::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at)desc')
        ->get()
        ->ToArray();

          // Expense
         $expenses= Expense::latest();

         if($month =request('month')){
           $expenses->whereMonth('created_at', Carbon::parse($month)->month);
         }

         if($year=request('year')){
           $expenses->whereYear('created_at', $year);
         }
         $expenses = $expenses->get();

         $archives5= Expense::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
         ->groupBy('year','month')
         ->orderByRaw('min(created_at)desc')
         ->get()
         ->ToArray();


        //  percentages
        $percentages = Percentage::latest();

        if($month =request('month')){
          $percentages->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year=request('year')){
          $percentages->whereYear('created_at', $year);
        }
        $percentages = $percentages->get();

        $archives6 = Percentage::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at)desc')
        ->get()
        ->ToArray();


         return view('admin.balance.balance', compact('patients','archives1', 'operations', 'archives2', 'revenues', 'archives3', 'students', 'archives4', 'expenses' ,'archives5', 'percentages', 'archives6'));
       }

}
