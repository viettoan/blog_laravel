@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
    <div class="col-sm-9 col-md-10 content">
        <form role="form" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
               <p>
                   @if (isset($message))
                   {{$message}}
                   @endif
               </p>


                <label>Name</label>
                <div>
                    <input type="text" class="form-control" name="name" placeholder="User name" required>
                </div>
            </div>
            <div class="form-group">
                <label >Email address
                    <p>
                        @if(isset($email))
                            {{ $email }}
                        @endif
                    </p>
                </label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Avatar</label>
                <input type="file" name="avatar" >
                <img src="@if(isset($avatar)) {{ asset($avatar) }} @endif">
            </div>
            <div>
                <label>Level</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="level" value="1" >Admin
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="level" value="0" checked>User
                    </label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-default">Add user</button>
        </form>
    </div>
@endsection