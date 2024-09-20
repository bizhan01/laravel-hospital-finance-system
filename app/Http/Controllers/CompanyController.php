<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \App\Company;
use \App\Transaction;


class CompanyController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    // add company for pharmacy
    public function addCompany() {
        $Companies = Company::all()->where('type', 0);
        return view('pharmacy.addCompany', [
            'Companies' => $Companies
        ]);
    }

    // add company for admin
    public function addCompanyAdmin() {
        $Companies = Company::all()->where('type', 0);
        return view('admin.pharmacy.addCompany', [
            'Companies' => $Companies
        ]);
    }

    // add company for Lab
    public function addCompanyLab() {
        $Companies = Company::all()->where('type', 1);
        return view('Lab.addCompany', [
            'Companies' => $Companies
        ]);
    }

    // add company for Dental
    public function addCompanyDental() {
        $Companies = Company::all()->where('type', 2);
        return view('dental.addCompany', [
            'Companies' => $Companies
        ]);
    }

    // save company.
    public function saveCompany(Request $req) {
        $this->validate($req, [
            'company_name' => 'required|max:190',
            'company_phone' => 'max:15',
            'visitor_name' => 'max:190',
            'visitor_phone' => 'max:15',
            'deal_type' => 'required',
            'exchange_type' => 'required',
            'deal_type_desc' => 'max:190',
            'type' => 'required',
        ], [
            'company_name.required' => 'نام شرکت را وارد کنید',
            'company_phone.max' => 'شماره تلفن درست را وارد کنید',
            'visitor_name.max' => 'نام ویزیتور بسیار برزگ است',
            'visitor_phone.max' => 'شماره تلفن درست را وارد کنید',
            'exchange_type.required' => 'نوعیت اسعار را وارد کنید',
            'deal_type.required' => 'نوعیت معامله را وارد کنید',
            'deal_type_desc.max' => 'نباید بیشتر از 190 حرف باشد'
        ]);

        $Company = new Company();
        $Company->name = $req->company_name;
        $Company->company_phone = $req->company_phone;
        $Company->visitor_name = $req->visitor_name;
        $Company->visitor_phone = $req->visitor_phone;
        $Company->exchange_type = $req->exchange_type;
        $Company->deal_type = $req->deal_type;
        $Company->deal_type_desc = $req->deal_type_desc;
        $Company->type = $req->type;
        $Company->user_id = Auth::user()->id;
        try {
            $Company->save();
            session()->flash('success', 'شرکت موفقانه ثبت شد');
            return back();
        } catch(Exception $ex) {
            session()->flash('failed', 'شرکت ثبت نشد');
            return back();
        }
    }

    // edit company.
    public function editCompany($id = 0) {
        $companies = Company::all()->where('id', $id);
        return view('pharmacy.editCompany', [
            'companies' => $companies
        ]);
    }

    // update company.
    public function updateCompany(Request $req) {
        $this->validate($req, [
            'company_name' => 'required|max:190',
            'company_phone' => 'max:15',
            'visitor_name' => 'max:190',
            'visitor_phone' => 'max:15',
            'deal_type' => 'required',
            'exchange_type' => 'required',
            'deal_type_desc' => 'max:190'
        ], [
            'company_name.required' => 'نام شرکت را وارد کنید',
            'company_phone.max' => 'شماره تلفن درست را وارد کنید',
            'visitor_name.max' => 'نام ویزیتور بسیار برزگ است',
            'visitor_phone.max' => 'شماره تلفن درست را وارد کنید',
            'exchange_type.required' => 'نوعیت اسعار را وارد کنید',
            'deal_type.required' => 'نوعیت معامله را وارد کنید',
            'deal_type_desc.max' => 'نباید بیشتر از 190 حرف باشد'
        ]);

        $Company = Company::find($req->id);
        $Company->name = $req->company_name;
        $Company->company_phone = $req->company_phone;
        $Company->visitor_name = $req->visitor_name;
        $Company->visitor_phone = $req->visitor_phone;
        $Company->exchange_type = $req->exchange_type;
        $Company->deal_type = $req->deal_type;
        $Company->deal_type_desc = $req->deal_type_desc;
        $Company->user_id = Auth::user()->id;
        try {
            $Company->save();
            session()->flash('success', 'شرکت موفقانه ثبت شد');
            return back();
        } catch(Exception $ex) {
            session()->flash('failed', 'شرکت ثبت نشد');
            return back();
        }
    }


    // company blance for pharmacy
    public function companyBlance() {
        // $transactions = Transaction::all()->where('type', 0);
        $transactions = Transaction::Where('type',0)
            ->select(["company_name as company_name", DB::raw("SUM(buy_tot) as buy_tot"), DB::raw("SUM(pay_tot) as pay_tot")])
            ->groupBy('company_name')
            ->get();
        return view('pharmacy.companyBlance', [
            'transactions' => $transactions
        ]);
    }

    // company blance for Admin
    public function companyBlanceAdmin() {
        // $transactions = Transaction::all()->where('type', 0);
        $transactions = Transaction::Where('type',0)
            ->select(["company_name as company_name", DB::raw("SUM(buy_tot) as buy_tot"), DB::raw("SUM(pay_tot) as pay_tot")])
            ->groupBy('company_name')
            ->get();
        return view('admin.pharmacy.companyBlance', [
            'transactions' => $transactions
        ]);
    }

    // company blance for Lab
    public function companyBlanceLab() {
        // $transactions = Transaction::all()->where('type', 0);
        $transactions = Transaction::Where('type',1)
            ->select(["company_name as company_name", DB::raw("SUM(buy_tot) as buy_tot"), DB::raw("SUM(pay_tot) as pay_tot")])
            ->groupBy('company_name')
            ->get();
        return view('Lab.companyBlance', [
            'transactions' => $transactions
        ]);
    }

    // company blance for Dental
    public function companyBlanceDental() {
        // $transactions = Transaction::all()->where('type', 0);
        $transactions = Transaction::Where('type', 2)
            ->select(["company_name as company_name", DB::raw("SUM(buy_tot) as buy_tot"), DB::raw("SUM(pay_tot) as pay_tot")])
            ->groupBy('company_name')
            ->get();
        return view('dental.companyBlance', [
            'transactions' => $transactions
        ]);
    }

    // delete company.
    public function deleteCompany($id = 0) {
        try {
            Company::destroy($id);
            session()->flash('success', 'موفقانه حذف شد.');
            return back();
        } catch(Exception $ex) {
            ession()->flash('failed', 'خطا! عملیات ناموفق بود');
            return back();
        }
    }

}
