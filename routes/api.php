<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Post;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::apiResource('posts', 'PostController');

Route::get('/user-create', function(Request $request){
    User::create([
        'name'=> 'zeyad',
        'email'=>'zeyad@gmail.com',
        'password'=>Hash::make('password')
    ]);
});

Route::post('/login', function(){
    $credentials = request()->only(['email', 'password']);
    $token = auth()->attempt($credentials);
    return $token;
});

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});
