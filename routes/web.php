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

// Route::get('/', function () {
//     return view('index');
// });

//basic route
// Route::get("/home", function(){
//     return view('home');
// });

//index page route
Route::get('/', 'HelloController@index');
// prefix set in group route for (about and contact)
Route::prefix("maxsop")->group(function(){
    Route::get('/about', 'HelloController@manus')->name('maxsop/about');

    
    Route::get('/contact', 'BoloController@bolo')->name('maxsop/contact'); 
});

Route::get("/blog route", "HelloController@blog")->name('blog');

// category crud are here
Route::get("add/category", "BoloController@addcategory")->name('add.category');
Route::post('store/category', "BoloController@storecategory")->name('store.category');
Route::get('all/category', 'BoloController@allcetegory')->name('all.category');
//view single item in category table
Route::get('view/category/{id}', "BoloController@ViewCategory");
//delete item in category table
Route::get('delete/category/{id}', "BoloController@Deleteitem");
//edit item in category table
Route::get('edit/category/{id}', 'BoloController@Edititem');
Route::post('update/category/{id}', 'BoloController@Updateitem');

//blog post route
Route::get("/blog/route", "PostController@blog")->name('blog');
Route::post('/store/allpost', 'PostController@StorePost')->name('store.post');
Route::get('/all/post', 'PostController@PostShow')->name('all.post');
Route::get('/view/post/{id}', 'PostController@Viewpost');
Route::get('/edit/post/{id}', 'PostController@Editpost');
Route::post('/update/post/{id}', 'PostController@Updatepost');
Route::get('/delete/post/{id}', 'PostController@Deletepost');

//Student route
Route::get('/student', 'StudentController@index')->name('student');
Route::post('/student/insert', 'StudentController@insert')->name('store.student');
Route::get('all/student', 'StudentController@ViewAllStudent')->name('all.student');
Route::get('view/student/{id}', 'StudentController@ViewStudent');
Route::get('/delete/student/{id}', 'StudentController@destroy');
Route::get('/edit/student/{id}', 'StudentController@Editstudent');
Route::post('/update/student/{id}', 'StudentController@update');

//Employee {using resource route}
Route::resource('employee', 'EmployeeController');