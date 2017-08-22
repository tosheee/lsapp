@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a class="btn btn-primary" href="/posts/create">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>

                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td><a class="btn btn-default" href="/posts/{{ $post->id }}/edit">Edit</a></td>
                                <td>

                                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}

                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
