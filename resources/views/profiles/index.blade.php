@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 p-5 d-flex justify-content-center align-items-center">
            <img class="rounded-circle" src="https://scontent-arn2-1.cdninstagram.com/vp/b5d341f467e1a2ae125be982c8055a7a/5E2D16A2/t51.2885-19/s150x150/32669620_450944992006349_5886685285453922304_n.jpg?_nc_ht=scontent-arn2-1.cdninstagram.com" alt="">
        </div>
        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $user->username }}</h1>
                @can ('update', $user->profile)
                    <a href="/post/create">Add new post</a>
                @endcan
            </div>
            @can ('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> Posts</div>
                <div class="pr-5"><strong>109k</strong> Followers</div>
                <div class="pr-5"><strong>0</strong> Following</div>
            </div>
            <div class="pt-3">
                <p class="font-weight-bold mb-0">{{ $user->profile->title }}</p>
                <p>{{ $user->profile->description }}</p>
                <div><a href="{{ $user->profile->link }}">{{ $user->profile->link }}</a></div>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/post/{{ $post->id }}">
                <img class="w-100" src="/storage/{{ $post->image }}" alt="{{ $post->caption }}">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
