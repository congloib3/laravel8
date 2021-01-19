<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\FluentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\App;
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

Route::get('/pay', [PayOrderController::class, 'store']);

// Route::get('/{locale}', function ($locale) {
//     App::setLocale($locale);
//     return view('welcome');
// });
Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts', [ClientController::class, 'getAllPosts'])->name('posts.getallposts');
Route::get('/post/{id}', [ClientController::class, 'getPostById'])->name('posts.getpost');
Route::get('/fluent', [FluentController::class, 'index']);
Route::get('/users', function(){
    return 'checkUserrrrrrr';
})->middleware('checkUser');

Route::get('/add-role', [RoleController::class, 'addRole']);

Route::get('/add-user', [RoleController::class, 'addUser']);

Route::get('/rolesbyuser/{id}', [RoleController::class, 'getAllRolesByUser']);

Route::get('/usersbyrole/{id}', [RoleController::class, 'getAllUserRoles']);

Route::get('/add-employee', [EmployeeController::class, 'addEmployee']);

Route::get('/export-excel', [EmployeeController::class, 'exportIntoExcel']);

Route::get('/export-csv', [EmployeeController::class, 'exportIntoCSV']);

Route::get('/import-form', [EmployeeController::class, 'importForm']);

Route::post('/import', [EmployeeController::class, 'import']);

Route::get('/resize-image', [ImageController::class, 'resizeImage']);

Route::post('/resize-image', [ImageController::class, 'resizeImageSubmit'])->name('image.resize');

Route::get('/dropzone', [DropzoneController::class, 'dropzone']);

Route::post('/dropzone-store', [DropzoneController::class, 'dropzoneStore'])->name('dropzone.store');

Route::get('/gallery', [GalleryController::class, 'gallery']);

Route::get('/get-name', [TestController::class, 'getFisrtLastName']);

Route::get('/add-products', [ProductController::class, 'addProducts']);

Route::get('/search', [ProductController::class, 'search']);

Route::get('/autocomplete', [ProductController::class, 'autoComplete'])->name('autocomplete');

Route::get('/posts', [PostController::class, 'index']);

Route::get('/collect', function(){
    $keyCollection = collect(['name', 'version']);
    $combined = $keyCollection->combine(['Laravel', 'Laravel 5.4']);
    return $combined->all();

});

Route::get('/test', function(){
    dd(app());
});

