<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: Arial, sans-serif; background:#f4f6f8; margin:0;">

    <div style="max-width:600px; margin:50px auto; background:white; padding:30px; border-radius:8px;">
        <h2>Profile Settings</h2>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <p style="color:green;">{{ session('success') }}</p>
        @endif

        {{-- ERROR MESSAGE --}}
        @if($errors->any())
            <ul style="color:red;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {{-- UPDATE PROFILE --}}
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom:15px;">
                <label>Name</label><br>
                <input type="text" name="name"
                       value="{{ auth()->user()->name }}"
                       required
                       style="width:100%; padding:8px;">
            </div>

            <div style="margin-bottom:15px;">
                <label>Email</label><br>
                <input type="email" name="email"
                       value="{{ auth()->user()->email }}"
                       required
                       style="width:100%; padding:8px;">
            </div>

            <button type="submit"
                    style="padding:10px 15px; background:#2563eb; color:white; border:none;">
                Update Profile
            </button>
        </form>

        <hr style="margin:30px 0;">

        {{-- DELETE ACCOUNT --}}
        <h3>Danger Zone</h3>

        <form action="{{ route('profile.delete') }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete your account?');">
            @csrf
            @method('DELETE')

            <button type="submit"
                    style="padding:10px 15px; background:#dc2626; color:white; border:none;">
                Delete Account
            </button>
        </form>

        <br>
        <a href="{{ route('admin.dashboard') }}">← Back to Dashboard</a>
    </div>

</body>
</html>
