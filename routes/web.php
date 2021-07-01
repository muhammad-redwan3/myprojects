<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::group([
//     'prefix' => LaravelLocalization::setLocale(),
//     'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
// ], function () {
Auth::routes();
Route::get('/', function () {

    if (auth()->user()) {
        return view('home');
    } else {
        return view('auth/login');
    }
});

Route::resource('/projects', ProjectController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/projects/{project}/tasks', [TaskController::class, 'store']);
Route::patch('/projects/{project}/tasks/{task}', [TaskController::class, 'updata']);
Route::delete('/projects/{project}/tasks/{task}', [TaskController::class, 'destroy']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::patch('/profile', [ProfileController::class, 'update'])->middleware('auth');
// });
//في هذا المورد يمكننا الوصول إلى جميع المسارات الخاصة بالتعديل والإنشاء والحذف والتي موجودة في الكلاس 
//    هي المسؤولة عن استنثاق اليوزauth وتعد الدالة middleware وهي التي يمكنك من خلالها منع وصول الشخص إلى أي تفصيل في المشروع قبل تسجيل الدخول من حسابه
