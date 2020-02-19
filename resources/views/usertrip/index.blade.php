@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    User Trip Ads List -
                    <a class="btn btn-success btn-sm" href="{{url('/usertrip/create')}}">Post Ads</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Location</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trips as $trip)
                            <tr>
                                <td><a href="/usertrip/{{$trip->id}}">{{$trip->name}}</a></td>
                                <td>{{$trip->location}}</td>
                                <td>{{$trip->price}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm btn-block" href="usertrip/{{$trip->id}}/edit">Edit</a>
                                    <br>
                                    <form action="{{action('UserTripController@destroy', $trip->id)}}" method="POST">
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