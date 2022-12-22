<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [LoginController::class, 'redirectToLogin']);

Route::group(['prefix' => 'admin'], function () {
    //login post route to admin auth controller
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');

    Route::get('verifyToken', [LoginController::class, 'TokenVerify'])->name('admin.verify');

        // Notes Routes
        Route::group([
            'prefix'    => 'notes',
        ], function () {
            Route::get('{page?}', [NoteController::class, 'index'])->name('admin.notes.index')->where(['page' => '[0-9]+']);

            Route::post('create', [NoteController::class, 'store'])->name('admin.notes.store');

            Route::put('edit/{id}', [NoteController::class, 'update'])->name('admin.notes.update');

            Route::delete('{id}', [NoteController::class, 'destroy'])->name('admin.notes.delete')->where(['id' => '[0-9]+']);

            Route::put('mass-destroy', [NoteController::class, 'massDestroy'])->name('admin.notes.mass_delete');
        });

        // NotesCategories Routes
        Route::group([
            'prefix'    => 'noteCategories',
        ], function () {
            Route::get('', [NoteCategoryController::class, 'index'])->name('admin.notesCategories.index');

            Route::post('create', [NoteCategoryController::class, 'store'])->name('admin.notesCategories.store');

            Route::put('edit/{id}', [NoteCategoryController::class, 'update'])->name('admin.notesCategories.update');

            Route::delete('{id}', [NoteCategoryController::class, 'destroy'])->name('admin.notesCategories.delete')->where(['id' => '[0-9]+']);

            Route::put('mass-destroy', [NoteCategoryController::class, 'massDestroy'])->name('admin.notesCategories.mass_delete');
        });

        // NoteNotesCategories Routes
        Route::group([
            'prefix'    => 'notenoteCategories',
        ], function () {
            Route::post('create', 'NoteController@storeCategories');

        });

});

