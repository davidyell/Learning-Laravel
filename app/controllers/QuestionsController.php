<?php
/**
 * Description of QuestionsController
 *
 * @author David Yell <neon1024@gmail.com>
 */

class QuestionsController extends BaseController {

    /**
     * List all the questions on the site
     *
     * @return View
     */
    public function getIndex() {
        $questions = Question::orderBy('created_at', 'desc')->paginate(5);

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

    public function getAdd() {
        $tags = Tag::all(array('id', 'name'));
        $tag = Tag;
        return View::make('questions/add')->with('tags', $tags)->with('tag', $tag);
    }

    public function postAdd() {
        $question = new Question();
        $question->title = Input::get('title');
        $question->question = Input::get('question');
        $question->user_id = Auth::user()->id;

        if ($question->save()) {
            return Redirect::to("questions/view/{$question->id}")->with('success', 'Your question has been added');
        }

        return View::make('questions/add');
    }

}
