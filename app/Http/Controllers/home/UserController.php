<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    //用户注册页面
    public function register()
    {
        return view('user.register');
    }

    //用户注册操作
    public function doRegister(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:4|max:10|unique:users,name',
                'email' => 'required|email|unique:users,name',
                'password' => 'confirmed|min:6|max:20'
            ]);
        }

        $res = User::create(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)]);

        if ($res) {
            return redirect('/login');
        } else {
            return back()->withInput()->withErrors('注册失败！');
        }
    }

    //用户设置页面
    public function setting()
    {
        return view('user.setting');
    }

    //用户设置操作
    public function doSetting()
    {

    }
}
