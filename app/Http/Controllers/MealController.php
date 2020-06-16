<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class MealController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_meal(){
        return view('admin.meal.add_meal');
    }
    public function save_meal(Request $request){
        $validatedData = $request->validate([
            'name_id' => 'required',
        ],[
            'name_id.required' => 'Select Name First!',
        ]);
        $name_id = $request->name_id;
        $date = $request->meal_date;
        $meal_date = DB::table('meals')->where('name_id',$name_id)->where('meal_date',$date)->first();
        if($meal_date){
            $notification = array(
                'message' => 'Today Meal Already Listed',
                'alert-type' => 'warning'
            );
            return redirect('/add_meal')->with($notification);
        }else{
            $data = array();
            $data['name_id'] = $request['name_id'];
            $data['breakfast'] = $request['breakfast'];
            $data['lunch'] = $request['lunch'];
            $data['dinner'] = $request['dinner'];
            $data['comment'] = $request['comment'];
            $data['month'] = date('F');
            $data['meal_date'] = date('d/m/Y');
            DB::table('meals')->insert($data);
            $notification = array(
                'message' => 'Meal Saved Successfully!',
                'alert-type' => 'success'
            );
            return redirect('/add_meal')->with($notification);
        }
    }

    public function today_meal(){
        return view('admin.meal.today_meal');
    }
    public function this_month_meal(){
        return view('admin.meal.this_month_meal');
    }
    public function all_meals(){
        return view('admin.meal.all_meals');
    }
    public function every_meals($id){
        $personal_meals = DB::table('members')
            ->join('meals','meals.name_id','members.id')
            ->select('members.name','meals.*')
            ->where('members.id', $id)
            ->get();
        return view('admin.meal.personal_meals',compact('personal_meals'));
    }
    public function edit_meal($id){
        $edit_meal = DB::table('meals')->where('id', $id)->first();
        return view('admin.meal.edit_meal',compact('edit_meal'));
    }
    public function update_meal(Request $request, $id){
        $data = array();
        $data['breakfast'] = $request['breakfast'];
        $data['lunch'] = $request['lunch'];
        $data['dinner'] = $request['dinner'];
        $data['comment'] = $request['comment'];
        $update_meal = DB::table('meals')->where('id',$id)->update($data);
        $notification = array(
            'message' => 'Meal Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect('/today_meal')->with($notification);
        ;
    }
}
