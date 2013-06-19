@extends('layout')

@section('content')
    <div id='view-question' class='well'>
        <div class='votes'>
            <span class='upvote'data-id='{{ $question->id }}' data-type='question' data-vote='up'>&uarr;</span>
            <span class='num'>{{ $question->upvotes - $question->downvotes }}</span>
            <span class='downvote'data-id='{{ $question->id }}' data-type='question' data-vote='down'>&darr;</span>
        </div>
        <div class='question-content'>
            <h2>{{ $question->title }}</h2>
            <p>{{ $question->question }}</p>
            <p class="user"><a href="{{ URL::to('users/view', array($question->user->id)) }}">{{ $question->user->name }}</a> {{ $question->created_at->diffForHumans() }}</p>
            <div class='clearfix'><!-- blank --></div>
        </div>
    </div>

    <div id='answers'>
        @foreach($question->answers as $answer)
            <div class='view-answer'>
                <div class='votes'>
                    <span class='upvote' data-id='{{ $answer->id }}' data-type='answer' data-vote='up'>&uarr;</span>
                    <span class='num'>{{ $answer->upvotes - $answer->downvotes }}</span>
                    <span class='downvote' data-id='{{ $answer->id }}' data-type='answer' data-vote='down'>&darr;</span>
                </div>
                <div class='answer-content'>
                    <p>{{ $answer->answer }}</p>
                    <p class="user"><a href="{{ URL::to('users/view', array($answer->user_id)) }}">{{ $answer->user->name }}</a> {{ $answer->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class='clearfix'><!-- blank --></div>
        @endforeach

        <div class='write-answer'>
            <h3>Your answer</h3>
            {{ Form::open(array('url' => URL::to('answers/add', array($question->id)))) }}
                {{ Form::textarea('answer') }}
                {{ Form::submit('Save') }}
            {{ Form::close() }}
        </div>
    </div>
@stop