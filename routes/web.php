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

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('patients')->name('patients/')->group(static function () {
            Route::get('/',                                             'PatientController@index')->name('index');
            Route::get('/create',                                       'PatientController@create')->name('create');
            Route::post('/',                                            'PatientController@store')->name('store');
            Route::get('/{patient}/edit',                               'PatientController@edit')->name('edit');
            Route::post('/{patient}',                                   'PatientController@update')->name('update');
            Route::delete('/{patient}',                                 'PatientController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('secretaries')->name('secretaries/')->group(static function () {
            Route::get('/',                                             'SecretaryController@index')->name('index');
            Route::get('/create',                                       'SecretaryController@create')->name('create');
            Route::post('/',                                            'SecretaryController@store')->name('store');
            Route::get('/{secretary}/edit',                             'SecretaryController@edit')->name('edit');
            Route::post('/{secretary}',                                 'SecretaryController@update')->name('update');
            Route::delete('/{secretary}',                               'SecretaryController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('dentists')->name('dentists/')->group(static function () {
            Route::get('/',                                             'DentistController@index')->name('index');
            Route::get('/create',                                       'DentistController@create')->name('create');
            Route::post('/',                                            'DentistController@store')->name('store');
            Route::get('/{dentist}/edit',                               'DentistController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DentistController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{dentist}',                                   'DentistController@update')->name('update');
            Route::delete('/{dentist}',                                 'DentistController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('dentists')->name('dentists/')->group(static function () {
            Route::get('/',                                             'DentistController@index')->name('index');
            Route::get('/create',                                       'DentistController@create')->name('create');
            Route::post('/',                                            'DentistController@store')->name('store');
            Route::get('/{dentist}/edit',                               'DentistController@edit')->name('edit');
            Route::post('/{dentist}',                                   'DentistController@update')->name('update');
            Route::delete('/{dentist}',                                 'DentistController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('services')->name('services/')->group(static function () {
            Route::get('/',                                             'ServiceController@index')->name('index');
            Route::get('/create',                                       'ServiceController@create')->name('create');
            Route::post('/',                                            'ServiceController@store')->name('store');
            Route::get('/{service}/edit',                               'ServiceController@edit')->name('edit');
            Route::post('/{service}',                                   'ServiceController@update')->name('update');
            Route::delete('/{service}',                                 'ServiceController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('schedules')->name('schedules/')->group(static function () {
            Route::get('/',                                             'ScheduleController@index')->name('index');
            Route::get('/create',                                       'ScheduleController@create')->name('create');
            Route::post('/',                                            'ScheduleController@store')->name('store');
            Route::get('/{schedule}/edit',                              'ScheduleController@edit')->name('edit');
            Route::post('/{schedule}',                                  'ScheduleController@update')->name('update');
            Route::delete('/{schedule}',                                'ScheduleController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('appointments')->name('appointments/')->group(static function () {
            Route::get('/',                                             'AppointmentController@index')->name('index');
            Route::get('/create',                                       'AppointmentController@create')->name('create');
            Route::get('/{appointment}',                                'AppointmentController@show')->name('show');
            Route::post('/',                                            'AppointmentController@store')->name('store');
            Route::get('/{appointment}/edit',                           'AppointmentController@edit')->name('edit');
            Route::post('/{appointment}',                               'AppointmentController@update')->name('update');
            Route::delete('/{appointment}',                             'AppointmentController@destroy')->name('destroy');
            Route::get('/export',                                       'AppointmentController@export')->name('export');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('feedback')->name('feedback/')->group(static function() {
            Route::get('/',                                             'FeedbackController@index')->name('index');
            Route::get('/create',                                       'FeedbackController@create')->name('create');
            Route::post('/',                                            'FeedbackController@store')->name('store');
            Route::get('/{feedback}/show',                              'FeedbackController@show')->name('show');
            Route::get('/{feedback}/edit',                              'FeedbackController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FeedbackController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{feedback}',                                  'FeedbackController@update')->name('update');
            Route::delete('/{feedback}',                                'FeedbackController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('feedback')->name('feedback/')->group(static function() {
            Route::get('/',                                             'FeedbackController@index')->name('index');
            Route::get('/create',                                       'FeedbackController@create')->name('create');
            Route::post('/',                                            'FeedbackController@store')->name('store');
            Route::get('/{feedback}/show',                              'FeedbackController@show')->name('show');
            Route::get('/{feedback}/edit',                              'FeedbackController@edit')->name('edit');
            Route::post('/{feedback}',                                  'FeedbackController@update')->name('update');
            Route::delete('/{feedback}',                                'FeedbackController@destroy')->name('destroy');
        });
    });
});