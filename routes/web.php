<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FqnaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\OurServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\UserMessageController;
use App\Http\Controllers\SliderController;

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
})->name('welcome');

Route::get('/joy', function () {
	return view('backend/checkAdmin');
})->name('joy');

Route::post('/goToAdmin', [AdminController::class, 'goToAdmin'])->name('goToAdmin');

Route::get('/fQna', [AdminController::class, 'fQna'])->name('fQna');
Route::get('/contact', [AdminController::class, 'contact'])->name('contact');
Route::get('/adminPage', [AdminController::class, 'adminPage'])->name('adminPage');
Route::get('/aboutUs', [AdminController::class, 'aboutUs'])->name('aboutUs');
Route::get('/ourService', [AdminController::class, 'ourService'])->name('ourService');
Route::get('/portfolio', [AdminController::class, 'portfolio'])->name('portfolio');
Route::get('/ourTeam', [AdminController::class, 'ourTeam'])->name('ourTeam');
Route::get('/userMessage', [AdminController::class, 'userMessage'])->name('userMessage');
Route::get('/slider', [AdminController::class, 'slider'])->name('slider');
Route::get('/logOut', [AdminController::class, 'logOut'])->name('logOut');


Route::post('/ajaxAddfqna', [FqnaController::class, 'ajaxAddfqna'])->name('ajaxAddfqna');
Route::get('/fQnafindByIdAjax/{id}', [FqnaController::class, 'fQnafindByIdAjax'])->name('fQnafindByIdAjax');
Route::post('/ajaxUpdatefQna', [FqnaController::class, 'ajaxUpdatefQna'])->name('ajaxUpdatefQna');
Route::delete('ajaxDeletefQna/{id}', [FqnaController::class, 'ajaxDeletefQna'])->name('ajaxDeletefQna');


Route::post('/addContact', [ContactController::class, 'addContact'])->name('addContact');
// Route::get('/fQnafindByIdAjax/{id}', [ContactController::class, 'fQnafindByIdAjax'])->name('fQnafindByIdAjax');
Route::post('/ajaxUpdateCont', [ContactController::class, 'ajaxUpdateCont'])->name('ajaxUpdateCont');
// Route::delete('ajaxDeletefQna/{id}', [ContactController::class, 'ajaxDeletefQna'])->name('ajaxDeletefQna');


Route::post('/addAboutUs', [AboutUsController::class, 'addAboutUs'])->name('addAboutUs');
// Route::get('/fQnafindByIdAjax/{id}', [AboutUsController::class, 'fQnafindByIdAjax'])->name('fQnafindByIdAjax');
Route::post('/uppAboutUs', [AboutUsController::class, 'uppAboutUs'])->name('uppAboutUs');
// Route::delete('ajaxDeletefQna/{id}', [AboutUsController::class, 'ajaxDeletefQna'])->name('ajaxDeletefQna');

Route::post('/ajaxAddOurSer', [OurServiceController::class, 'ajaxAddOurSer'])->name('ajaxAddOurSer');
Route::get('/osfindByIdAjax/{id}', [OurServiceController::class, 'osfindByIdAjax'])->name('osfindByIdAjax');
Route::post('/ajaxUpdateOurSer', [OurServiceController::class, 'ajaxUpdateOurSer'])->name('ajaxUpdateOurSer');
Route::delete('ajaxDeleteOS/{id}', [OurServiceController::class, 'ajaxDeleteOS'])->name('ajaxDeleteOS');

Route::post('/addPortfolio', [PortfolioController::class, 'addPortfolio'])->name('addPortfolio');
Route::get('/prfindByIdAjax/{id}', [PortfolioController::class, 'prfindByIdAjax'])->name('prfindByIdAjax');
Route::post('/ajaxUpdatePortfolio', [PortfolioController::class, 'ajaxUpdatePortfolio'])->name('ajaxUpdatePortfolio');
Route::delete('ajaxDeletePr/{id}', [PortfolioController::class, 'ajaxDeletePr'])->name('ajaxDeletePr');


Route::post('/addTeamMember', [OurTeamController::class, 'addTeamMember'])->name('addTeamMember');
Route::get('/tmfindByIdAjax/{id}', [OurTeamController::class, 'tmfindByIdAjax'])->name('tmfindByIdAjax');
Route::post('/UpdateTeam', [OurTeamController::class, 'UpdateTeam'])->name('UpdateTeam');
Route::delete('ajaxDeleteTm/{id}', [OurTeamController::class, 'ajaxDeleteTm'])->name('ajaxDeleteTm');

Route::post('/ajaxSendMessage', [UserMessageController::class, 'ajaxSendMessage'])->name('ajaxSendMessage');
Route::get('/messagefindByIdAjax/{id}', [UserMessageController::class, 'messagefindByIdAjax'])->name('messagefindByIdAjax');
//Route::post('/UpdateTeam', [UserMessageController::class, 'UpdateTeam'])->name('UpdateTeam');
Route::delete('ajaxDeleteMessage/{id}', [UserMessageController::class, 'ajaxDeleteMessage'])->name('ajaxDeleteMessage');

Route::post('/addSlider', [SliderController::class, 'addSlider'])->name('addSlider');
Route::get('/slfindByIdAjax/{id}', [SliderController::class, 'slfindByIdAjax'])->name('slfindByIdAjax');
Route::post('/UpdateSlider', [SliderController::class, 'UpdateSlider'])->name('UpdateSlider');
Route::delete('ajaxDeleteSl/{id}', [SliderController::class, 'ajaxDeleteSl'])->name('ajaxDeleteSl');


