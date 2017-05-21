@extends('main')

@section('title', '| Edit Post')

@section('stylesheets')

    {!! Html::style('css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

@endsection

@section('content')
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="row">
        <div class="col-md-8">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ["class" => "form-control input-lg"]) }}
            <br>
            {{ Form::label('category_id', 'Category:') }}
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select><br>
            {{ Form::label('tags', 'Tags:') }}
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <br>
            
            {{ Form::label('featured_image', 'Update featured image:') }}
            {{ Form::file('featured_image') }}
            
            <br>
            {{ Form::label('body', 'Post body:') }}
            {{ Form::textarea('body', null, ["class" => "form-control"]) }}            
        </div>
    </div>
    <br>
    <div class='row'>
        <div class="col-md-4">
            <div class="well">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}                        
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-block')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}    
    
    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
    </script>

@endsection