<?php
/**
 * Description of Tag
 *
 * @author David Yell <neon1024@gmail.com>
 */
class Tag extends Eloquent {

    public function questions() {
        return $this->belongsToMany('Question');
    }

}
