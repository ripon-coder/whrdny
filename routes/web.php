<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventAjaxController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoinWithusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index']);
Route::get('/news-events', [HomeController::class, 'newsEvents'])->name('newsEvents');
Route::get('/event/{url}', [HomeController::class, 'event'])->name('event');
Route::get('/what-we-do', [HomeController::class, 'whatWeDo'])->name('whatWeDo');
Route::get('/causes-list', [HomeController::class, 'causesList'])->name('causesList');
Route::get('/who-we-are', [HomeController::class, 'whoWeAre'])->name('whoWeAre');
Route::get('/team-member/{id}', [HomeController::class, 'teamMember'])->name('teamMember');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'index'])->name('contact.save');
Route::get('/video-gallery', [HomeController::class, 'videoGallery']);
Route::get('/photo-gallery', [HomeController::class, 'photoGallery']);
Route::get('/blog', [HomeController::class, 'blog'])->name("blog");
Route::get('/blog/{url}', [HomeController::class, 'blogDetails'])->name('blogDetails');
Route::post('/blog/comment/{post}', [HomeController::class, 'saveComment']);
Route::get('/donation/{url}', [HomeController::class, 'donation'])->name('donation_details');
Route::get('/donate/{url}', [HomeController::class, 'donate'])->name('donate');
Route::get('/events/{type?}', [HomeController::class, 'events'])->name('evnts');
Route::get('/more-events/{type?}', [HomeController::class, 'MoreEvents'])->name('more-evnts');
Route::get('/mission', [HomeController::class, 'mission']);
Route::get('/vision', [HomeController::class, 'vision']);
Route::get('/objectives', [HomeController::class, 'objectives']);
Route::get('/history', [HomeController::class, 'history']);
Route::get('/overview', [HomeController::class, 'overview']);
Route::get('/board-of-trustee', [HomeController::class, 'boardOfTrustee']);
Route::get('/faqs', [HomeController::class, 'faqs']);
Route::get('/how-we-work', [HomeController::class, 'howWork']);
Route::get('/join-with-us', [HomeController::class, 'joinWithUs'])->name("joinWithUs");
Route::post('/join-with-us', [JoinWithusController::class, 'index']);
Route::get('/category/{url}', [HomeController::class, 'category']);

Route::get('event-search',[HomeController::class,'eventSearch'])->name("eventSearch");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/event-ajax', [EventAjaxController::class, 'index'])->name('event_ajax');

