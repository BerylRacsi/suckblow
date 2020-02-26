@extends('admin.app')

@section('content')
<!-- general form elements -->
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Edit Administrator Account</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{action('AdminController@update',$admin->id)}}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" value="{{$admin->name}}" id="name" name="name" placeholder="Full Name" required>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$admin->email}}" placeholder="Email Address" required>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong> 
                    </span>
                @enderror
            </div>
        </div>
        <!-- /.card-body -->
        <input type="hidden" name="_method" value="PUT">
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<!-- /.card -->
@endsection