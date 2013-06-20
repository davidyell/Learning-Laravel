@extends('layout')

@section('content')
    <h2>{{ $user->name }}</h2>

    <div class='row'>
        <div class='span6'>
            <h3>Questions</h3>
            <ul>
            @foreach ($user->questions as $question)
                <?php $votes = $question->upvotes - $question->downvotes; ?>
                <li>{{ HTML::link('questions/view/' . $question->id, '(' . $votes . ') ' . $question->title) }}</li>
            @endforeach
            </ul>
        </div>
        <div class='span6'>
            <h3>Answers</h3>
            <ul>
            @foreach ($user->answers as $answer)
                <?php $votes = $answer->upvotes - $answer->downvotes; ?>
                <li>{{ HTML::link('questions/view/' . $answer->question->id, '(' . $votes . ') ' . $answer->question->title) }}</li>
            @endforeach
            </ul>
        </div>
    </div>
@stop