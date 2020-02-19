@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Gear Ads List -
                    <a class="btn btn-success btn-sm" href="{{url('/gear/create')}}">Post Ads</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gears as $gear)
                            <tr>
                                <td><a href="/gear/{{$gear->id}}">{{$gear->name}}</a></td>
                                <td>{{$gear->category}}</td>
                                <td>{{$gear->price}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm btn-block" href="gear/{{$gear->id}}/edit">Edit</a>
                                    <br>
                                    <form action="{{action('GearController@destroy', $gear->id)}}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-sm btn-block btn-danger" type="submit" >
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection