@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}'s Profile</h1>
    <h2>Country: {{ $user->address->country}}</h2>
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

</div>
@endsection
