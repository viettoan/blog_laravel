@section('sidebar')
<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="active"><a href="#">Users Management </a></li>
        <li><a href="{{ route('user.create') }}">Add User</a></li>
        <li><a href="{{ route('user.index') }}">View Users</a></li>

    </ul>

</div>
@endsection