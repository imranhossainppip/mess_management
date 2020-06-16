<?php

namespace App\Http\Controllers;

use App\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.expenses.add_expenses');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_id' => 'required',
        ],[
            'name_id.required' => 'Select Name First!',
        ]);
        $date = $request->expenses_date;
        $expenses = DB::table('expenses')->where('expenses_date',$date)->first();
        if($expenses){
            $notification = array(
                'message' => 'Today Already Bazar Inserted',
                'alert-type' => 'warning'
            );
            return back()->with($notification);
        }else{
            $data = array();
            $data['name_id'] = $request['name_id'];
            $data['description'] = $request['description'];
            $data['total_taka'] = $request['total_taka'];
            $data['month'] = date('F');
            $data['expenses_date'] = date('d/m/Y');
            DB::table('expenses')->insert($data);
            $notification = array(
                'message' => 'Expenses Saved Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $month = date('F');
        $expenses_all = DB::table('expenses')
            ->join('members','members.id','expenses.name_id')
            ->select('members.name','members.phone','expenses.*')
            ->where('month',$month)
            ->get();
        return  view('admin.expenses.all_expenses',compact('expenses_all'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function view_expenses(){

    }
    public function every_expenses($id){
        $every_expenses = DB::table('members')
            ->join('expenses','expenses.name_id','members.id')
            ->select('members.name','expenses.*')
            ->where('members.id',$id)
            ->get();
        return view('admin.expenses.every_expenses',compact('every_expenses'));
    }
    public function edit_expenses($id){
        $edits = DB::table('expenses')
            ->join('members','members.id','expenses.name_id')
            ->select('members.name','expenses.*')
            ->where('expenses.id',$id)
            ->first();
        return view('admin.expenses.edit_expenses',compact('edits'));
    }
    public function update_expenses(Request $request,$id){
        $data = Expenses::findorfail($id);
        $data['description'] = $request['description'];
        $data['total_taka'] = $request['total_taka'];
        $data->update();
        $notification = array(
            'message' => 'Expenses Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/home')->with($notification);
    }

}
