@extends('main')

@section('title', '|View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            @if (isset($post->image))
            <img src="{{ asset('images/'.$post->image) }}" height="400" width="800"/>
            @endif
            <h1>{{ $post->title }}</h1>
            <p class="lead">{!! $post->body !!}</p>
            <hr>
            <div class="tags">
                @foreach ($post->tags as $tag)
                <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </div>
            <div id="backend-comments" style="margin-top: 50px;">
                <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($post->comments()->orderBy('created_at', 'desc')->get() as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="{{ route('comments.destroy', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-vertical">
                    <dt>URL-slug:</dt>
                    <dd><a href="{{ url("blog/$post->slug") }}">{{ url("blog/$post->slug") }}</a></dd>
                </dl>
                <dl class="dl-vertical">
                    <dt>Category:</dt>
                    <dd>{{ $post->category->name }}</dd>
                </dl>
                <dl class="dl-vertical">
                    <dt>Created at:</dt>
                    <dd>{{ $dateCreate->format('j M Y H:i:s') }}</dd>
                </dl>
                <dl class="dl-vertical">
                    <dt>Last Updated:</dt>
                    <dd>{{ $dateUpdate->format('j M Y H:i:s') }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}                        
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}                        
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('posts.index', 'Back to posts', [], ['class' => 'btn btn-default btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection