<h2>Admin Requests</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

@if($requests->isEmpty())
    <p>No pending admin requests.</p>
@endif

@foreach($requests as $req)
    <div style="border:1px solid #ccc; padding:15px; margin-bottom:10px;">
        <p><b>Name:</b> {{ $req->name }}</p>
        <p><b>Email:</b> {{ $req->email }}</p>
        <p><b>Reason:</b> {{ $req->reason }}</p>

        <form method="POST" action="{{ route('admin.requests.approve', $req->id) }}">
            @csrf
            <button>Approve</button>
        </form>
    </div>
@endforeach
