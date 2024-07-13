<?php

use App\Http\Controllers\FamilyMemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/family', [FamilyMemberController::class, 'index'])->name('family.index');
Route::get('/family/create', [FamilyMemberController::class, 'create'])->name('family.create');
Route::post('/family/store', [FamilyMemberController::class, 'store'])->name('family.store');
Route::get('/family/member/{member}', [FamilyMemberController::class, 'show'])->name('family.show');
Route::patch('/family/member/{member}/edit', [FamilyMemberController::class, 'edit'])->name('family.edit');

Route::get('/relationships', function () {
    return view('pages.home');
});

Route::get('/settings', function () {
    return view('pages.home');
});
