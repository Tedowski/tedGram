@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 text-center">
            <h1>Edit profile</h1>
        </div>
    </div>
    <form method="post" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="col-8 offset-2">
            <div class="form-group col">
                <label for="title" class="col-form-label">Title</label>

                <input id="title"
                       type="text"
                       class="form-control @error('title') is-invalid @enderror"
                       name="title"
                       value="{{ old('title') ?? $user->profile->title }}"
                       autocomplete="title"
                       autofocus>

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col">
                <label for="description" class="col-form-label">Description</label>

                <input id="description"
                       type="text"
                       class="form-control @error('description') is-invalid @enderror"
                       name="description" value="{{ old('description') ?? $user->profile->description }}"
                       autocomplete="description"
                       autofocus>

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col">
                <label for="url" class="col-form-label">Link</label>

                <input id="link"
                       type="text"
                       class="form-control @error('link') is-invalid @enderror"
                       name="link" value="{{ old('link') ?? $user->profile->link }}"
                       autocomplete="link"
                       autofocus>

                @error('link')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col">
                <label for="image" class="col-form-label">Profile image</label>

                <input type="file" class="form-control-file" name="image" id="image">

                @error('image')
                <strong>{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group col pt-4">
                <button class="btn btn-primary">Save profile</button>
            </div>
        </div>
    </form>
</div>
@endsection
