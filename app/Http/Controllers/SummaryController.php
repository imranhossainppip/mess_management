<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SummaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show_summary(){
        $month = date('F');
        $status = 'running';
        $db = DB::table('meals')->where('month',$month);
        $breakfast = $db->sum('breakfast');
        $lunch = $db->sum('lunch');
        $dinner = $db->sum('dinner');
        $total_meals = $breakfast + $lunch + $dinner;
        $total_deposites = DB::table('deposites')->where('month',$month)->sum('total_taka');
        $total_expenses = DB::table('expenses')->where('month',$month)->sum('total_taka');
        $members = DB::table('members')->where('status', $status)->get();
        return view('admin.summary.show_summary',compact('total_meals','total_deposites','total_expenses','members'));
    }
//    public function per_cost(){
//        $status = 'running';
//        $members = DB::table('members')->where('status', $status)->get();
//        return view('admin.summary.per_cost',compact('members'));
//    }
    public function final_cost($id){
        $month = date('F');
        $final_cost = DB::table('members')->where('id',$id)->first();
        $meal = DB::table('meals')->join('members','members.id','meals.name_id')->where('members.id',$id)->where('month',$month)->get();
        $breakfast = $meal->sum('breakfast');
        $lunch = $meal->sum('lunch');
        $dinner = $meal->sum('dinner');
        $total_meal = $breakfast + $lunch + $dinner;
        $expenses = DB::table('expenses')->join('members','members.id','expenses.name_id')->where('members.id',$id)->where('month',$month)->sum('total_taka');
        $deposit = DB::table('deposites')->join('members','members.id','deposites.name_id')->where('members.id',$id)->where('month',$month)->sum('total_taka');
        $total_amount = $expenses + $deposit;
        ////Meal Rate
        $db = DB::table('meals')->where('month',$month);
        $breakfast = $db->sum('breakfast');
        $lunch = $db->sum('lunch');
        $dinner = $db->sum('dinner');
        $total_meals = $breakfast + $lunch + $dinner;
        $total_deposites = DB::table('deposites')->where('month',$month)->sum('total_taka');
        $total_expenses = DB::table('expenses')->where('month',$month)->sum('total_taka');
        $total_cost = $total_deposites + $total_expenses;
        $meal_rate = sprintf('%0.2f',$total_cost / $total_meals);
        $personal_meal = $total_meal * $meal_rate;
        //others cost
        $other_cost = DB::table('others_cost')->where('month',$month)->get();
        $room_rent = $other_cost->sum('room_rent');
        $net_bill = $other_cost->sum('net_bill');
        $paper_bill = $other_cost->sum('paper_bill');
        $khala_cost = $other_cost->sum('khala_cost');
        $other_total = $room_rent + $net_bill + $paper_bill + $khala_cost;
        $per_other = sprintf('%0.0f',$other_total / 12);
        return view('admin.summary.final_cost',compact('final_cost','total_meal','expenses','deposit','total_amount','personal_meal','per_other'));
    }

    //Others Cost Here----------------
    public function others_cost(){
        return view('admin.summary.others_cost');
    }
    protected function save_cost(Request $request)
    {
        $data = array();
        $data['room_rent'] = $request['room_rent'];
        $data['net_bill'] = $request['net_bill'];
        $data['paper_bill'] = $request['paper_bill'];
        $data['khala_cost'] = $request['khala_cost'];
        $data['month'] = $request['month'];
        DB::table('others_cost')->insert($data);
        $notification = array(
            'message' => 'Others Cost Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect('/others_cost')->with($notification);
    }

}
