<?php

namespace App\Http\Controllers;

use App\Deposite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepositeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_deposit(){
        $status = 'running';
        $deposit_names = DB::table('members')->where('status',$status)->get();
        return view('admin.deposit.add_deposit',compact('deposit_names'));
    }
    public function save_deposit(Request $request){
        $validatedData = $request->validate([
            'name_id' => 'required',
        ],[
            'name_id.required' => 'Select Name First!',
        ]);
        $dara = array();
        $dara['name_id'] = $request['name_id'];
        $dara['description'] = $request['description'];
        $dara['total_taka'] = $request['total_taka'];
        $dara['month'] = $request['month'];
        $dara['deposit_date'] = $request['deposit_date'];
        DB::table('deposites')->insert($dara);
        $notification = array(
            'message' => 'Your Deposit Has Been Saved',
            'alert-type' => 'success'
        );
        return redirect('/add_deposit')->with($notification);
    }
    public function all_deposit(){
        $all_deposites = DB::table('deposites')
            ->join('members','members.id','deposites.name_id')
            ->select('members.name','deposites.*')
            ->get();
        return view('admin.deposit.all_deposit',compact('all_deposites'));
    }
    public function edit_deposit($id){
        $edit_deposit = DB::table('deposites')
            ->join('members','members.id','deposites.name_id')
            ->select('members.name','deposites.*')
            ->where('deposites.id',$id)
            ->first();
        return view('admin.deposit.edit_deposit',compact('edit_deposit'));
    }
    public function update_deposit(Request $request, $id){
        $data = Deposite::findorfail($id);
        $data['description'] = $request['description'];
        $data['total_taka'] = $request['total_taka'];
        $data->update();
        $notification = array(
            'message' => 'Deposit Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/all_deposit')->with($notification);
    }
    public function every_deposit($id){
        $every_deposites = DB::table('members')
            ->join('deposites','deposites.name_id','members.id')
            ->select('members.name','deposites.*')
            ->where('members.id',$id)
            ->get();
        return view('admin.deposit.every_deposit',compact('every_deposites'));
    }
}
