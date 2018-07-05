<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    //用户登录页面
    public function login()
    {
        return view('login.login');
    }

    //用户登录操作
    public function doLogin(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
               'email' =>  'email',
                'password' => 'min:6|max:20',
            ]);

          $res = Auth::attempt(['email' => $request->email, 'password' => $request->password], boolval($request->is_remember));
          if ($res) {
              return redirect('/article');
          } else {
              return back()->withInput()->withErrors('登录失败！');
          }
        }

    }

    //用户退出操作
    public function doLogout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
