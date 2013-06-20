@extends('layout')

@section('content')
    <h2>Login</h2>
    {{ Form::open(array('url' => 'users/login')) }}

        @if (Session::get('message'))
            <div class='alert alert-error'>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('message') }}
            </div>
        @endif
        
        {{ Form::label('email') }}
        {{ Form::text('email') }}

        {{ Form::label('password') }}
        {{ Form::password('password') }}

        {{ Form::submit('Login') }}
    {{ Form::close() }}
@stop