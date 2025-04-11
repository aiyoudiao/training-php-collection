<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function boot() {
      parent::boot();

      static::creating(function ($user) {
        $user->activation_token = Str::random(10);
      });
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's Gravatar URL.
     *
     * @param string $size
     * @return void
     */
    public function gravatar(string $size = '100') {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://www.gravatar.com/avatar/$hash?s=$size";
    }

    public function statuses() {
      return $this->hasMany(Status::class);
    }

    public function feed() {
      return $this->statuses()->orderBy('created_at', 'desc');
    }

    /**
     * 获取当前用户的粉丝
     */
    public function followers() {
      return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    /**
     * 获取当前用户关注的用户
     * NOTE: https://learnku.com/courses/laravel-essential-training/8.x/fan-data-table/9860
     */
    public function followings() {
      return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    /**
     * 关注用户
     */
    public function follow($user_ids) {
      if (!is_array($user_ids)) {
        $user_ids = compact('user_ids');
      }

      // 不会出现重复关注用户的情况
      $this->followings()->sync($user_ids, false);
    }

     /**
     * 取消已关注的用户
     */
    public function unfollow($user_ids) {
      if (!is_array($user_ids)){
        $user_ids = compact('user_ids');
      }
      $this->followings()->detach($user_ids);
    }

    /**
     * 检查当前用户是否关注了某个用户
     */
    public function isFollowing($user_id) {
      return $this->followings->contains($user_id);
    }

}
