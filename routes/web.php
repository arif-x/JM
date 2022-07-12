<?php

use Illuminate\Support\Facades\Route;
use App\Models\Universitas;

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
    $universitas = Universitas::pluck('nama_universitas', 'id_universitas');
    return view('index', compact('universitas'));
});

Auth::routes(['verify' => true]);


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'admin',
], function(){ 
    Route::group([
        'namespace' => 'Auth',
    ], function(){
        Route::get('login', 'AdminAuthController@getLogin')->name('adminLogin');
        Route::post('login', 'AdminAuthController@postLogin')->name('adminLoginPost');
        Route::get('logout', 'AdminAuthController@logout')->name('adminLogout');
    });
});

Route::group([
    'prefix' => 'admin',
    'middleware' => ['adminauth']
], function(){ 
    Route::group(['prefix' => 'filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Route::group([
    'prefix' => 'admin-soal',
    'middleware' => ['adminauth', 'adminsoal']
], function(){ 
    Route::group([
        'namespace' => 'AdminSoal',
    ], function(){
        Route::get('dashboard', 'DashboardController@dashboard')->name('admin-soal.dashboard');
        Route::group([
            'prefix' => 'materi'
        ], function(){
            Route::resource('materi', 'MateriController', ['as' => 'admin-soal.materi']);  
        });
        Route::group([
            'prefix' => 'latihan'
        ], function(){
            Route::resource('soal', 'SoalLatihanController', ['as' => 'admin-soal.latihan']);
            Route::group([
                'namespace' => 'Excel\Import',
                'prefix' => 'import'
            ], function(){
                Route::post('/', 'SoalLatihanController@importExcel')->name('admin-soal.latihan.import');
            });  
        });
        Route::group([
            'prefix' => 'tryout'
        ], function(){
            Route::resource('soal', 'SoalTryoutController', ['as' => 'admin-soal.tryout']);  
            Route::group([
                'namespace' => 'Excel\Import',
                'prefix' => 'import'
            ], function(){
                Route::post('/', 'SoalTryoutController@importExcel')->name('admin-soal.tryout.import');
            });  
        });
        Route::group([
            'prefix' => 'event-tryout'
        ], function(){
            Route::resource('soal', 'SoalTryoutEventController', ['as' => 'admin-soal.event-tryout']);  
            Route::group([
                'namespace' => 'Excel\Import',
                'prefix' => 'import'
            ], function(){
                Route::post('/', 'SoalTryoutEventController@importExcel')->name('admin-soal.event-tryout.import');
            });  
        });
        Route::group([
            'prefix' => 'data'
        ], function(){
            Route::get('get-sub-jenis-soal/{id}', 'DataController@getSubJenisSoal')->name('admin.data.get-sub-jenis-soal');
        });
    });
});


Route::group([
    'prefix' => 'admin',
    'middleware' => ['adminauth', 'superadmin']
], function(){ 
    Route::group([
        'namespace' => 'Admin',
    ], function(){
        Route::get('dashboard', 'DashboardController@dashboard')->name('admin.dashboard');
        Route::resource('paket', 'PaketController', ['as' => 'admin']);
        Route::resource('kategori', 'KategoriController', ['as' => 'admin']);
        Route::resource('jenis-kampus', 'JenisKampusController', ['as' => 'admin']);
        Route::resource('universitas', 'UniversitasController', ['as' => 'admin']);
        Route::resource('jenis-view-soal', 'JenisViewSoalController', ['as' => 'admin']);
        Route::resource('jenis-soal', 'JenisSoalController', ['as' => 'admin']);
        Route::resource('slider-besar', 'SliderBesarController', ['as' => 'admin']);
        Route::resource('slider-kecil', 'SliderKecilController', ['as' => 'admin']);
        Route::group([
            'prefix' => 'materi'
        ], function(){
            Route::resource('label-materi', 'LabelMateriController', ['as' => 'admin.materi']);
            Route::resource('materi', 'MateriController', ['as' => 'admin.materi']);  
        });
        Route::group([
            'prefix' => 'latihan'
        ], function(){
            Route::resource('label-soal', 'LabelSoalLatihanController', ['as' => 'admin.latihan']);
            Route::resource('soal', 'SoalLatihanController', ['as' => 'admin.latihan']);
            Route::group([
                'namespace' => 'Excel\Import',
                'prefix' => 'import'
            ], function(){
                Route::post('/', 'SoalLatihanController@importExcel')->name('admin.latihan.import');
            });  
        });
        Route::group([
            'prefix' => 'tryout'
        ], function(){
            Route::resource('label-soal', 'LabelSoalTryoutController', ['as' => 'admin.tryout']);
            Route::resource('soal', 'SoalTryoutController', ['as' => 'admin.tryout']);  
            Route::group([
                'namespace' => 'Excel\Import',
                'prefix' => 'import'
            ], function(){
                Route::post('/', 'SoalTryoutController@importExcel')->name('admin.tryout.import');
            });  
        });
        Route::group([
            'prefix' => 'event-tryout'
        ], function(){
            Route::resource('label-soal', 'LabelSoalTryoutEventController', ['as' => 'admin.event-tryout']);
            Route::resource('soal', 'SoalTryoutEventController', ['as' => 'admin.event-tryout']);  
            Route::group([
                'namespace' => 'Excel\Import',
                'prefix' => 'import'
            ], function(){
                Route::post('/', 'SoalTryoutEventController@importExcel')->name('admin.event-tryout.import');
            });  
        });
        Route::resource('pembayaran', 'PembayaranController', ['as' => 'admin']);
        Route::resource('rekening', 'RekeningController', ['as' => 'admin']);
        Route::resource('kontak', 'KontakController', ['as' => 'admin']);
        Route::group([
            'prefix' => 'data'
        ], function(){
            Route::get('get-sub-jenis-soal/{id}', 'DataController@getSubJenisSoal')->name('admin.data.get-sub-jenis-soal');
        });
    });
});


    Route::group([
        'namespace' => 'User',
        'prefix' => 'user',
        'middleware' => ['auth', 'verified'],
    ], function(){ 
        Route::get('/dashboard', 'DashboardController@index')->name('user.dashboard');

        Route::group([
            'prefix' => 'materi'
        ], function(){
            Route::get('/text', 'MateriController@indexText')->name('user.materi.text');
            Route::get('/text/{slug}', 'MateriController@singleText')->name('user.materi.text.single');
            Route::get('/video', 'MateriController@indexVideo')->name('user.materi.video');
            Route::get('/video/{slug}', 'MateriController@singleVideo')->name('user.materi.video.single');
        });


        Route::group([
            'prefix' => 'latihan'
        ], function(){
            Route::get('/', 'LatihanController@index')->name('user.latihan');
            Route::get('/persiapan/{slug}', 'LatihanController@ready')->name('user.latihan.ready');
            Route::post('/persiapan/{slug}', 'LatihanController@ready')->name('user.latihan.ready.post');
            Route::get('/kerjakan/{slug}', 'LatihanController@kerjakan')->name('user.latihan.kerjakan');
            Route::get('/first-soal/{id}', 'LatihanController@firstSoal')->name('user.latihan.soal.first');
            Route::get('/get-soal/{id}', 'LatihanController@getSoal')->name('user.latihan.soal.single');
            Route::get('/get-jawaban/{id}', 'LatihanController@getJawaban')->name('user.latihan.soal.jawaban');
            Route::get('/get-all-jawaban', 'LatihanController@getAllJawaban')->name('user.latihan.soal.jawaban.all');
            Route::post('/store', 'LatihanController@store')->name('user.latihan.store');
            Route::post('/cancel', 'LatihanController@cancel')->name('user.latihan.cancel');
            Route::get('/cancel', 'LatihanController@cancel')->name('user.latihan.cancel');
            Route::post('/persiapan/{slug}', 'LatihanController@cancelAndContinue')->name('user.latihan.cancel-and-continue');
            Route::post('/finish', 'LatihanController@finish')->name('user.latihan.finish');
            Route::post('/report', 'LatihanController@report')->name('user.latihan.report');
            Route::post('/report-pembahasan', 'LatihanController@reportPembahasan')->name('user.latihan.report.pembahasan');
            Route::get('/pembahasan/{slug}', 'LatihanController@pembahasanIndex')->name('user.latihan.pembahasan.index');
            Route::get('/pembahasan/soal/{slug}', 'LatihanController@pembahasan')->name('user.latihan.pembahasan');
        });

        Route::group([
            'prefix' => 'tryout'
        ], function(){
            Route::get('/', 'TryoutController@index')->name('user.tryout');
            Route::get('/persiapan/{slug}', 'TryoutController@ready')->name('user.tryout.ready');
            Route::post('/persiapan/{slug}', 'TryoutController@ready')->name('user.tryout.ready.post');
            Route::get('/kerjakan/{slug}', 'TryoutController@kerjakan')->name('user.tryout.kerjakan');
            Route::get('/first-soal/{id}', 'TryoutController@firstSoal')->name('user.tryout.soal.first');
            Route::get('/get-soal/{id}', 'TryoutController@getSoal')->name('user.tryout.soal.single');
            Route::get('/get-jawaban/{id}', 'TryoutController@getJawaban')->name('user.tryout.soal.jawaban');
            Route::get('/get-all-jawaban', 'TryoutController@getAllJawaban')->name('user.tryout.soal.jawaban.all');
            Route::post('/store', 'TryoutController@store')->name('user.tryout.store');
            Route::post('/cancel', 'TryoutController@cancel')->name('user.tryout.cancel');
            Route::get('/cancel', 'TryoutController@cancel')->name('user.tryout.cancel');
            Route::post('/finish', 'TryoutController@finish')->name('user.tryout.finish');
            Route::post('/report', 'TryoutController@report')->name('user.tryout.report');
            Route::post('/report-pembahasan', 'TryoutController@reportPembahasan')->name('user.tryout.report.pembahasan');
            Route::get('/pembahasan/{slug}', 'TryoutController@pembahasanIndex')->name('user.tryout.pembahasan.index');
            Route::get('/pembahasan/soal/{slug}', 'TryoutController@pembahasan')->name('user.tryout.pembahasan');
        });

        Route::group([
            'prefix' => 'event-tryout'
        ], function(){
            Route::get('/', 'TryoutEventController@index')->name('user.event-tryout');
            Route::get('/persiapan/{slug}', 'TryoutEventController@ready')->name('user.event-tryout.ready');
            Route::post('/persiapan/{slug}', 'TryoutEventController@ready')->name('user.event-tryout.ready.post');
            Route::post('/kerjakan/{slug}', 'TryoutEventController@kerjakan')->name('user.event-tryout.kerjakan');
            Route::get('/first-soal/{id}', 'TryoutEventController@firstSoal')->name('user.event-tryout.soal.first');
            Route::get('/get-soal/{id}', 'TryoutEventController@getSoal')->name('user.event-tryout.soal.single');
            Route::get('/get-jawaban/{id}', 'TryoutEventController@getJawaban')->name('user.event-tryout.soal.jawaban');
            Route::get('/get-all-jawaban', 'TryoutEventController@getAllJawaban')->name('user.event-tryout.soal.jawaban.all');
            Route::post('/store', 'TryoutEventController@store')->name('user.event-tryout.store');
            Route::post('/cancel', 'TryoutEventController@cancel')->name('user.event-tryout.cancel');
            Route::get('/cancel', 'TryoutEventController@cancel')->name('user.event-tryout.cancel');
            Route::post('/finish', 'TryoutEventController@finish')->name('user.event-tryout.finish');
            Route::post('/report', 'TryoutEventController@report')->name('user.event-tryout.report');
            Route::post('/report-pembahasan', 'TryoutEventController@reportPembahasan')->name('user.event-tryout.report.pembahasan');
            Route::get('/pembahasan/{slug}', 'TryoutEventController@pembahasanIndex')->name('user.event-tryout.pembahasan.index');
            Route::get('/pembahasan/soal/{slug}', 'TryoutEventController@pembahasan')->name('user.event-tryout.pembahasan');
        });

        Route::get('/hasil-latihan', 'LatihanController@hasilLatihan')->name('user.latihan.hasil');
        Route::get('/hasil-tryout', 'TryoutController@hasilTryout')->name('user.tryout.hasil');
        Route::get('/hasil-event-tryout/{slug}', 'TryoutEventController@hasilTryout')->name('user.event-tryout.hasil');

        Route::group([
            'prefix' => 'paket'
        ], function(){
            Route::get('/', 'PaketController@index')->name('user.paket');
            Route::get('/{id_paket}', 'PaketController@getPaket')->name('user.paket.get-paket');
            Route::post('/pesan', 'PaketController@store')->name('user.paket.pesan');
        });
        Route::group([
            'prefix' => 'invoice'
        ], function(){
            Route::get('/', 'InvoiceController@index')->name('user.invoice');
            Route::get('/{id_keranjang}', 'InvoiceController@getKeranjang')->name('user.invoice.get-keranjang');
            Route::post('/bayar', 'InvoiceController@store')->name('user.invoice.bayar');
        });
        Route::group([
            'prefix' => 'profil'
        ], function(){
            Route::get('/', 'ProfilController@index')->name('user.profil');
            Route::post('/update-user-data', 'ProfilController@storeProfil')->name('user.profil.profil');
            Route::post('/update-password', 'ProfilController@storePassword')->name('user.profil.password');
        });
    });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');

Route::post('/finish', 'User\TryoutController@finish');