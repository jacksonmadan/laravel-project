<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users/{user}/role', [AdminUserController::class, 'updateRole'])->name('admin.users.updateRole');
});
