<?php
/**
 * Description of UsersController
 *
 * @author David Yell <neon1024@gmail.com>
 */
class UsersController extends BaseController {

    public function getLogin() {
        return View::make('users/login');
    }

    public function postLogin() {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
            return Redirect::intended('/');
        } else {
            return Redirect::to('users/login')
                    ->with('message', 'Email or password incorrect')
                    ->withInput(Input::except('password'));
        }
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to('questions/index');
    }

    public function getView($userId) {
        $user = User::find($userId);
        return View::make('users/view')->with('user', $user);
    }

}
;