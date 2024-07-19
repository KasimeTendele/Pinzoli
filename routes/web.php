<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\DeadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserControllerw;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('users.index');
// });
Route::get('/',[UserControllerw::class,'index'])->name('index');

// Route::get('users/dashboard', function () {
//     return view('users/dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','role:admin'])->group(function(){
    $idRegex='[0-9]+';
    Route::get('admin/notification',[adminController::class,'notification'])->name('notification');
    Route::get('admin/dashboard',[adminController::class,'index'])->name('admin.dashoard');
    Route::get('admin/adminProfile',[adminController::class,'profile'])->name('admin.profile');
    Route::get('admin/adminUser',[adminController::class,'user'])->name('gestUser');
    Route::post('admin/modification',[DeadController::class,'updateDead'])->name('updateDead');

    Route::get('admin/adminDefunt',[adminController::class,'defunt'])->name('gestDefunt');
    Route::get('admin/adminCim{cimetiere}',[adminController::class,'cimetiere'])->name('gestCim');
    Route::post('admin/updateCim/',[adminController::class,'updateCim'])->name('updateCim');
    Route::post('admin/addCim/',[adminController::class,'addCim'])->name('addCim');
    Route::get('admin/adminiser/{user}',[adminController::class,'adminiser'])->where(['user'=>$idRegex])->name('adminiser');
    Route::get('admin/updater/{defunt}',[DeadController::class,'callUpdater'])->where(['defunt'=>$idRegex])->name('callUpdater');
    Route::post('/destroyNotification',[adminController::class,'destroyNotification'])->name('destroyNotification');


});
Route::middleware(['auth','role:user'])->group(function(){
    Route::get('users/dashboard',[UserControllerw::class,'dashboard'])->name("user.dashboard");
Route::get('/createDead',[DeadController::class,'create'])->name('createDead');
Route::post('/createDeads',[DeadController::class,'storeDead'])->name('storeDead');
// Route::post('/hommage',[UserControllerw::class,'addHommage'])->name('addHommage');



});
$idRegex='[0-9]+';
Route::post('/hommage',[UserControllerw::class,'addHommage'])->name('addHommage');
Route::post('/storeMessage',[UserControllerw::class,'storeMessage'])->name("storeMessage");

Route::post('users/store',[UserControllerw::class,'store'])->name('storeUser');
Route::get('/signUp',[UserControllerw::class,'createUser'])->name('createUser');
Route::get('/addFamille',[UserControllerw::class,'createFamille'])->name('createFamille');
Route::post('/storeFamille',[UserControllerw::class,'storeFamille'])->name('storeFamille');
Route::delete('/userLogout',[UserControllerw::class,'userLogout'])->name('userLogout');
Route::get('/defuntAll',[DeadController::class,'all'])->name('defunts');
Route::get('/oraison/{defunt}',[DeadController::class,'readOraison'])->name('oraison');
Route::get('/oraison',[UserControllerw::class,'espace'])->name('espace');
Route::get('/defunt/{Defunt}',[DeadController::class,'show'])->where(['Defunt'=>$idRegex])->name('defunt.show');
Route::get('/testRecorder',[DeadController::class,'recorder'])->name('recorder');
Route::post('/traitement',[DeadController::class,'traitement'])->name('traitement');


require __DIR__.'/auth.php';
