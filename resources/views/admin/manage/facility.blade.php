@extends('admin.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="float: left;">Facility List</h3>
        <a class="btn btn-sm btn-success" href="{{url('admin/manage/facility/create')}}" style="float: right;">
            <i class="fas fa-plus-circle"></i> 
            Add Facility
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($facilities as $facility)
                <tr>
                    <td>{{$facility->name}}</td>
                    <td style="display: flex; justify-content: center;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" id="dropdownAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Manage
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownAction">
                                <form action="#" method="POST" id="deleteForm">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a href="#" onclick="document.getElementById('deleteForm').submit()" class="dropdown-item">Delete</a>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection