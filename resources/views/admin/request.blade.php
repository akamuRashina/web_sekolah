<h2>Admin Requests</h2>

@foreach($requests as $r)
    <p>{{ $r->name }} - {{ $r->email }}</p>

    <form method="POST" action="/admin/requests/{{ $r->id }}/approve">
        @csrf
        <button>Approve</button>
    </form>

    <form method="POST" action="/admin/requests/{{ $r->id }}/reject">
        @csrf
        <button>Reject</button>
    </form>
@endforeach
