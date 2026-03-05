<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="margin:0; font-family: Arial, sans-serif; background:#f4f6f8;">

    <!-- SIDEBAR -->
    <div style="width:220px; height:100vh; background:#1e293b; color:white; position:fixed;">
        <h2 style="padding:20px; margin:0; background:#0f172a;">Admin Panel</h2>

        <ul style="list-style:none; padding:0; margin:0;">
            <li style="padding:15px;">
                <a href="{{ route('admin.dashboardadmin') }}" style="color:white;">Dashboard</a>
            </li>

            @if(auth()->user()->role === 'super_admin')
            <li style="padding:15px;">
                <a href="{{ route('admin.requests') }}" style="color:white;">
                    Admin Requests
                </a>
            </li>
            @endif

            <li style="padding:15px;">
                <a href="{{ route('profile.edit') }}" style="color:white;">Settings</a>
            </li>

            <li style="padding:15px;">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button style="background:none;border:none;color:white;cursor:pointer;">
                        Logout
                    </button>
                </form>
            </li>
        </ul>

    </div>

    <!-- MAIN CONTENT -->
    <div style="margin-left:220px; padding:30px;">
        <h1>Welcome, Admin 👋</h1>
        <p>This is your dashboard.</p>

        <!-- INFO CARDS -->
        <div style="display:flex; gap:20px; margin-top:30px;">

            <div style="background:white; padding:20px; border-radius:8px; width:200px;">
                <h3>Total Users</h3>
                <p>{{ $totalUsers }}</p>
            </div>

            @if(auth()->user()->role === 'super_admin')
            <div style="background:white; padding:20px; border-radius:8px; width:200px;">
                <h3>Admin Requests</h3>
                <p>{{ $pendingRequests }}</p>

                <a href="{{ route('admin.requests') }}">
                    Lihat Requests →
                </a>
            </div>
            @endif

        </div>


    </div>

</body>

</html>