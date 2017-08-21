@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{ $post->title }}</h1>

    <div class="well">
        <p>{!! $post->body !!}</p>

          <hr>
            <small>Written on {{ $post->created_at }}</small>
        <a href="/posts/{{ $post->id }}/edit" class="btn btn-default"> Edit </a>

        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}

        {!! Form::close() !!}

    </div>
@endsection