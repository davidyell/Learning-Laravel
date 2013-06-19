<?php
/**
 * Description of QuestionsController
 *
 * @author David Yell <neon1024@gmail.com>
 */

use Carbon\Carbon;

class QuestionsController extends BaseController {

    /**
     * List all the questions on the site
     *
     * @return View
     */
    public function getIndex() {
        $questions = Question::all();

        return View::make('questions/index')->with('questions', $questions);
    }

    public function getView($id) {
        $question = Question::find($id);

        return View::make('questions/view')->with('question', $question);
    }

    public function getVote($questionId, $vote) {
        $question = Question::find($questionId);
        if ($vote == 'up') {
            $question->upvotes = $question->upvotes + 1;
        } elseif ($vote == 'down') {
            $question->downvotes = $question->downvotes + 1;
        }
        $question->save();

        return $question->upvotes - $question->downvotes;
    }

}
