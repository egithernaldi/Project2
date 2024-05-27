<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\adminDomisiliController;
use App\Http\Controllers\adminSkckController;
use App\Http\Controllers\adminUmumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\biodataController;
use App\Http\Controllers\skckController;
use App\Http\Controllers\wargaController;
use App\Http\Controllers\wargaDomisiliController;
use App\Http\Controllers\wargaSkckController;
use App\Http\Controllers\wargaUmumController;
use App\Models\Contact;
use App\Models\Layanan;
use App\Models\Tentang;

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
Route::get('public/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/public/' . $folder . '/' . $filename);

    if (!file_exists($path)) {
        abort(500);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file)->header('Content-Type', $type);
})->name('show-image');


Route::get('/', function () {
    $tentangs = Tentang::all();
    $contacts = Contact::all();
    $layanans = Layanan::all();
    return view('index', [
        'title' => 'Home',
        'tentangs' => $tentangs,
        'contacts' => $contacts,
        'layanans' => $layanans,
    ]);
})->name('index');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login-show');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [registerController::class, 'index'])->name('register-show');
    Route::post('/createaccount', [registerController::class, 'store'])->name('create-account');
});


Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |----------------------
    | Route Warga
    |----------------------
    */
    Route::middleware('warga')->group(function () {
        Route::prefix('dashboard')->name('dashboard-')->group(function () {
            Route::get('/', [wargaController::class, 'index'])->name('index');
        });

        Route::prefix('biodata')->name('biodata-')->group(function () {
            Route::get('/', [biodataController::class, 'index'])->name('index');
            Route::get('/create', [biodataController::class, 'create'])->name('create');
            Route::post('/store', [biodataController::class, 'store'])->name('store');
            Route::get('/biodata/{id}/edit', [biodataController::class, 'edit'])->name('edit');
            Route::post('/biodata/{id}/update', [biodataController::class, 'update'])->name('update');
            
        });

        Route::prefix('SKCK')->name('skck-')->group(function () {
            Route::get('/', [wargaSkckController::class, 'index'])->name('index');
            Route::get('/create', [wargaSkckController::class, 'create'])->name('create');
            Route::post('/store', [wargaSkckController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [wargaSkckController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [wargaSkckController::class, 'update'])->name('update');
            Route::get('/pdf/{id}', [wargaSkckController::class, 'pdf'])->name('pdf');
        });

        Route::prefix('domisili')->name('domisili-')->group(function () {
            Route::get('/', [wargaDomisiliController::class, 'index'])->name('index');
            Route::get('/create', [wargaDomisiliController::class, 'create'])->name('create');
            Route::post('/store', [wargaDomisiliController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [wargaDomisiliController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [wargaDomisiliController::class, 'update'])->name('update');
            Route::get('/pdf/{id}', [wargaDomisiliController::class, 'pdf'])->name('pdf');
        });

        Route::prefix('umum')->name('umum-')->group(function () {
            Route::get('/', [wargaUmumController::class, 'index'])->name('index');
            Route::get('/create', [wargaUmumController::class, 'create'])->name('create');
            Route::post('/store', [wargaUmumController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [wargaUmumController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [wargaUmumController::class, 'update'])->name('update');
            Route::get('/pdf/{id}', [wargaUmumController::class, 'pdf'])->name('pdf');
        });
    });

    /*
    |----------------------
    | Route Admin
    |----------------------
    */
    Route::middleware('admin')->prefix('admin')->name('admin-')->group(function () {
        Route::prefix('dashboard')->name('dashboard-')->group(function () {
            Route::get('/', [adminController::class, 'index'])->name('index');
            
        });

        Route::prefix('user')->name('user-')->group(function () {
            Route::get('/', [adminController::class, 'user'])->name('index');
            Route::get('/edit/{id}', [adminController::class, 'edituser'])->name('edit');
            Route::post('/update/{id}', [adminController::class, 'updateuser'])->name('update');
            Route::get('/create', [adminController::class, 'createuser'])->name('create');
            Route::post('/store', [adminController::class, 'storeuser'])->name('store');
            Route::get('/delete/{id}', [adminController::class, 'deleteuser'])->name('delete');
        });

        Route::prefix('laporan')->name('laporan-')->group(function () {
            Route::get('/', [adminController::class, 'laporan'])->name('index');
            Route::get('/filter', [adminController::class, 'filter'])->name('filter');
            Route::get('/cetak', [adminController::class, 'cetak'])->name('cetak');
        });
        Route::prefix('SKCK')->name('skck-')->group(function () {
            Route::get('/', [adminSkckController::class, 'index'])->name('index');
            Route::get('/{id}', [adminSkckController::class, 'show'])->name('show');
            Route::post('/comment/{id}', [adminSkckController::class, 'comment'])->name('comment');
            Route::post('/approve/{id}', [adminSkckController::class, 'approve'])->name('approve');
            Route::post('/reject/{id}', [adminSkckController::class, 'reject'])->name('reject');
            Route::post('/revisi/{id}', [adminSkckController::class, 'revisi'])->name('revisi');
            Route::get('/pdf/{id}', [adminSkckController::class, 'pdf'])->name('pdf');
        });

        Route::prefix('domisili')->name('domisili-')->group(function () {
            Route::get('/', [adminDomisiliController::class, 'index'])->name('index');
            Route::get('/{id}', [adminDomisiliController::class, 'show'])->name('show');
            Route::post('/comment/{id}', [adminDomisiliController::class, 'comment'])->name('comment');
            Route::post('/approve/{id}', [adminDomisiliController::class, 'approve'])->name('approve');
            Route::post('/reject/{id}', [adminDomisiliController::class, 'reject'])->name('reject');
            Route::post('/revisi/{id}', [adminDomisiliController::class, 'revisi'])->name('revisi');
            Route::get('/pdf/{id}', [adminDomisiliController::class, 'pdf'])->name('pdf');
        });

        Route::prefix('umum')->name('umum-')->group(function () {
            Route::get('/', [adminUmumController::class, 'index'])->name('index');
            Route::get('/{id}', [adminUmumController::class, 'show'])->name('show');
            Route::post('/comment/{id}', [adminUmumController::class, 'comment'])->name('comment');
            Route::post('/approve/{id}', [adminUmumController::class, 'approve'])->name('approve');
            Route::post('/reject/{id}', [adminUmumController::class, 'reject'])->name('reject');
            Route::post('/revisi/{id}', [adminUmumController::class, 'revisi'])->name('revisi');
            Route::get('/pdf/{id}', [adminUmumController::class, 'pdf'])->name('pdf');
        });

        Route::prefix('layanan')->name('layanan-')->group(function () {
            Route::get('/', [adminController::class, 'indexlayanan'])->name('index');
            Route::get('/create', [adminController::class, 'createlayanan'])->name('create');
            Route::post('/store', [adminController::class, 'storelayanan'])->name('store');
            Route::get('/edit/{id}', [adminController::class, 'editlayanan'])->name('edit');
            Route::post('/update/{id}', [adminController::class, 'updatelayanan'])->name('update');
            Route::get('/destroy/{id}', [adminController::class, 'destroylayanan'])->name('destroy');
        });

        Route::prefix('tentang')->name('tentang-')->group(function () {
            Route::get('/', [adminController::class, 'indextentang'])->name('index');
            Route::get('/create', [adminController::class, 'createtentang'])->name('create');
            Route::post('/store', [adminController::class, 'storetentang'])->name('store');
            Route::get('/edit/{id}', [adminController::class, 'edittentang'])->name('edit');
            Route::post('/update/{id}', [adminController::class, 'updatetentang'])->name('update');
            Route::get('/destroy/{id}', [adminController::class, 'destroytentang'])->name('destroy');
        });
        Route::prefix('kontak')->name('kontak-')->group(function () {
            Route::get('/edit', [adminController::class, 'editkontak'])->name('index');
            Route::post('/update', [adminController::class, 'updatekontak'])->name('update');
        });

    });
});
