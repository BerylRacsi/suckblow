@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Select Ads to View</div>

                <div class="card-body">
                     <div class="row">
                         <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Gear</h5>
                                        <a href="{{url($url.'/gear')}}" class="btn btn-primary">View Ads</a>
                                </div>
                            </div>
                         </div>
                         <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Course</h5>
                                        <a href="{{url($url.'/course')}}" class="btn btn-primary">View Ads</a>
                                </div>
                            </div>
                         </div>
                         <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Trip</h5>
                                        <a href="{{url($url.'/trip')}}" class="btn btn-primary">View Ads</a>
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