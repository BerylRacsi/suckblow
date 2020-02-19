@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Gear Ads</div>
                
                <div class="card-body">
                    <form method="POST" action="{{action('GearController@update', $gear->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <select id="category" name="category" class="form-control" required autofocus>
                                    <option value="{{$gear->category}}" selected>{{$gear->category}}</option>
                                    <option value="Regulator">Regulator</option>
                                    <option value="Mask">Mask</option>
                                    <option value="Fins">Fins</option>
                                    <option value="Buoyancy Compensation Device (BCD)">Buoyancy Compensation Device (BCD)</option>
                                    <option value="Wetsuit">Wetsuit</option>
                                    <option value="Torch">Torch</option>
                                    <option value="Hook">Hook</option>
                                    <option value="Surface Marker Buoy (SMB) & Reels">Surface Marker Buoy (SMB) & Reels</option>
                                    <option value="Accessories">Accessories</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Product Name" value="{{$gear->name}}" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" type="textarea" class="form-control @error('description') is-invalid @enderror" name="description"  placeholder="Describe your product here" required>{{$gear->description}}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input id="price" data-type="currency" type="text" class="form-control @error('price') is-invalid @enderror" name="price"  placeholder="Price" value="{{$gear->price}}" required>
                                </div>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="condition" class="col-md-4 col-form-label text-md-right">Condition</label>

                            <div class="col-md-6" style="padding-top: 5px">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="new" value="true" {{ ($gear->condition == 1) ? 'checked = "checked" ' :''}}>
                                    <label class="form-check-label" for="new">New</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="used" value="false" {{ ($gear->condition == 0) ? 'checked = "checked" ' :''}}>
                                    <label class="form-check-label" for="used">Used</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="warranty" class="col-md-4 col-form-label text-md-right">Warranty</label>

                            <div class="col-md-6" style="padding-top: 5px">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="warranty" id="yes" value="true" {{ ($gear->warranty == 1) ? 'checked = "checked" ' :''}}>
                                    <label class="form-check-label" for="new">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="warranty" id="no" value="false" {{ ($gear->warranty == 0) ? 'checked = "checked" ' :''}}>
                                    <label class="form-check-label" for="used">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">Youtube Link</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link"  placeholder="e.g. youtube.com/watch?v=dQw4w9WgXcQ" value="{{$gear->link}}" required>

                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">
                                Product Images
                                <p class="text-muted" align="left">* Maximum 5 images allowed<br>* Only upload if you need to change the images, otherwise leave it blank.</p>
                            </label>

                            <div class="col-md-6">
                                <input type="file" name="image[]" class="form-control-file" multiple="true">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        Please correct following errors:
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection