@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 text-center">
            <h1>New post</h1>
        </div>
    </div>
    <form method="post" action="/post" enctype="multipart/form-data">
        @csrf

        <div class="col-8 offset-2">
            <div class="form-group col">
                <label for="caption" class="col-form-label">Post caption</label>

                <input id="caption"
                       type="text"
                       class="form-control @error('caption') is-invalid @enderror"
                       name="caption" value="{{ old('caption') }}"
                       autocomplete="caption"
                       autofocus>

                @error('caption')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col">
                <label for="image" class="col-form-label">Post image</label>

                <input type="file" class="form-control-file" name="image" id="image">

                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group col pt-4">
                <button class="btn btn-primary">Add new post</button>
            </div>
        </div>
    </form>
</div>
@endsection
