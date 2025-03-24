## tinker 操作杂记


```
 php artisan tinker
Psy Shell v0.12.7 (PHP 8.0.2 — cli) by Justin Hileman
> App\Models\User::create(['name'=>'Peihao', 'email'=>'newdiao@163.com','password'=>bcrypt('password')])
= App\Models\User {#4970
    name: "Peihao",
    email: "newdiao@163.com",
    #password: "$2y$10$GhdWave6FX9Yek7VZBugfev34xQZZoRNEJ9fkboH4D1fvrUZBX/qC",
    updated_at: "2025-03-24 07:49:49",
    created_at: "2025-03-24 07:49:49",
    id: 1,
  }

> use App\Models\User;
> User::find(1)
= App\Models\User {#4971
    id: 1,
    name: "Peihao",
    email: "newdiao@163.com",
    email_verified_at: null,
    #password: "$2y$10$GhdWave6FX9Yek7VZBugfev34xQZZoRNEJ9fkboH4D1fvrUZBX/qC",
    #remember_token: null,
    created_at: "2025-03-24 07:49:49",
    updated_at: "2025-03-24 07:49:49",
  }

> User::find(2)
= null

> User::findOrFail(2)

   Illuminate\Database\Eloquent\ModelNotFoundException  No query results for model [App\Models\User] 2.

> User::first

   Error  Undefined constant App\Models\User::first.

> User::first()
= App\Models\User {#4997
    id: 1,
    name: "Peihao",
    email: "newdiao@163.com",
    email_verified_at: null,
    #password: "$2y$10$GhdWave6FX9Yek7VZBugfev34xQZZoRNEJ9fkboH4D1fvrUZBX/qC",
    #remember_token: null,
    created_at: "2025-03-24 07:49:49",
    updated_at: "2025-03-24 07:49:49",
  }

> User::last()

   BadMethodCallException  Call to undefined method App\Models\User::last().

> User::latest();
= Illuminate\Database\Eloquent\Builder {#4984}

> User::all()
= Illuminate\Database\Eloquent\Collection {#4969
    all: [
      App\Models\User {#4970
        id: 1,
        name: "Peihao",
        email: "newdiao@163.com",
        email_verified_at: null,
        #password: "$2y$10$GhdWave6FX9Yek7VZBugfev34xQZZoRNEJ9fkboH4D1fvrUZBX/qC",
        #remember_token: null,
        created_at: "2025-03-24 07:49:49",
        updated_at: "2025-03-24 07:49:49",
      },
    ],
  }

> $user = User:first();

   PARSE ERROR  PHP Parse error: Syntax error, unexpected ':' in vendor\psy\psysh\src\Exception\ParseErrorException.php on line 44.

> $user = User::first()
= App\Models\User {#4958
    id: 1,
    name: "Peihao",
    email: "newdiao@163.com",
    email_verified_at: null,
    #password: "$2y$10$GhdWave6FX9Yek7VZBugfev34xQZZoRNEJ9fkboH4D1fvrUZBX/qC",
    #remember_token: null,
    created_at: "2025-03-24 07:49:49",
    updated_at: "2025-03-24 07:49:49",
  }

> print_r($user)
App\Models\User Object
(
    [table:protected] => users
    [fillable:protected] => Array
        (
            [0] => name
            [1] => email
            [2] => password
        )

    [hidden:protected] => Array
        (
            [0] => password
            [1] => remember_token
        )

    [casts:protected] => Array
        (
            [email_verified_at] => datetime
        )

    [connection:protected] => mysql
    [primaryKey:protected] => id
    [keyType:protected] => int
    [incrementing] => 1
    [with:protected] => Array
        (
        )

    [withCount:protected] => Array
        (
        )

    [preventsLazyLoading] =>
    [perPage:protected] => 15
    [exists] => 1
    [wasRecentlyCreated] =>
    [escapeWhenCastingToString:protected] =>
    [attributes:protected] => Array
        (
            [id] => 1
            [name] => Peihao
            [email] => newdiao@163.com
            [email_verified_at] =>
            [password] => $2y$10$GhdWave6FX9Yek7VZBugfev34xQZZoRNEJ9fkboH4D1fvrUZBX/qC
            [remember_token] =>
            [created_at] => 2025-03-24 07:49:49
            [updated_at] => 2025-03-24 07:49:49
        )

    [original:protected] => Array
        (
            [id] => 1
            [name] => Peihao
            [email] => newdiao@163.com
            [email_verified_at] =>
            [password] => $2y$10$GhdWave6FX9Yek7VZBugfev34xQZZoRNEJ9fkboH4D1fvrUZBX/qC
            [remember_token] =>
            [created_at] => 2025-03-24 07:49:49
            [updated_at] => 2025-03-24 07:49:49
        )

    [changes:protected] => Array
        (
        )

    [classCastCache:protected] => Array
        (
        )

    [attributeCastCache:protected] => Array
        (
        )

    [dates:protected] => Array
        (
        )

    [dateFormat:protected] =>
    [appends:protected] => Array
        (
        )

    [dispatchesEvents:protected] => Array
        (
        )

    [observables:protected] => Array
        (
        )

    [relations:protected] => Array
        (
        )

    [touches:protected] => Array
        (
        )

    [timestamps] => 1
    [visible:protected] => Array
        (
        )

    [guarded:protected] => Array
        (
            [0] => *
        )

    [rememberTokenName:protected] => remember_token
    [accessToken:protected] =>
)
= true

> var_dump($user)
object(App\Models\User)#4958 (32) {
  ["table":protected]=>
  string(5) "users"
  ["fillable":protected]=>
  array(3) {
    [0]=>
    string(4) "name"
    [1]=>
    string(5) "email"
    [2]=>
    string(8) "password"
  }
  ["hidden":protected]=>
  array(2) {
    [0]=>
    string(8) "password"
    [1]=>
    string(14) "remember_token"
  }
  ["casts":protected]=>
  array(1) {
    ["email_verified_at"]=>
    string(8) "datetime"
  }
  ["connection":protected]=>
  string(5) "mysql"
  ["primaryKey":protected]=>
  string(2) "id"
  ["keyType":protected]=>
  string(3) "int"
  ["incrementing"]=>
  bool(true)
  ["with":protected]=>
  array(0) {
  }
  ["withCount":protected]=>
  array(0) {
  }
  ["preventsLazyLoading"]=>
  bool(false)
  ["perPage":protected]=>
  int(15)
  ["exists"]=>
  bool(true)
  ["wasRecentlyCreated"]=>
  bool(false)
  ["escapeWhenCastingToString":protected]=>
  bool(false)
  ["attributes":protected]=>
  array(8) {
    ["id"]=>
    int(1)
    ["name"]=>
    string(6) "Peihao"
    ["email"]=>
    string(15) "newdiao@163.com"
    ["email_verified_at"]=>
    NULL
    ["password"]=>
    string(60) "$2y$10$GhdWave6FX9Yek7VZBugfev34xQZZoRNEJ9fkboH4D1fvrUZBX/qC"
    ["remember_token"]=>
    NULL
    ["created_at"]=>
    string(19) "2025-03-24 07:49:49"
    ["updated_at"]=>
    string(19) "2025-03-24 07:49:49"
  }
  ["original":protected]=>
  array(8) {
    ["id"]=>
    int(1)
    ["name"]=>
    string(6) "Peihao"
    ["email"]=>
    string(15) "newdiao@163.com"
    ["email_verified_at"]=>
    NULL
    ["password"]=>
    string(60) "$2y$10$GhdWave6FX9Yek7VZBugfev34xQZZoRNEJ9fkboH4D1fvrUZBX/qC"
    ["remember_token"]=>
    NULL
    ["created_at"]=>
    string(19) "2025-03-24 07:49:49"
    ["updated_at"]=>
    string(19) "2025-03-24 07:49:49"
  }
  ["changes":protected]=>
  array(0) {
  }
  ["classCastCache":protected]=>
  array(0) {
  }
  ["attributeCastCache":protected]=>
  array(0) {
  }
  ["dates":protected]=>
  array(0) {
  }
  ["dateFormat":protected]=>
  NULL
  ["appends":protected]=>
  array(0) {
  }
  ["dispatchesEvents":protected]=>
  array(0) {
  }
  ["observables":protected]=>
  array(0) {
  }
  ["relations":protected]=>
  array(0) {
  }
  ["touches":protected]=>
  array(0) {
  }
  ["timestamps"]=>
  bool(true)
  ["visible":protected]=>
  array(0) {
  }
  ["guarded":protected]=>
  array(1) {
    [0]=>
    string(1) "*"
  }
  ["rememberTokenName":protected]=>
  string(14) "remember_token"
  ["accessToken":protected]=>
  NULL
}
= null

> echo $user
{"id":1,"name":"Peihao","email":"newdiao@163.com","email_verified_at":null,"created_at":"2025-03-24T07:49:49.000000Z","updated_at":"2025-03-24T07:49:49.000000Z"}⏎
> print $user
{"id":1,"name":"Peihao","email":"newdiao@163.com","email_verified_at":null,"created_at":"2025-03-24T07:49:49.000000Z","updated_at":"2025-03-24T07:49:49.000000Z"}⏎
= 1

> $user->name='zhoupeihao'
= "zhoupeihao"

> User::first()
= App\Models\User {#4973
    id: 1,
    name: "Peihao",
    email: "newdiao@163.com",
    email_verified_at: null,
    #password: "$2y$10$GhdWave6FX9Yek7VZBugfev34xQZZoRNEJ9fkboH4D1fvrUZBX/qC",
    #remember_token: null,
    created_at: "2025-03-24 07:49:49",
    updated_at: "2025-03-24 07:49:49",
  }

> User::save()

   Error  Non-static method Illuminate\Database\Eloquent\Model::save() cannot be called statically.

> $user->save();
= true

> User::first()
= App\Models\User {#5351
    id: 1,
    name: "zhoupeihao",
    email: "newdiao@163.com",
    email_verified_at: null,
    #password: "$2y$10$GhdWave6FX9Yek7VZBugfev34xQZZoRNEJ9fkboH4D1fvrUZBX/qC",
    #remember_token: null,
    created_at: "2025-03-24 07:49:49",
    updated_at: "2025-03-24 07:55:37",
  }

> $user->update(['name'=>'Peihao'])
= true
```
