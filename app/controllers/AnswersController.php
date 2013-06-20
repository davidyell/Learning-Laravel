<?php
/**
 * Description of AnswersController
 *
 * @author David Yell <neon1024@gmail.com>
 */
class AnswersController extends BaseController {

    public function postAdd($questionId) {
        $answer = new Answer();
        $answer->question_id = $questionId;
        $answer->answer = Input::get('answer');
        $answer->user_id = Auth::user()->id;

        if ($answer->save()) {
            return Redirect::to('questions/view/' . $questionId)->with('success', 'Your answer was added.');
        } else {
            return Redirect::to('questions/view/' . $questionId)->with('success', 'Your answer could not be added.');
        }
    }

    public function getVote($answerId, $vote) {
        $answer = Answer::find($answerId);
        if ($vote == 'up') {
            $answer->upvotes = $answer->upvotes + 1;
        } elseif ($vote == 'down') {
            $answer->downvotes = $answer->downvotes + 1;
        }
        $answer->save();

        return $answer->upvotes - $answer->downvotes;
    }

}
