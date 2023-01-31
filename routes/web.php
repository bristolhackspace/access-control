<?php

Route::view('/', 'welcome');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Card
    Route::delete('cards/destroy', 'CardController@massDestroy')->name('cards.massDestroy');
    Route::post('cards/parse-csv-import', 'CardController@parseCsvImport')->name('cards.parseCsvImport');
    Route::post('cards/process-csv-import', 'CardController@processCsvImport')->name('cards.processCsvImport');
    Route::resource('cards', 'CardController');

    // Machine
    Route::delete('machines/destroy', 'MachineController@massDestroy')->name('machines.massDestroy');
    Route::post('machines/parse-csv-import', 'MachineController@parseCsvImport')->name('machines.parseCsvImport');
    Route::post('machines/process-csv-import', 'MachineController@processCsvImport')->name('machines.processCsvImport');
    Route::resource('machines', 'MachineController');

    // Induction
    Route::delete('inductions/destroy', 'InductionController@massDestroy')->name('inductions.massDestroy');
    Route::resource('inductions', 'InductionController');

    // Login
    Route::delete('logins/destroy', 'LoginController@massDestroy')->name('logins.massDestroy');
    Route::resource('logins', 'LoginController');

    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::resource('questions', 'QuestionController');

    // Answer
    Route::delete('answers/destroy', 'AnswerController@massDestroy')->name('answers.massDestroy');
    Route::resource('answers', 'AnswerController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Card
    Route::delete('cards/destroy', 'CardController@massDestroy')->name('cards.massDestroy');
    Route::resource('cards', 'CardController');

    // Machine
    Route::delete('machines/destroy', 'MachineController@massDestroy')->name('machines.massDestroy');
    Route::resource('machines', 'MachineController');

    // Induction
    Route::delete('inductions/destroy', 'InductionController@massDestroy')->name('inductions.massDestroy');
    Route::resource('inductions', 'InductionController');

    // Login
    Route::delete('logins/destroy', 'LoginController@massDestroy')->name('logins.massDestroy');
    Route::resource('logins', 'LoginController');

    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::resource('questions', 'QuestionController');

    // Answer
    Route::delete('answers/destroy', 'AnswerController@massDestroy')->name('answers.massDestroy');
    Route::resource('answers', 'AnswerController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
