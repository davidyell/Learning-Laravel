@extends('layout')

@section('content')
    <h2>Latest questions</h2>
    @if (count($questions) > 0)
        @foreach($questions as $question)
            <div class="question">
                <span class="votes label">{{ $question->upvotes + $question->downvotes }}<br><small>votes</small></span>
                <span class="answers label">{{ count($question->answers) }}<br><small>answers</small></span>
                <h3><a href="{{ URL::to('questions/view', array($question->id)) }}" title="{{ $question->title }}">{{ $question->title }}</a></h3>
                <p class="user"><a href="{{ URL::to('users/view', array($question->user->id)) }}">{{ $question->user->name }}</a> {{ $question->created_at->diffForHumans() }}</p>
                <div class="clearfix"><!-- blank --></div>
            </div>
        @endforeach
    @else
        <p>No questions found. Create one now!</p>
    @endif
    {{ $questions->links(); }}
@stop