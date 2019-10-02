@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Post</h1>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-8 offset-2">
            <div class="row">
                <div class="col-8">
                    <img class="w-100" src="/storage/{{ $post->image }}" alt="">
                </div>
                <div class="col-4">
                    <div>
                        <h3>{{ $post->user->username }}</h3>
                    </div>
                    <div>
                        <p>{{ $post->caption }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
