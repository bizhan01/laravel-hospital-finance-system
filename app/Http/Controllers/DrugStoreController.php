<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Transaction;
use App\Sale;
use App\Patient;

class DrugStoreController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function availableDrug() {

        $transactions = Transaction::Where('type',0)
            ->whereMonth('created_at', Carbon::now()->month)
            ->select([DB::raw("SUM(buy_tot) as buy_tot"), DB::raw("SUM(pay_tot) as pay_tot")])
            // ->groupBy('company_name')
            ->get();

        $prescript = Sale::where('type', 0)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('prescript');
        $retail = Sale::where('type', 0)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('retail');
        $sales = $prescript + $retail;

            return view('pharmacy.availableDrug', [
            'transactions' => $transactions,
            'sales' => $sales
        ]);
    }


    public function availableDrugAdmin() {

        $transactions = Transaction::Where('type',0)
            ->whereMonth('created_at', Carbon::now()->month)
            ->select([DB::raw("SUM(buy_tot) as buy_tot"), DB::raw("SUM(pay_tot) as pay_tot")])
            // ->groupBy('company_name')
            ->get();

        $prescript = Sale::where('type', 0)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('prescript');
        $retail = Sale::where('type', 0)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('retail');
        $sales = $prescript + $retail;

            return view('admin.pharmacy.availableDrug', [
            'transactions' => $transactions,
            'sales' => $sales
        ]);
    }

    public function availableDrugLab() {

        $transactions = Transaction::Where('type',1)
            ->whereMonth('created_at', Carbon::now()->month)
            ->select([DB::raw("SUM(buy_tot) as buy_tot"), DB::raw("SUM(pay_tot) as pay_tot")])
            // ->groupBy('company_name')
            ->get();

        $prescript = Sale::where('type', 1)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('prescript');
        $retail = Sale::where('type', 1)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('retail');
        $sales = $prescript + $retail;

        $revenues = DB::table('patients')->whereMonth('created_at', Carbon::now())->sum('lab');

            return view('Lab.availableDrug', [
            'transactions' => $transactions,
            'sales' => $sales,
            'revenues' => $revenues,
        ]);
    }

    public function availableDrugDental() {

        $transactions = Transaction::Where('type',2)
            ->whereMonth('created_at', Carbon::now()->month)
            ->select([DB::raw("SUM(buy_tot) as buy_tot"), DB::raw("SUM(pay_tot) as pay_tot")])
            // ->groupBy('company_name')
            ->get();

        $prescript = Sale::where('type', 2)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('prescript');
        $retail = Sale::where('type', 2)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('retail');
        $sales = $prescript + $retail;

        $revenues = DB::table('patients')->whereMonth('created_at', Carbon::now())->sum('dental');


            return view('dental.availableDrug', [
            'transactions' => $transactions,
            'sales' => $sales,
            'revenues' => $revenues,
        ]);
    }
}
