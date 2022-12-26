<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Home\HomeAboutController;
use App\Http\Controllers\Home\HomeContactController;
use App\Http\Controllers\Home\HomeCoreValue;
use App\Http\Controllers\Home\HomeProjectController;
use App\Http\Controllers\Home\HomeServiceController;
use App\Http\Controllers\Home\HomeSetting;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\HomeTeamController;
use App\Http\Controllers\Home\HomeTestimonialController;
use App\Http\Controllers\Home\MultiImageController;
use App\Http\Controllers\Home\UserController;
use App\Mail\ContactMail;
use App\Models\Home\HomeProject;
use App\Models\Home\HomeService;
use App\Models\Home\HomeSlider;
use App\Models\Home\ProjectMultiImage;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
Route::get('/phpinfo', function() {
    return phpinfo();
});

Route::get('/', function () {
    // $sliders = HomeSlider::latest()->get();
    return view('frontend.index');
});

Route::get('/about', function () {
    return view('frontend.pages.about');
})->name('about.page');

Route::get('/team', function () {
    return view('frontend.pages.team');
})->name('team.page');

Route::get('/project', function () {
    return view('frontend.pages.project');
})->name('project.page');

Route::get('/services', function () {
    return view('frontend.pages.services');
})->name('services.page');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get("user/logout", [UserController::class, "userLogout"])->name("user_logout");

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->name('dashboard')->middleware('adams');


// Home Slider route

Route::get("/admin/home/slider", [HomeSliderController::class, "index"])->name("admin.home.slider");

Route::get("/admin/add/slider", [HomeSliderController::class, "create"])->name("admin.add.slider");
Route::post("/admin/store/slider", [HomeSliderController::class, "store"])->name("admin.store.slider");


Route::get("/admin/edit/slider/{id}", [HomeSliderController::class, "edit"])->name("admin.edit.slider");
Route::post("/admin/update/slider/{id}", [HomeSliderController::class, "update"])->name("admin.update.slider");

Route::get("/admin/delete/slider/{id}", [HomeSliderController::class, "destroy"])->name("admin.delete.slider");

// Home Slider route

Route::get("/admin/home/core-value", [HomeCoreValue::class, "index"])->name("admin.home.core");
Route::post("/admin/store/core-value", [HomeCoreValue::class, "store"])->name("admin.store.core");
Route::get("/admin/edit/core-value/{id}", [HomeCoreValue::class, "edit"])->name("admin.edit.core");
Route::post("/admin/update/core-value/{id}", [HomeCoreValue::class, "update"])->name("admin.update.core");
Route::get("/admin/delete/core-value/{id}", [HomeCoreValue::class, "destroy"])->name("admin.delete.core");


// Home About route
Route::get("/admin/home/about", [HomeAboutController::class, "index"])->name("admin.home.about");
Route::get("/admin/add/about", [HomeAboutController::class, "create"])->name("admin.add.about");
Route::post("/admin/store/about", [HomeAboutController::class, "store"])->name("admin.store.about");


Route::get("/admin/edit/about/{id}", [HomeAboutController::class, "edit"])->name("admin.edit.about");
Route::post("/admin/update/about/{id}", [HomeAboutController::class, "update"])->name("admin.update.about");

Route::get("/admin/delete/about/{id}", [HomeAboutController::class, "destroy"])->name("admin.delete.about");

// Home Service route
Route::get("/admin/home/service", [HomeServiceController::class, "index"])->name("admin.home.service");
Route::get("/admin/add/service", [HomeServiceController::class, "create"])->name("admin.add.service");
Route::post("/admin/store/service", [HomeServiceController::class, "store"])->name("admin.store.service");

Route::get("/service/detail/{id}", function ($id) {
    $service = HomeService::findOrFail($id);
    return view("frontend.pages.service_detail", compact('service'));
})->name("detail.service");

Route::get("/project/details/{id}", function ($id) {
    $project = HomeProject::findOrFail($id);
    $project_multiImages = ProjectMultiImage::latest()->get();
    return view("frontend.pages.project_detail", compact('project', 'project_multiImages'));
})->name("detail.project");

Route::post('/update/thumbnail/image', [HomeProjectController::class, 'updateThumbnailImage'])->name('project.update.image_thumbnail');
Route::post('/update/multi_image', [HomeProjectController::class, 'updateMultiImage'])->name('project.update.multi_image');
Route::get('/delete/multi_image/{id}', [HomeProjectController::class, 'deleteMultiImage'])->name('project.delete.multi_image');

// Multi Image for project Route
Route::get('/all/project/image', [MultiImageController::class, 'indexProject'])->name('admin.home.multimage');
Route::post('/add/project/image', [MultiImageController::class, 'storeProject'])->name('admin.store.multimage');

Route::get('/project/gallery', function () {
    return view('frontend.pages.gallery');
})->name('project.gallery');



Route::get("/admin/edit/service/{id}", [HomeServiceController::class, "edit"])->name("admin.edit.service");
Route::post("/admin/update/service/{id}", [HomeServiceController::class, "update"])->name("admin.update.service");
Route::get("/admin/delete/service/{id}", [HomeServiceController::class, "destroy"])->name("admin.delete.service");

// Home Project route
Route::get("/admin/home/project", [HomeProjectController::class, "index"])->name("admin.home.project");
Route::get("/admin/add/project", [HomeProjectController::class, "create"])->name("admin.add.project");
Route::post("/admin/store/project", [HomeProjectController::class, "store"])->name("admin.store.project");
Route::get("/admin/edit/project/{id}", [HomeProjectController::class, "edit"])->name("admin.edit.project");
Route::post("/admin/update/project/{id}", [HomeProjectController::class, "update"])->name("admin.update.project");
Route::get("/admin/delete/project/{id}", [HomeProjectController::class, "destroy"])->name("admin.delete.project")
;
// Home teams route
Route::get("/admin/home/team", [HomeTeamController::class, "index"])->name("admin.home.team");
Route::get("/admin/add/team", [HomeTeamController::class, "create"])->name("admin.add.team");
Route::post("/admin/store/team", [HomeTeamController::class, "store"])->name("admin.store.team");
Route::get("/admin/edit/team/{id}", [HomeTeamController::class, "edit"])->name("admin.edit.team");
Route::post("/admin/update/team/{id}", [HomeTeamController::class, "update"])->name("admin.update.team");
Route::get("/admin/delete/team/{id}", [HomeTeamController::class, "destroy"])->name("admin.delete.team");

// Home testimonial route
Route::get("/admin/home/testimonial", [HomeTestimonialController::class, "index"])->name("admin.home.testimonial");
Route::get("/admin/add/testimonial", [HomeTestimonialController::class, "create"])->name("admin.add.testimonial");
Route::post("/admin/store/testimonial", [HomeTestimonialController::class, "store"])->name("admin.store.testimonial");
Route::get("/admin/edit/testimonial/{id}", [HomeTestimonialController::class, "edit"])->name("admin.edit.testimonial");
Route::post("/admin/update/testimonial/{id}", [HomeTestimonialController::class, "update"])->name("admin.update.testimonial");
Route::get("/admin/delete/testimonial/{id}", [HomeTestimonialController::class, "destroy"])->name("admin.delete.adams");


// Multi Image for client logo Route
Route::get('/all/image', [MultiImageController::class, 'index'])->name('admin.home.portifolio');
Route::post('/add/image', [MultiImageController::class, 'store'])->name('admin.store.portifolio');
Route::get("/admin/delete/image/{id}", [MultiImageController::class, "destroy"])->name("admin.delete.portifolio");




// Contact Route
Route::get('/admin/contact', [HomeContactController::class, 'index'])->name('admin.contact');
Route::get('/create/contact', [HomeContactController::class, 'create'])->name('admin.create.contact');
Route::post('/add/contact', [HomeContactController::class, 'store'])->name('admin.store.contact');
Route::get('/edit/contact/{id}', [HomeContactController::class, 'edit'])->name('admin.edit.contact');
Route::post('/update/contact/{id}', [HomeContactController::class, 'update'])->name('admin.update.contact');

Route::get('/delete/contact/{id}', [HomeContactController::class, 'destroy'])->name('admin.delete.contact');

Route::get('/admin/message', [HomeContactController::class, 'AdminMessage'])->name('admin.message');
Route::get('/delete/message/{id}', [HomeContactController::class, 'AdminDeleteMessage'])->name('delete.message');

// app settings

Route::get("/admin/settings", [HomeSetting::class, "index"])->name("admin.settings");
Route::post("/admin/banner", [HomeSetting::class, "editBanner"])->name("admin.edit.banner");
Route::post("/admin/logo", [HomeSetting::class, "logo"])->name("admin.edit.logo");
Route::post("/admin/favicon", [HomeSetting::class, "favicon"])->name("admin.edit.favicon");

Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.page');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

