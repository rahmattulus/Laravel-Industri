<?php

use App\Helpers\Regist;
use App\Http\Controllers\CinemaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Repository\UserRepository;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (session('errors')) {
        return session('errors');
    }
    return view('welcome');
    // return ('Welcome to Laravel 10');
});

// Helpers
Route::get('/Regist', function(Request $request){
    $validated = $request->validate([
        'name' => 'required',
        'phone' => 'required'
    ]);
    $name = $validated['name'];
    $phone = $validated['phone'];

     return Regist::formulir($name, $phone);
});

// middleware
Route::get('/ferifikasi', function(){
    return "Welcome Middleware";
})->middleware('confirm.date');

Route::controller(UserController::class)
    ->prefix('users')
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/update', 'update');
        Route::get('/delete', 'delete');
    });
    

// SESSION
Route::get('get-session', function () {
    // $name = $_GET['name'];
    // $value = $_GET['value'];

    // Session::put($name, $value);
    // session()->put('user', 'eko');
    // $out = session()->get('user');
    // return $out;
});

// 
Route::get('/form-login', function(){
    return view('login');
});

Route::post('/login', function(Request $request){
    $validated = Validator::make($request->all(),[
        'username' => 'required',
        'password' => 'required',
    ]);

    if ($validated->fails()) {
        return redirect('/form-login')
            ->withErrors($validated)
            ->withInput();
    }

    $datauser = $request->only('username', 'password');

    $request->session()->put('user', $datauser['username']);
    return redirect('/user-details');
});

Route::middleware('login.verif')->group(function () {
    Route::get('/user-details', function(Request $request) {
        $user = $request->session()->get('user');
        return "Hello " . $user ." Selamat telah berhasil Log-In";
        
    });
});


// Route::get('/userlist', function(Request $request){
//     if ($request->session()->has('user')) {
//         $user = $request->session()->get('user');
//         return "Details user : ".$user;
//     }
//     return redirect('/form-login');
// })->middleware('login.verif');


// 


// Route parameter dinamis
Route::get('/hallo/{name}', function($name){
    return "Hallo $name";
});


// Language
Route::get('/Local/{bahasa}', function($bahasa){
    App::setLocale($bahasa);
    return __('welcome');
});


// Tamplatting
Route::get('blog/{lang?}', function($lang = 'en'){
    App::setLocale($lang, request()->segment(2));
    return view('components/frontend');
});
Route::get('blog/articel/{lang?}', function($lang = 'en'){
    App::setLocale(request()->segment(3));
    return view('components/articel');
})->name('articel');

// Route::get('blog/{lang?}', function($lang = 'en'){
//     App::setLocale($lang);
//     return view('components/frontend');
// });
// Route::get('blog/articel/{lang?}', function($lang = 'en'){
//     App::setLocale($lang);
//     return view('components/articel');
// });
// Route::get('blog/{lang}', [UserController::class, 'show']);
// Route::view('blog', 'components/frontend');
// Route::group(['prefix' => 'blog/{lang}'], function () {
//     Route::get('/', function ($lang) {
//         App::setLocale($lang);
//         return view('components/frontend');
//     });
//     Route::get('/articel', function ($lang) {
//         App::setLocale($lang);
//         return view('components/articel');
//     });
// });


// Hashing
Route::get('hash', function(){

    $password = "09876";
    $encrypPass = Hash::make($password);

    return[
        '$encrypPass' => $encrypPass,
        "CHECK" => Hash::check('09876', $encrypPass)
    ];
});

// Encryptsion
// Route::get('encrypt',function(){
// });


// File Upload
Route::view('file-upload', 'file-upload');

Route::post('post-file-upload', function(Request $request){
    // dd($request->profile);
    $upload = Storage::put('image',$request->profile);
    return asset("storage/{$upload}");
});

// Repository & service patern
Route::get("repository", function(UserRepository $userRepo){
    return $userRepo->FechAll();
});

Route::get('service', function(UserService $userServ){
    return $userServ->FechAll();
});

// Tugas 10
Route::view('addfilm', 'cinema');
Route::post('post-datafilm', [CinemaController::class, 'store']);



// Commit Git
Route::get('gitHub', function(){
    return "Ini Route for Commit GitHub";
});