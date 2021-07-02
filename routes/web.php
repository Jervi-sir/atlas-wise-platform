<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PlannerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DarkThemeController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\UploaderController;
use App\Http\Controllers\AtlasController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;

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

require __DIR__.'/auth.php';


//, 'role.admin'
Route::middleware(['auth'])->group(function () {
    //--------Group----------------------------------------------------------
    Route::get('/groups-show', [GroupController::class, 'show'])->name('groups.show');
    Route::get('/groups-index', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/groups-create', [GroupController::class, 'create'])->name('groups.create');
    Route::get('/groups-edit-index', [GroupController::class, 'editGroup'])->name('groups.editGroup');
    Route::get('/groups-add-members', [GroupController::class, 'addMembers'])->name('groups.addMembers');

    Route::post('/groups-new', [GroupController::class, 'new'])->name('group.new');
    Route::post('/groups-edit', [GroupController::class, 'edit'])->name('group.edit');
    Route::post('/groups-add-new', [GroupController::class, 'add'])->name('group.add');

    //--------Members----------------------------------------------------------
    Route::get('/members', [MemberController::class, 'index'])->name('members.index');
    Route::get('/mmmr-list', [MemberController::class, 'list2'])->name('members.list2');
    Route::get('/members-list', [MemberController::class, 'list'])->name('members.list');
    Route::get('/r-list', function() { return view('members.iii'); });

    //--------Atlas----------------------------------------------------------
    Route::get('/atlas-edit', [AtlasController::class, 'edit'])->name('atlas.edit');
    Route::post('/atlas-update', [AtlasController::class, 'update'])->name('atlas.update');
    
});

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/copyrights', function () {
        return view('copyright');
    })->name('copyright');

    
    //--------Reunion----------------------------------------------------------
    Route::get('/reunion-show', [ReunionController::class, 'show'])->name('reunion.show');
    Route::get('/reunion-create', [ReunionController::class, 'create'])->name('reunion.create');

    Route::post('/reunion-new', [ReunionController::class, 'new'])->name('reunion.new');
    Route::post('/reunion-update', [ReunionController::class, 'update'])->name('reunion.update');
    Route::post('/reunion-delete', [ReunionController::class, 'delete'])->name('reunion.delete');
    Route::post('/reunion-show-update', [ReunionController::class, 'updateShow'])->name('reunion.updateshow');

    //--------Event----------------------------------------------------------
    Route::get('/event-show', [EventController::class, 'show'])->name('event.show');
    Route::get('/event-create', [EventController::class, 'create'])->name('event.create');

    Route::post('/event-new', [EventController::class, 'new'])->name('event.new');
    Route::post('/event-update', [EventController::class, 'update'])->name('event.update');
    Route::post('/event-delete', [EventController::class, 'delete'])->name('event.delete');
    Route::post('/event-show-update', [EventController::class, 'updateShow'])->name('event.updateshow');

    //--------Skills----------------------------------------------------------
    Route::get('/skills', [SkillController::class, 'show'])->name('skills.index');
    Route::post('/add-skill', [SkillController::class, 'add'])->name('skills.add');
    Route::post('/profile-skill', [SkillController::class, 'link'])->name('profile.skills');

    //--------Profile----------------------------------------------------------
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.index');

    Route::post('/profile/socials', [ProfileController::class, 'updateSocials'])->name('profile.socials');
    Route::post('/profile/details', [ProfileController::class, 'updateDetails'])->name('profile.details');
    Route::post('/profile/password', [ProfileController::class, 'password'])->name('profile.password');

    //-------Upload----------------------------------------------------------
    Route::post('/upload-schedual', [UploaderController::class, 'uploadSchedual'])->name('upload.schedual');

});


/*
    //--------Annoncement----------------------------------------------------------
    Route::get('/annoncement-show', [AnnoncementController::class, 'show'])->name('annoncement.show');
    Route::get('/annoncement-edit', [AnnoncementController::class, 'edit'])->name('annoncement.edit');
    Route::get('/annoncement-create', [AnnoncementController::class, 'create'])->name('annoncement.create');

    Route::post('/annoncement-new', [AnnoncementController::class, 'new'])->name('annoncement.new');
    Route::post('/annoncement-update', [AnnoncementController::class, 'update'])->name('annoncement.update');
    Route::post('/annoncement-delete', [AnnoncementController::class, 'delete'])->name('annoncement.delete');
    Route::post('/annoncement-show-update', [AnnoncementController::class, 'updateShow'])->name('annoncement.updateshow');

*/

//--------Dark Theme----------------------------------------------------------
Route::post('/dark-theme', [DarkThemeController::class, 'store'])->name('dark-theme');

Route::get('/planner', [PlannerController::class, 'index'])->name('planner.index');
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/file-manager', [FileManagerController::class, 'index'])->name('file-manager.index');



