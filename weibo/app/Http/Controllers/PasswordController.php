<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Str;
use DB;
use Mail;
use Carbon\Carbon;

class PasswordController extends Controller
{
    public function showLinkRequestForm() {
      return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request) {

      // 1. 验证邮箱
      $request->validate(['email' => 'required|email']);
      $email = $request->email;

      // 2. 生成对应用户
      $user = User::where('email', $email)->first();

      // 3. 如果不存在
      if(is_null($user)) {
        session()->flash('danger', '邮箱未注册');
        return redirect()->back()->withInput();
      }

      // 4. 生成token，会在视图 emails.reset_link 里拼接链接
      $token = hash_hmac('sha256', Str::random(40), config('app.key'));

      // 5. 存入数据库，使用 updateOrInsert 方法 来保持 Email 唯一
      DB::table('password_resets')->updateOrInsert(['email' => $email], [
        'email' => $email,
        'token' => Hash::make($token),
        'created_at' => new Carbon,
      ]);

      // 6. 发送邮件 -> 带 token 的链接
      Mail::send('emails.reset_link', compact('token'), function ($message) use ($email) {
        $message->to($email)->subject('忘记密码');
      });

      session()->flash('success', '重置密码链接已发送，请查收');
      return redirect()->back();

    }
}
