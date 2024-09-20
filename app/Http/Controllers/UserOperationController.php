<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use App\User;
use App\Post;
use DB;

class UserOperationController extends Controller
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
        if (Auth::check()){
        $userSex = Auth::user()->gender;
      }
      $showUsers = DB::table('users')->where('gender','!=', $userSex)->latest()->get();

      $users = DB::table('users')->latest()->get();

      return view('registrar.users', compact('users', 'showUsers'));
    }


    public function addUser()
    {
      $admin = DB::table('users')->where('isAdmin', 1)->latest()->get();
      $pharmacist = DB::table('users')->where('isAdmin', 2)->latest()->get();
      $receptionist = DB::table('users')->where('isAdmin', 0)->latest()->get();
      return view('admin.users.addUser', compact('admin','pharmacist','receptionist'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function show($user)
       {
         $cooks = DB::table('users')->where('isAdmin', 1)->get();
         $garcons = DB::table('users')->where('isAdmin', 2)->get();
         return view('employee.addUser', compact('cooks','garcons'));
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
       DB::delete('delete from users where id = ?',[$id]);
       return redirect('/addUser');
    }
}
