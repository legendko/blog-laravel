@extends('main')

@section('title', '| Tags')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <Th>{{ $tag->id }}</Th>
                        <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="well">
                {!! Form::open(['route' => 'tags.store']) !!}
                    <h2>New Tag</h2>
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}<br>
                    {{ Form::submit('Create new tag', ['class' => 'btn btn-primary btn-block']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop