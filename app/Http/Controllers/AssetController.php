<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Asset;
use DB;


class AssetController extends Controller
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
      $assets = DB::table('assets')->where('type', 0)->latest()->get();
      return view('lab.assets', compact('assets',));
    }

    public function assets()
    {
      $assets = DB::table('assets')->where('type', 1)->latest()->get();
      return view('dental.assets', compact('assets',));
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
          'type'=>'required',
          'item'=>'required',
          'model'=>'nullable',
          'quantity'=>'required',
          'description'=>'nullable',

    ]);
      Asset::create([
          'type' => request('type'),
          'item' => request('item'),
          'model' => request('model'),
          'quantity' => request('quantity'),
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        return view('admin.lab.editAsset',compact('asset',$asset));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        //Validate
        $request->validate([
          'type'=>'required',
          'item'=>'required',
          'model'=>'nullable',
          'quantity'=>'required',
          'description'=>'nullable',
        ]);

        $asset->type = $request->type;
        $asset->item = $request->item;
        $asset->model = $request->model;
        $asset->quantity = $request->quantity;
        $asset->description = $request->description;
        $asset->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/asset');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Asset $asset)
    {
        $asset->delete();
        return back();
    }
}
