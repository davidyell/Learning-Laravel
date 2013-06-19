@extends('layout')

@section('content')
    <h2>Add a new question</h2>
    {{ Form::open(array('url' => 'questions/add')) }}
        {{ Form::label('title') }}
        {{ Form::text('title') }}

        {{ Form::label('question') }}
        {{ Form::textarea('question') }}
        
        {{ Form::submit('Save') }}
    {{ Form::close() }}
@stop