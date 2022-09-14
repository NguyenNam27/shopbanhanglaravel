<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();


class BlogController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function all_post(){
        $this->AuthLogin();
        $all_post = DB::table('tbl_posts')
                    ->join('tbl_brand','tbl_brand.brand_id','=','tbl_posts.brand_id')
                    ->orderBy('tbl_posts.brand_id','desc')->get();
        return view('admin.all_post',[
            'all_post'=>$all_post
        ]);
    }
    public function add_post(){
        $this->AuthLogin();
        $brand = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        return view('admin.add_post',[
            'brand'=>$brand
        ]);
    }

    public function unactive_post($id){
        $this->AuthLogin();
        DB::table('tbl_posts')->where('id',$id)->update(['post_status'=>1]);
        Session::put('message','Không kích hoạt bài viết thành công');
        return Redirect::to('all-post');

    }
    public function active_post($id){
        $this->AuthLogin();
        DB::table('tbl_posts')->where('id',$id)->update(['post_status'=>0]);
        Session::put('message','Kích hoạt bài viết thành công');
        return Redirect::to('all-post');
    }
    public function save_post(Request $request){
        $this->AuthLogin();
        $data = array();
    }
}
