@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Select Ads to Post</div>

                <div class="card-body">
                     <div class="row">
                         <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Gear</h5>
                                        <a href="{{url($url.'/gear/create')}}" class="btn btn-primary">Post Ads</a>
                                </div>
                            </div>
                         </div>
                         <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Course</h5>
                                        <a href="{{url($url.'/course/create')}}" class="btn btn-primary">Post Ads</a>
                                </div>
                            </div>
                         </div>
                         <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Trip</h5>
                                        <a href="{{url($url.'/'.$url.'trip/create')}}" class="btn btn-primary">
                                        Post Ads
                                        </a>
                                </div>
                            </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection