<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
      // \App\Models\User::factory(10)->create();
    User::factory()->count(50)->create();

    $user = User::find(1);
    $user->name = 'Peihao';
    $user->email = 'newdiao@163.com';
    $user->password = bcrypt('123456');
    $user->is_admin = true;
    $user->save();
  }
}
