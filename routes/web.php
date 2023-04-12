<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CatelogController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('dashboard/create-member', [MemberController::class, 'create'])->name('create-member');
    Route::get('dashboard/member-detail', [MemberController::class, 'index'])->name('member-detail');
    Route::get('dashboard/delete-member/{id}', [MemberController::class, 'destroy'])->name('delete-member');
    Route::get('dashboard/edit-member/{id}', [MemberController::class, 'show'])->name('edit-member');
    Route::put('dashboard/edit-member', [MemberController::class, 'edit'])->name('update-member');


    Route::get('search', [MemberController::class, 'search'])->name('search');

    Route::get('dashboard/create-catelog', [CatelogController::class, 'index'])->name('create-catelog');
});
