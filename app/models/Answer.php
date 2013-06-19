<?php
/**
 * Description of Answer
 *
 * @author David Yell <neon1024@gmail.com>
 */
class Answer extends Eloquent {

    public function question() {
        return $this->belongsTo('Question');
    }

    public function user() {
        return $this->belongsTo('User');
    }

}
