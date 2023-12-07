<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        if (Session::get('admin_name')) {
            return Redirect::to('/dashboard');
        } else {
            return view('admin_login');
            
        }
        
    }
    public function show_dashboard(){
        
        if (Session::get('admin_name')) {
            return view('admin.dashboard');
        } else {
            return Redirect::to('/admin');
        }
    }
    public function dashboard(Request $request){
        //echo 'hel';
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password',$admin_password)->first();
        //print_r($result);
        if ($result) {
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }
        else {
            Session::put('message','Sai Thông Tin');
            return Redirect::to('/admin');
        }
    }

    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
