<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Sale;
use \App\Patient;
use Carbon\Carbon;
use DB;

class SaleController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    // daily sales
    public function dailySales() {
        $sales = Sale::all()->where('type', 0);
        return view('pharmacy.dailySales', [
            'sales' => $sales
        ]);
    }

    // daily sales for Admin
    public function dailySalesList() {
        $perscription = DB::table('sales')->whereMonth('created_at', Carbon::now())->sum('prescript');
        $retails = DB::table('sales')->whereMonth('created_at', Carbon::now())->sum('retail');
        $sales = Sale::all()->where('type', 0);
        return view('admin.pharmacy.dailySales', compact('sales', 'perscription', 'retails'));
    }

    // save daily sale.
    public function saveSale(Request $req) {
        if ($req->total > 0) {
            $sale = new Sale();
            $sale->patient_name = $req->patient_name;
            $sale->prescript = $req->prescript;
            $sale->retail = $req->retail;
            $sale->user_id = Auth::user()->id;
            try {
                $sale->save();
                session()->flash('success', 'موفقانه ثبت شد');
                return back();
            }catch(Exception $ex) {
                session()->flash('failed', 'خطا! ثبت نشد');
                return back();
            }
        } else {
            session()->flash('failed', 'خطا! ثبت نشد');
            return back();
        }
    }

    // edit daily sale.
    public function dailySalesEdit($id = 0) {
        $sales = Sale::all()->where('id', $id);
        return view('pharmacy.dailySalesEdit', [
            'sales' => $sales
        ]);
    }
    // update daily sale.
    public function dailySalesUpdate(Request $req) {
        if ($req->total > 0) {
            $sale = Sale::find($req->id);
            $sale->patient_name = $req->patient_name;
            $sale->prescript = $req->prescript;
            $sale->retail = $req->retail;
            $sale->user_id = Auth::user()->id;
            try {
                $sale->save();
                session()->flash('success', 'موفقانه ثبت شد');
                return back();
            }catch(Exception $ex) {
                session()->flash('failed', 'خطا! ثبت نشد');
                return back();
            }
        } else {
            session()->flash('failed', 'خطا! ثبت نشد');
            return back();
        }
    }

    // delete sale.
    public function deleteSale($id = 0) {
        try {
            Sale::destroy($id);
            session()->flash('success', 'موفقانه حذف شد.');
            return back();
        } catch(Exception $ex) {
            ession()->flash('failed', 'خطا! عملیات ناموفق بود');
            return back();
        }
    }



}
