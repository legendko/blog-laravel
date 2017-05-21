@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(['route' => 'posts.store', 'id' => 'store', 'files' => true]) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required', 'maxlength' => '191')) }}                
                <br>
                {{ Form::label('category_id', 'Category:') }}
                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                {{ Form::label('tags', 'Tags:') }}
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                <br>
                
                {{ Form::label('featured_image', 'Upload featured image:') }}
                {{ Form::file('featured_image') }}
                
                <br>
                {{ Form::label('body', 'Post Body:') }}
                {{ Form::textarea('body', null, array('class' => 'form-control')) }}
                <br>
                {{ Form::submit('Create Post', array('class' => 'btn btn-primary btn-block')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script>
      $('#store').parsley();
    </script>
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

@endsection
