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
                    Course Ads List -
                    <a class="btn btn-success btn-sm" href="{{url($url.'/course/create')}}">Post Ads</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Diver ID</th>
                                <th scope="col">Agency</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td><a href="{{url($url.'/course/'.$course->id)}}">{{$course->name}}</a></td>
                                <td>{{$course->diver}}</td>
                                <td>{{$course->agency}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm btn-block" href="{{url($url.'/course/'.$course->id.'/edit')}}">Edit</a>
                                    <br>
                                    <form action="{{url($url.'/course/'.$course->id)}}" method="POST">
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