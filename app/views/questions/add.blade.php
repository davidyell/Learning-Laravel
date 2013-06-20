@extends('layout')

@section('content')
    <h2>Add a new question</h2>
    {{ Form::open(array('url' => 'questions/add')) }}
        {{ Form::label('title') }}
        {{ Form::text('title') }}

        {{ Form::label('question') }}
        {{ Form::textarea('question') }}

        {{ Form::model($tag, array('route' => array('tag.name', $tag->id))) }}

        <div class='clearfix'><!-- blank --></div>
        {{ Form::submit('Save') }}
    {{ Form::close() }}
@stop