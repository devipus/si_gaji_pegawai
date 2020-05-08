<?php

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
	
	/**
	 * This from original Router Laravel
	 */
	// Auth::routes();

	Route::resource('karyawan', 'KaryawanController');

	Route::get ('profile/{nama}/{kelas}', function($nama, $kelas){
		return view('profile')
		-> with ('var_nama', $nama)
		-> with ('var_kelas', $kelas);
	});

	Route::resource('mahasiswa', 'MahasiswaController');

	/**
	 * Login Router
	 */
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\LoginController@login')->name('login.submit');

	/**
	 * Logout Route
	 */
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

	/**
	 * Registration Routes
	 */
	$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	$this->post('register', 'Auth\RegisterController@register');

	/**
	 * Password Reset Routes
	 */
	$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
	$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
	$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
	$this->post('password/reset', 'Auth\ResetPasswordController@reset');

	/**
	 * Router For HomeController
	 */
	Route::get('/home', 'HomeController@index')->name('home');

	Route::group(['prefix' => 'admin'], function(){
		Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
		Route::get('/', 'AdminController@index')->name('admin.home');
		Route::get('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');

		
	});
	
	Route::resource('/dosen', 'DosenController');
	Route::get('/api/dosen', 'DosenController@apiDosen')->name('api.dosen');

	Route::resource('golongan', 'GolonganController');
	Route::get('api/golongan', 'GolonganController@apiGolongan')->name('api.golongan');

	Route::resource('pangkat', 'PangkatController');
	Route::get('api/pangkat', 'PangkatController@apiPangkat')->name('api.pangkat');

	Route::resource('honor', 'HonorController');
	Route::get('api/honor', 'HonorController@apiHonor')->name('api.honor');

	Route::resource('pajak', 'PajakController');
	Route::get('api/pajak', 'PajakController@apiPajak')->name('api.pajak');

	Route::resource('mengajar', 'MengajarController');
	Route::get('api/mengajar', 'MengajarController@apiMengajar')->name('api.mengajar');

	Route::resource('kelas', 'KelasController');
	Route::get('api/kelas', 'KelasController@apiKelas')->name('api.kelas');

	Route::resource('jurusan', 'JurusanController');
	Route::get('api/jurusan', 'JurusanController@apiJurusan')->name('api.jurusan');
	Route::get('jurusanexport', 'JurusanController@dataExport')->name('jurusan.export');
	Route::post('import', 'JurusanController@dataImport')->name('jurusan.import');

	Route::resource('matkul', 'MatkulController');
	Route::get('api/matkul', 'MatkulController@apiMatkul')->name('api.matkul');

	Route::resource('penggajian', 'PenggajianController');
	Route::get('api/penggajian', 'PenggajianController@apiPenggajian')->name('api.penggajian');

	Route::resource('laporan', 'LaporanController');
	Route::get('api/laporan', 'LaporanController@apiPenggajian')->name('api.laporan');

	Route::get('exportsemua', 'LaporanController@penggajianExport')->name('laporan.export');

	Route::get('export', 'DosenController@dosenExport')->name('dosen.export');

	Route::get('uploadfile', 'UploadController@index');
	Route::post('uploadfile', 'UploadController@insert');

	Route::resource('lpd', 'LpdController');
	Route::get('api/lpd', 'LpdController@apiLpd')->name('api.lpd');
	Route::post('import', 'LpdController@dataImport')->name('lpd.import');
	Route::get('lpdexport', 'LpdController@dataExport')->name('lpd.export');
