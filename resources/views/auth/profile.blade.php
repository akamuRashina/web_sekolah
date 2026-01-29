<h2>Edit Profile</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <input name="name" value="{{ $user->name }}" required><br><br>
    <input type="email" name="email" value="{{ $user->email }}" required><br><br>
    <input type="password" name="password" placeholder="New password (optional)"><br><br>

    <button>Update</button>
</form>

<hr>

<form method="POST" action="{{ route('profile.delete') }}"
      onsubmit="return confirm('Are you sure?')">
    @csrf
    @method('DELETE')
    <button style="color:red">Delete Account</button>
</form>
