<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\alltimecontroller;

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
Route::view('/cuisine','admin/cuisine');
Route::view('/status','admin/status');
Route::view('/availableday','admin/availableday');
Route::view('/discounttype','admin/discounttype');
Route::view('/restauranttype','admin/restauranttype');
Route::view('/menutype','admin/menutype');
Route::view('/currentstate','admin/currentstate');
Route::view('/restaurant','admin/restaurant');
Route::view('/menu','admin/menu');
Route::post('/cuisine',[alltimecontroller::class,'addcuisine'])->name('cuisine.store');
Route::post('/status',[alltimecontroller::class,'addstatus'])->name('status.store');
Route::post('/document',[alltimecontroller::class,'adddocument'])->name('document.store');
Route::post('/availableday',[alltimecontroller::class,'addavailableday'])->name('availableday.store');
Route::post('/discounttype',[alltimecontroller::class,'adddiscounttype'])->name('discounttype.store');
Route::post('/restauranttype',[alltimecontroller::class,'addrestauranttype'])->name('restauranttype.store');
Route::post('/menutype',[alltimecontroller::class,'addmenutype'])->name('menutype.store');
Route::post('/currentstate',[alltimecontroller::class,'addcurrentstate'])->name('currentstate.store');
Route::post('/restaurant',[alltimecontroller::class,'addrestaurant'])->name('restaurant.store');
Route::post('/location',[alltimecontroller::class,'addlocation'])->name('location.store');
Route::get('/cuisine',[alltimecontroller::class,'showcuisine']);
Route::get('/status',[alltimecontroller::class,'showstatus']);
Route::get('/document',[alltimecontroller::class,'showdocument']);
Route::get('/availableday',[alltimecontroller::class,'showavailableday']);
Route::get('/discounttype',[alltimecontroller::class,'showdiscounttype']);
Route::get('/restauranttype',[alltimecontroller::class,'showrestauranttype']);
Route::get('/menutype',[alltimecontroller::class,'showmenutype']);
Route::get('/currentstate',[alltimecontroller::class,'showcurrentstate']);
Route::get('/location',[alltimecontroller::class,'showlocation']);
Route::get('/restaurant',[alltimecontroller::class,'showrestaurant']);
Route::post('/cuisine/editcuisine',[alltimecontroller::class,'editcuisine'])->name('cuisine.editcuisine');
Route::post('/status/editstatus',[alltimecontroller::class,'editstatus'])->name('status.editstatus');
Route::post('/document/editdocument',[alltimecontroller::class,'editdocument'])->name('document.editdocument');
Route::post('/availableday/editavailableday',[alltimecontroller::class,'editavailableday'])->name('availableday.editavailableday');
Route::post('/discounttype/editdiscounttype',[alltimecontroller::class,'editdiscounttype'])->name('discounttype.editdiscounttype');
Route::post('/restauranttype/editrestauranttype',[alltimecontroller::class,'editrestauranttype'])->name('restauranttype.editrestauranttype');
Route::post('/menutype/editmenutype',[alltimecontroller::class,'editmenutype'])->name('menutype.editmenutype');
Route::post('/currentstate/editcurrentstate',[alltimecontroller::class,'editcurrentstate'])->name('currentstate.editcurrentstate');
Route::post('/location/editlocation',[alltimecontroller::class,'editlocation'])->name('location.editlocation');
Route::post('/restaurant/editrestaurant',[alltimecontroller::class,'editrestaurant'])->name('restaurant.editrestaurant');
Route::post('/update-cuisine',[alltimecontroller::class,'updatestatus'])->name('status.update');
Route::post('/update-status',[alltimecontroller::class,'updatecuisine'])->name('cuisine.update');
Route::post('/update-document',[alltimecontroller::class,'updatedocument'])->name('document.update');
Route::post('/update-availableday',[alltimecontroller::class,'updateavailableday'])->name('availableday.update');
Route::post('/update-discounttype',[alltimecontroller::class,'updatediscounttype'])->name('discounttype.update');
Route::post('/update-restauranttype',[alltimecontroller::class,'updaterestauranttype'])->name('restauranttype.update');
Route::post('/update-menutype',[alltimecontroller::class,'updatemenutype'])->name('menutype.update');
Route::post('/update-currentstate',[alltimecontroller::class,'updatecurrentstate'])->name('currentstate.update');
Route::post('/update-location',[alltimecontroller::class,'updatelocation'])->name('location.update');
Route::post('/update-restaurant',[alltimecontroller::class,'updaterestaurant'])->name('restaurant.update');
Route::post('/delete-cuisine',[alltimecontroller::class,'deletecuisine'])->name('cuisine.deletecuisine');
Route::post('/delete-status',[alltimecontroller::class,'deletestatus'])->name('status.delete');
Route::post('/delete-document',[alltimecontroller::class,'deletedocument'])->name('document.delete');
Route::post('/delete-availableday',[alltimecontroller::class,'deleteavailableday'])->name('availableday.delete');
Route::post('/delete-discounttype',[alltimecontroller::class,'deletediscounttype'])->name('discounttype.delete');
Route::post('/delete-restauranttype',[alltimecontroller::class,'deleterestauranttype'])->name('restauranttype.delete');
Route::post('/delete-menutype',[alltimecontroller::class,'deletemenutype'])->name('menutype.delete');
Route::post('/delete-currentstate',[alltimecontroller::class,'deletecurrentstate'])->name('currentstate.delete');
Route::post('/delete-location',[alltimecontroller::class,'deletelocation'])->name('location.delete');
Route::post('/delete-restaurant',[alltimecontroller::class,'deleterestaurant'])->name('restaurant.delete');