<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{

  public function __construct()
  {
    $this->middleware('guest', [
      'only' => ['create']
    ]);
  }

    /**
     * 显示登录页面
     *
     * @return void
     */
    public function create() {
        return view('sessions.create');
    }

    public function store(Request $request) {
        $creadentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        if(!Auth::attempt($creadentials, $request->has('remember'))) {
          session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
          return redirect()->back()->withInput();
        }

        if(Auth::user()->activated) {
          session()->flash('success', '欢迎回来！');
          $fallback = route('users.show', [Auth::user()]);
          return redirect()->intended($fallback);
        } else {
          Auth::logout();
          session()->flash('warning', '您的账号未激活，请前往邮箱进行激活！');
          return redirect('/');
        }

    }

    public function destroy() {
      Auth::logout();
      session()->flash('success', '您已成功退出！');
      return redirect('login');
    }
}
