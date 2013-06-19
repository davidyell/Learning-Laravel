<?php
/**
 * Description of Question
 *
 * @author David Yell <neon1024@gmail.com>
 */
class Question extends Eloquent {

    public function answers() {
        return $this->hasMany('Answer');
    }

    public function user() {
        return $this->belongsTo('User');
    }

}