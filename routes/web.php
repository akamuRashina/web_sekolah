    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\AdminRequestController;
    use App\Models\User;
    use App\Models\AdminRequest;


    /* ===== PUBLIC (TANPA LOGIN) ===== */

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
