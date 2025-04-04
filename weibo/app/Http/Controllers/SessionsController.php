<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
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

        if(Auth::attempt($creadentials, $request->has('remember'))) {
            session()->flash('success', '欢迎回来！');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    public function destroy() {
      Auth::logout();
      session()->flash('success', '您已成功退出！');
      return redirect('login');
    }
}
