@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}'s Profile</h1>
    <h2>Country: {{ $user->country->name}}</h2>
    <h2>Roles</h2>
    <ul>
    @foreach($user->roles as $role)
        <li>
            {{ $role->name }}
        </li>
    @endforeach
    </ul>
<hr>
    @foreach($user->articles as $article)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $article->title }} posted by {{ $article->user->name }}</div>

                    <div class="panel-body">
                        {{ $article->body }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <h1>Comments</h1>
    <ul>
    @foreach($user->comments as $comment)
        <li>{{ $comment->body }}</li>
    @endforeach
    </ul>
</div>
@endsection
