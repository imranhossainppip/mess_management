<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('front.master');
    }
    public function add_members(){
        return view('admin.members.add_members');
    }
    public function save_member(Request $request){
        $validatedData = $request->validate([
            'phone' => 'unique:members|max:11|min:11',
            'email' => 'unique:members',
            'guardian_phone' => 'unique:members|max:11|min:11',
            'nid' => 'unique:members',
        ]);
        $photo = $request->file('photo','nid_upload');
        $photo_full_name = time().'.'.$photo->getClientOriginalExtension();
        $location = 'admin/images/';
        $img_url = $location.$photo_full_name;
        $photo->move($location, $photo_full_name);
        $data = array();
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['phone'] = $request['phone'];
        $data['guardian_phone'] = $request['guardian_phone'];
        $data['nid'] = $request['nid'];
        $data['address'] = $request['address'];
        $data['education_qualification'] = $request['education_qualification'];
        $data['photo'] = $img_url;
        $data['nid_upload'] = $img_url;
        $data['status'] = $request['status'];
        $members = DB::table('members')->insert($data);
        $notification = array(
            'message' => 'Member Information Have Saved',
            'alert-type' => 'success'
        );
        return redirect('add_members')->with($notification);
    }

    public function all_members(){
        $status = 'running';
        $members = DB::table('members')->where('status',$status)->get();
        return view('admin.members.all_members',compact('members'));
    }
    public function edit_member($id){
        $edit_member = DB::table('members')->where('id',$id)->first();
        return view('admin.members.edit_members',compact('edit_member'));
    }
    public function update_member(Request $request,$id){
        $photo = $request->file('photo');
        if($photo){
            $data=Member::findorfail($id);
            unlink($data->photo);
            $photo = $request->file('photo');
            $photo_full_name = time().'.'.$photo->getClientOriginalExtension();
            $location = 'admin/images/';
            $img_url = $location.$photo_full_name;
            $photo->move($location, $img_url);
            $data['name'] = $request['name'];
            $data['email'] = $request['email'];
            $data['phone'] = $request['phone'];
            $data['guardian_phone'] = $request['guardian_phone'];
            $data['nid'] = $request['nid'];
            $data['address'] = $request['address'];
            $data['education_qualification'] = $request['education_qualification'];
            $data['education_qualification'] = $request['education_qualification'];
            $data['photo'] = $img_url;
            $data['nid_upload'] = "imran";
            $data['status'] = $request['status'];
            $data->update();
        }else{
            $data=Member::findorfail($id);
            $data['name'] = $request['name'];
            $data['email'] = $request['email'];
            $data['phone'] = $request['phone'];
            $data['guardian_phone'] = $request['guardian_phone'];
            $data['nid'] = $request['nid'];
            $data['address'] = $request['address'];
            $data['education_qualification'] = $request['education_qualification'];
            $data->update();
        }
        $notification = array(
            'message' => 'Member Information Have Saved',
            'alert-type' => 'success'
        );
        return redirect('/all_members/')->with($notification);
    }
    public function view_member($id){
        $view_member = DB::table('members')->where('id',$id)->first();
        return view('admin.members.view_member',compact('view_member'));
    }
    public function remove_member($id){
        DB::table('members')->where('id', $id)->update(['status' => 'end', 'updated_at'=> date('Y-m-d H:i:s')]);
        $notification = array(
            'message' => 'Members Information Removed From This Page',
            'alert-type' => 'success'
        );
        return redirect('/all_members')->with($notification);
    }
    public function previous_members(){
        $status = 'end';
        $previous_members = DB::table('members')->where('status', $status)->get();
        return view('admin.members.previous_members',compact('previous_members'));
    }
    public function again_member($id){
        DB::table('members')->where('id', $id)->update(['status' => 'running', 'updated_at'=> date('Y-m-d H:i:s')]);
        $notification = array(
            'message' => 'Members Information Removed From This Page',
            'alert-type' => 'success'
        );
        return redirect('/previous_members')->with($notification);
    }
}
