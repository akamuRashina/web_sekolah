<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Public Settings</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f4f6f8; margin:0;">

    <div style="max-width:700px; margin:50px auto; background:white; padding:30px; border-radius:8px;">

        <h1>Settings</h1>
        <p>Public access settings.</p>

        <hr>

        <ul>
            <li>
                <a href="{{ route('admin.apply') }}">
                    Apply to Become Admin
                </a>
            </li>

            <li>
                <a href="{{ route('login') }}">
                    Admin Login
                </a>
            </li>

            <li>
                <a href="#">
                    Help & Support
                </a>
            </li>

            <li>
                <a href="#">
                    About Application
                </a>
            </li>
        </ul>

        <hr>

        <a href="{{ route('dashboard') }}">← Back to Dashboard</a>

    </div>

</body>
</html>
