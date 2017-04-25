@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
    <div class="col-sm-9 col-md-10 content">
        <div class="form-group">
            <input type="text" name="search" id="search" class="form-control">
        </div>
        <ul id="result">
           
        </ul>
    
        <table id="index" class="table">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
                <th>Delete</th>
                <th>Edit</th>
            </thead>
            <tbody>
                @if (isset($users))
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
                                <button class="btn btn-danger del" data-id="{{ $user->id }}" >Delete</button>
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('user.edit', ['id' => $user->id]) }}">Edit</a>
                            </td>
                        </tr>

                    @endforeach
                @endif
                
            </tbody>
        </table>
        @if (isset($users)) 
            {{ $users->links() }}
        @endif    
    </div>

@endsection