<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/unauthorized', function () {
  $title = 'Unauthorized';
  return view('errorpage.401', compact('title'));
});


Route::get('/', 'AuthController@index')->name('login');
Route::post('/', 'AuthController@store')->name('login');
Route::post('/settingtapel', 'AuthController@setting_tapel')->name('setting.tapel');

Route::group(['middleware' => ['auth']], function () {

  Route::get('/logout', 'AuthController@logout')->name('logout');
  Route::get('/password', 'AuthController@view_ganti_password')->name('gantipassword');
  Route::post('/password', 'AuthController@ganti_password')->name('gantipassword');

  Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

  // Route User Admin 
  Route::group(['middleware' => 'checkRole:1'], function () {
    Route::group(['prefix' => 'admin'], function () {
      Route::get('user/export', 'Admin\UserController@export')->name('user.export');
      Route::resource('user', 'Admin\UserController',  [
        'uses' => ['index', 'store', 'update']
      ]);

      Route::resource('sekolah', 'Admin\SekolahController',  [
        'uses' => ['index', 'update']
      ]);

      Route::get('guru/export', 'Admin\GuruController@export')->name('guru.export');
      Route::get('guru/import', 'Admin\GuruController@format_import')->name('guru.format_import');
      Route::post('guru/import', 'Admin\GuruController@import')->name('guru.import');
      Route::resource('guru', 'Admin\GuruController',  [
        'uses' => ['index', 'store', 'update', 'destroy']
      ]);

      Route::resource('tapel', 'Admin\TapelController',  [
        'uses' => ['index', 'store']
      ]);

      Route::post('kelas/anggota', 'Admin\KelasController@store_anggota')->name('kelas.anggota');
      Route::delete('kelas/anggota/{anggota}', 'Admin\KelasController@delete_anggota')->name('kelas.anggota.delete');
      Route::resource('kelas', 'Admin\KelasController',  [
        'uses' => ['index', 'store', 'show', 'destroy']
      ]);

      Route::get('siswa/export', 'Admin\SiswaController@export')->name('siswa.export');
      Route::get('siswa/import', 'Admin\SiswaController@format_import')->name('siswa.format_import');
      Route::post('siswa/import', 'Admin\SiswaController@import')->name('siswa.import');
      Route::post('siswa/registrasi', 'Admin\SiswaController@registrasi')->name('siswa.registrasi');
      Route::resource('siswa', 'Admin\SiswaController',  [
        'uses' => ['index', 'store', 'update', 'destroy']
      ]);

      Route::get('mapel/import', 'Admin\MapelController@format_import')->name('mapel.format_import');
      Route::post('mapel/import', 'Admin\MapelController@import')->name('mapel.import');
      Route::resource('mapel', 'Admin\MapelController',  [
        'uses' => ['index', 'store', 'update', 'destroy']
      ]);
      Route::resource('mapel', 'Admin\MapelController',  [
        'uses' => ['index', 'store', 'update', 'destroy']
      ]);

      Route::get('pembelajaran/export', 'Admin\PembelajaranController@export')->name('pembelajaran.export');
      Route::post('pembelajaran/settings', 'Admin\PembelajaranController@settings')->name('pembelajaran.settings');
      Route::resource('pembelajaran', 'Admin\PembelajaranController',  [
        'uses' => ['index', 'store']
      ]);

      Route::post('ekstrakulikuler/anggota', 'Admin\EkstrakulikulerController@store_anggota')->name('ekstrakulikuler.anggota');
      Route::delete('ekstrakulikuler/anggota/{anggota}', 'Admin\EkstrakulikulerController@delete_anggota')->name('ekstrakulikuler.anggota.delete');
      Route::resource('ekstrakulikuler', 'Admin\EkstrakulikulerController',  [
        'uses' => ['index', 'store', 'show', 'destroy']
      ]);

      // Raport K13 Admin
      Route::group(['middleware' => 'checkKurikulum:2013'], function () {

        Route::resource('k13mapping', 'Admin\K13\MapingMapelController',  [
          'uses' => ['index', 'store']
        ]);

        Route::get('getKelas/ajax/{id}', 'AjaxController@ajax_kelas');

        Route::get('k13kkm/import', 'Admin\K13\KkmMapelController@format_import')->name('k13kkm.format_import');
        Route::post('k13kkm/import', 'Admin\K13\KkmMapelController@import')->name('k13kkm.import');
        Route::resource('k13kkm', 'Admin\K13\KkmMapelController',  [
          'uses' => ['index', 'store', 'update', 'destroy']
        ]);

        Route::resource('k13interval', 'Admin\K13\IntervalPredikatController',  [
          'uses' => ['index']
        ]);

        // Lanjut ke proses import kkm
      });
      // End  Raport K13 Admin

      // Raport KTPS Admin
      Route::group(['middleware' => 'checkKurikulum:2006'], function () {

        // Route::resource('k13mapping', 'Admin\K13\MapingMapelController',  [
        //   'uses' => ['index', 'store', 'destroy']
        // ]);

      });
      // End  Raport KTPS Admin

    });
  });
  // End Route User Admin 

});
