<?php

use App\Livewire\Stage2;
use App\Livewire\StageComponent;

use App\Livewire\ProjetComponent;
use App\Livewire\RegisterComponent;
use App\Livewire\DashboardComponent;
use App\Livewire\OrganismeComponent;
use App\Livewire\ProgrammeComponent;
use App\Livewire\OffreStageComponent;
use App\Livewire\SoutenanceComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Livewire\LigneProgrammeComponent;
use App\Http\Controllers\ProfileController;
use App\Livewire\CooperativeAdminComponent;

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

//
Route::get("/",function(){
    return view("pageCommerciale.accueil");
})->name('welcome');
// Route::get("/inscription",function(){
//     return view("auth.register_coop");
// })->name('inscription');

Route::get("/inscription",RegisterComponent::class)->middleware('guest')->name('inscription');
Route::get("/testwelcome",function(){
    return view("testWelcome");
})->name('welcome2');
Route::get("/dashboard", DashboardComponent::class)->middleware('auth')->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::group([
    //pour gérer les organismes
    "middleware" => ["auth"],
    ], function () {
    Route::group(
        [
            "prefix" => "organismes",
        ],
        function () {
            Route::get("/liste", OrganismeComponent::class)->name('organisme.index');
        }
    );
});
Route::group([
    //pour gérer les programmes
    "middleware" => ["auth"],
    ], function () {
    Route::group(
        [
            "prefix" => "programmes",
        ],
        function () {
            Route::get("/liste", ProgrammeComponent::class)->name('programme.index');
            Route::get("/ligne", LigneProgrammeComponent::class)->name('ligneprogramme.index');
        }
    );
});

