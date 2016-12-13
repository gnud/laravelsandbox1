@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($articles as $article)
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $article->title }} posted by {{ $article->user->name }}</div>

                <div class="panel-body">
                    {{ $article->body }}
                    <h3>Comments</h3>
                    @foreach($article->comments as $comment)
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>

                                    <div class="panel-body">
                                        {{ $comment->body }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
