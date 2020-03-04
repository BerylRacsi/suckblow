@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Trip Ads List 
                </div>
                <div class="card-body">
                <p>Trips by Users</p>
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
                            @foreach($usertrips as $trip)
                            <tr>
                                <td>{{$trip->name}}</td>
                                <td>{{$trip->location}}</td>
                                <td>{{$trip->price}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm btn-block" href="{{url($url.'/usertrip/'.$trip->id)}}">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                <p>Trips by Partners</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Company</th>
                                <th scope="col">Location</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partnertrips as $trip)
                            <tr>
                                <td>{{$trip->name}}</td>
                                <td>{{$trip->location}}</td>
                                <td>{{$trip->price}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm btn-block" href="{{url($url.'/partnertrip/'.$trip->id)}}">Detail</a>
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