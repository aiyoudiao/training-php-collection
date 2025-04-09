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

  public function __construct () {
    $this->middleware('throttle:2,1',[
      'only' => ['showLinkRequestForm']
    ]);

    $this->middleware('throttle:3,10',[
      'only'=>['sendResetLinkEmail']
    ]);
  }

    // 显示重置密码请求表单
    public function showLinkRequestForm() {
      return view('auth.passwords.email');
    }

    // 发送重置密码链接
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

    public function showResetForm(Request $request){
      $token = $request->route()->parameter('token');
      return view('auth.passwords.reset', compact('token'));
    }

    public function reset(Request $request) {
      // 1. 验证数据合规性
      $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
      ]);
      $email = $request->email;
      $token = $request->token;
      // 找回密码链接的有效时间
      $expires = 60 * 10; // 10分钟

      // 2. 获取对应用户
      $user = User::where('email', $email)->first();

      // 3. 如果不存在
      if(is_null($user)){
        session()->flash('danger', '邮箱未注册');
        return redirect()->back()->withInput();
      }

      // 4. 读取重置的记录
      $record = (array) DB::table('password_resets')->where('email', $email)->first();

      // 5. 如果记录存在
      if ($record) {
        // 5.1 检查是否过期
        if(Carbon::parse($record['created_at'])->addSeconds($expires)->isPast()) {
          session()->flash('danger', '链接已过期，请重新尝试');
          return redirect()->back();
        }

        // 5.2 检查是否正确
        if(!Hash::check($token, $record['token'])) {
          session()->flash('danger', '令牌不正确，请重新尝试');
          return redirect()->back();
        }

        // 5.3 一切正常，更新用户密码
        $user->update(['password' => bcrypt($request->password)]);

        // 5.4 提示用户更新成功
        session()->flash('success', '密码已重置成功，请重新登录');
        return redirect()->route('login');
      }

      // 6. 如果记录不存在
      session()->flash('danger', '未找到重置记录，请重新尝试');
      return redirect()->back();
    }
}
