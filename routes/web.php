    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\AdminRequestController;
    use App\Models\User;
    use App\Models\AdminRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\ProfileSchoolController;
use App\Http\Controllers\TeacherController;


Route::get('/', function () {
    return "hallo dek";
});

require __DIR__.'/admin.php';



    /* ===== GALERI ===== */
    Route::get('/gallery', [GalleryController::class, 'index']);
    Route::get('/gallery/create', [GalleryController::class, 'create']);
    Route::get('/gallery/create', [GalleryController::class, 'create']);
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit']);

    Route::post('/gallery', [GalleryController::class, 'store']);

    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit']);
    Route::put('/gallery/{id}', [GalleryController::class, 'update']);
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy']);

/*-- routes teacher --*/
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/teachers/create', [TeacherController::class, 'create']);
Route::post('/teachers', [TeacherController::class, 'store']);

Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit']);
Route::put('/teachers/{id}', [TeacherController::class, 'update']);
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy']);
    /* ===== PUBLIC (TANPA LOGIN) ===== */

require __DIR__.'/admin.php';


// Route::get('/admin/partner', [partnercontroller::class, 'index'])->name('partner.index');
// Route::get('/admin/partner/{id}/edit', [partnercontroller::class, 'edit'])->name('partner.edit');
// Route::put('/admin/partner/{id}', [partnercontroller::class, 'update'])->name('partner.update');
// Route::delete('/admin/partner/{id}', [partnercontroller::class, 'destroy'])->name('partner.destroy');

    Route::get('/', function () {
        return view('dashboard'); // dashboard publik
    })->name('dashboard');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    /* ===== PUBLIC NAVBAR PAGES ===== */
    Route::get('/profil', function () {
        return view('public.profil');
    })->name('profil');

    Route::get('/fasilitas', function () {
        return view('public.fasilitas');
    })->name('fasilitas');

    Route::get('/guru', function () {
        return view('public.guru');
    })->name('guru');

    Route::get('/berita', function () {
        return view('public.berita');
    })->name('berita');

    Route::get('/eskul', function () {
        return view('public.eskul');
    })->name('eskul');

    Route::get('/mitra', function () {
        return view('public.mitra');
    })->name('mitra');

    Route::get('/kontak', function () {
        return view('public.kontak');
    })->name('kontak');

    Route::get('/gallery', function () {
        return view('public.gallery');
    })->name('gallery');



    /* ===== ADMIN REQUEST (GUEST) ===== */
    Route::get('/apply-admin', [AdminRequestController::class, 'create'])
        ->name('admin.apply');

    Route::post('/apply-admin', [AdminRequestController::class, 'store']);

    /* ===== ADMIN AUTH ===== */
    Route::get('/admin/login', [AuthController::class, 'loginForm'])
        ->name('login');

    Route::post('/admin/login', [AuthController::class, 'login']);

    Route::get('/admin/register', [AuthController::class, 'registerForm'])
        ->name('register');

    Route::post('/admin/register', [AuthController::class, 'register']);

    /* ===== ADMIN AREA ===== */
    Route::middleware('auth')->group(function () {

        Route::get('/admin/dashboard', function () {
            return view('admin.dashboardadmin', [
                'totalUsers' => User::count(),
                'pendingRequests' => AdminRequest::where('status', 'pending')->count(),
            ]);
        })->name('admin.dashboardadmin');

        Route::get('/admin/requests', [AdminRequestController::class, 'index'])
            ->name('admin.requests');

        Route::post('/admin/requests/{id}/approve', [AdminRequestController::class, 'approve'])
            ->name('admin.requests.approve');

        Route::get('/profile', [AuthController::class, 'editProfile'])
            ->name('profile.edit');

/* ===== PROFILE SCHOOL ===== */
Route::get('/profile-school', [ProfileSchoolController::class, 'show']);
Route::get('/profile-school/edit', [ProfileSchoolController::class, 'index']);
Route::post('/profile-school', [ProfileSchoolController::class, 'store']);
Route::put('/profile-school/{id}', [ProfileSchoolController::class, 'update']);
        Route::put('/profile', [AuthController::class, 'updateProfile'])
            ->name('profile.update');

        Route::delete('/profile', [AuthController::class, 'deleteAccount'])
            ->name('profile.delete');
    });

    /* ===== ADMIN BERITA ===== */
    Route::middleware(['auth', 'admin.berita'])->group(function () {
        Route::get('/admin/berita', function () {
            return view('admin.berita.index');
        })->name('admin.berita');
    });

    /* ===== ADMIN JURUSAN ===== */
    Route::middleware(['auth', 'admin.jurusan'])->group(function () {
        Route::get('/admin/jurusan', function () {
            return view('admin.jurusan.index');
        })->name('admin.jurusan');
    });

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
