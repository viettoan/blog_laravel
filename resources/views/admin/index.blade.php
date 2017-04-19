@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
    <div class="col-sm-9 col-md-10 content">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
                <th>Delete</th>
                <th>Edit</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->level }}
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('user.destroy', ['id' => $user->id]) }}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('user.edit', ['id' => $user->id]) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>

@endsection