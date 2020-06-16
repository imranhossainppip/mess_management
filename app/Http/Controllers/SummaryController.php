<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
        return view('admin.summary.show_summary',compact('total_meals','total_deposites','total_expenses'));
    }
    public function per_cost(){
        $status = 'running';
        $members = DB::table('members')->where('status', $status)->get();
        return view('admin.summary.per_cost',compact('members'));
    }
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
        return view('admin.summary.final_cost',compact('final_cost','total_meal','expenses','deposit','total_amount','personal_meal'));
    }
}
