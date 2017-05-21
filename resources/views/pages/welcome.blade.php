@extends('main')
    
@section('title', '| Homepage')
@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>Welcome to my Blog!</h1>
            <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please check it out!</p>
            
          </div>
        </div>
      </div>
      <!-- end of header .row -->

      <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="post">
                  <h3>{{ $post->title }}</h3>
                  <p>{{ str_limit(strip_tags($post->body), 300) }}</p>
                  <a href="{{ url("blog/$post->slug") }}" class="btn btn-primary">Read More</a>
                </div>

                <hr>
          @endforeach

        </div>

        
      </div>
@endsection
    
