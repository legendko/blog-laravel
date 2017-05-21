@extends('main')

@section('title', '| Blog')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div>

    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $post->title }}</h2>
            <h5>Published: {{ $post->created_at->format('j M Y H:i:s') }}</h5>
            
            <p>{{ str_limit(strip_tags($post->body), 250) }}</p>
            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read more</a>
            <hr>
        </div>
    </div>
    @endforeach
    
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@stop
