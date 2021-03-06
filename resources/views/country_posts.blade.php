@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $country->name }}</h1>
    @foreach($country->articles as $article)
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
