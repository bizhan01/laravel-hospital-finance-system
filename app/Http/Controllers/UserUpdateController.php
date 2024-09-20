<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Advertisement;

class UserUpdateController extends Controller
{
    public function index() {
      $users = DB::select('select * from users');
      return view('admin.employee.user_edit_view',['users'=>$users]);
   }


   public function show($id)
  {
      $users = DB::select('select * from users where id = ?',[$id]);
      return view('UserProfile.editProfile',['users'=>$users,]);
   }



   public function edit(Request $request,$id) {
      $name = $request->input('name');
      $email = $request->input('email');
      $password = $request->input('password');
      $isAdmin = $request->input('isAdmin');
      $status = $request->input('status');
      if($image = $request->file('image')){
        $new_name =rand() . '.' . $image-> getClientOriginalExtension();
        $image -> move("UploadedImages", $new_name);
      }
      else {
         $new_name = $request->input('image');
      };

      DB::update('update users set name = ? where id = ?',[$name,$id]);
      DB::update('update users set email = ? where id = ?',[$email,$id]);
      DB::update('update users set password = ? where id = ?',[$password,$id]);
      DB::update('update users set isAdmin = ? where id = ?',[$isAdmin,$id]);
      DB::update('update users set status = ? where id = ?',[$status,$id]);
      DB::update('update users set profileImage = ? where id = ?',[$new_name,$id]);
      return redirect('/home');
   }
}
