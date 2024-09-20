<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Company;
use \App\Transaction;

class TransactionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    // add deal.
    public function doDeals() {
        $Company = Company::select('name')->where('type', 0)->get();
        $transactions = Transaction::all()->where('type', 0);
        return view('pharmacy.doDeals',[
            'company' => $Company,
            'transactions' => $transactions
        ]);
    }

    // add deal for admin
    public function doDealsAdmin() {
        $Company = Company::select('name')->where('type', 0)->get();
        $transactions = Transaction::all()->where('type', 0);
        return view('admin.pharmacy.doDeals',[
            'company' => $Company,
            'transactions' => $transactions
        ]);
    }

    // add deal for Lab
    public function doDealsLab() {
        $Company = Company::select('name')->where('type', 1)->get();
        $transactions = Transaction::all()->where('type', 1);
        return view('Lab.doDeals',[
            'company' => $Company,
            'transactions' => $transactions
        ]);
    }

    // add deal for admin
    public function doDealsDental() {
        $Company = Company::select('name')->where('type', 2)->get();
        $transactions = Transaction::all()->where('type', 2);
        return view('dental.doDeals',[
            'company' => $Company,
            'transactions' => $transactions
        ]);
    }

    // save deal.
    public function saveDeals(Request $req) {
        $this->validate($req, [
            'company_name' => 'required',
            'transaction_date' => 'required',
            // 'buy_tot' => 'numeric',
            // 'buy_invice_no' => '',
            // 'pay_tot' => 'numeric',
            // 'pay_invice_no' => ''
              'type' => 'required',
        ], []);
        $transaction = new Transaction();
        $transaction->company_name = $req->company_name;
        $transaction->transaction_date = $req->transaction_date;
        $transaction->buy_tot = $req->buy_tot;
        $transaction->buy_invice_no = $req->buy_invice_no;
        $transaction->pay_tot = $req->pay_tot;
        $transaction->pay_invice_no = $req->pay_invice_no;
        $transaction->description = $req->description;
        $transaction->type = $req->type;
        $transaction->user_id = Auth::user()->id;
        try {
            $transaction->save();
            session()->flash('success', 'موفقانه ثبت شد');
            return back();
        } catch(Exception $ex) {
            session()->flash('failed', 'خطا! ثبت نشد');
            return back();
        }
    }

    // edit deal.
    public function editDeal($id = 0) {
        $Company = Company::select('name')->where('type', 0)->get();
        $transactions = Transaction::all()->where('id', $id);
        return view('pharmacy.editDeal',[
            'company' => $Company,
            'transactions' => $transactions
        ]);
    }

    // save deal.
    public function updateDeal(Request $req) {
        $this->validate($req, [
            'company_name' => 'required',
            'transaction_date' => 'required',
            // 'buy_tot' => 'numeric',
            // 'buy_invice_no' => '',
            // 'pay_tot' => 'numeric',
            // 'pay_invice_no' => ''
        ], []);
        $transaction = Transaction::find($req->id);
        $transaction->company_name = $req->company_name;
        $transaction->transaction_date = $req->transaction_date;
        $transaction->buy_tot = $req->buy_tot;
        $transaction->buy_invice_no = $req->buy_invice_no;
        $transaction->pay_tot = $req->pay_tot;
        $transaction->pay_invice_no = $req->pay_invice_no;
        $transaction->description = $req->description;
        $transaction->user_id = Auth::user()->id;
        try {
            $transaction->save();
            session()->flash('success', 'موفقانه ثبت شد');
            return back();
        } catch(Exception $ex) {
            session()->flash('failed', 'خطا! ثبت نشد');
            return back();
        }
    }

    // delete deal.
    public function deleteDeal($id = 0) {
        try {
            Transaction::destroy($id);
            session()->flash('success', 'موفقانه حذف شد.');
            return back();
        } catch(Exception $ex) {
            ession()->flash('failed', 'خطا! عملیات ناموفق بود');
            return back();
        }
    }



}
