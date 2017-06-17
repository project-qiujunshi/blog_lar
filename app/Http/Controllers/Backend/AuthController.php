<?php

namespace App\Http\Controllers\Backend;


use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Validation\Validator;


class AuthController extends BackendController
{
    /**
     * 登录页面
     */
    public function loginFrom(){
        return view('backend.auth.login');
    }

    /**
     * 登录验证
     */
    public function login(Request $request){
        // 表单验证
        $validate = \Validator::make($request->all(),[
            'username' => 'required|min:5|max:50',
            'password' => 'required|min:5|max:255',
        ],[
            'username.required' => ':attribute不能为空',
            'username.min' => ':attribute长度不能小于:min个字符',
            'username.max' => ':attribute长度不能超过:max个字符',
            'password.required' => ':attribute不能为空',
            'password.min' => ':attribute长度不能小于:min个字符',
            'password.max' => ':attribute长度不能超过:max个字符',
        ],[
            'username' => '用户名',
            'password' => '密码',
        ]);

        $admin = \App\Admin::where('username',$request->get('username'))->first();
        // 查找不到用户
        if(empty($admin)){
            return back()->withErrors(['username'=>'用户名不存在！'])->withInput();
        }

        $result = \Auth::guard('admin')->attempt(['username'=>$request->get('username'),'password'=>$request->get('password')]);
        if ($result){
            // 登录成功
            return redirect(route('web.setting'));
        }else{
            return back()->withErrors(['password'=>'密码错误！'])->withInput();
        }
    }

    /**
     * 退出登录
     */
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect(route('auth.login.from'));
    }
}
