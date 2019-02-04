<?php namespace App\Http\Controllers;
use Request, Session;

class PasswordHashController extends Controller
{
    public function getIndex()
    {
        return view('password_hash', [
            'passwords' => Session::get('passwords', []),
            'hashes' => Session::get('hashes', []),
            'displayResults' => Session::get('displayResults', false),
            'algo' => Session::get('algo', PASSWORD_DEFAULT),
            'useSalt' => Session::get('useSalt', false),
            'salt' => Session::get('salt', ''),
            'useCost' => Session::get('useCost', false),
            'cost' => Session::get('cost', 10),
        ]);
    }

    public function postIndex()
    {
        $passwords = explode("\r\n", Request::input('passwords'));
        Session::flash('passwords', $passwords);
        $algo = Request::input('algo');
        Session::put('algo', $algo);
        $options = [];
        if (Request::has('useSalt')) {
            $options['salt'] = Request::input('salt');
            Session::put('salt', Request::input('salt'));
        } else {
            Session::forget('salt');
        }
        Session::put('useSalt', Request::has('useSalt'));
        if (Request::has('useCost')) {
            $options['cost'] = Request::input('cost');
            Session::put('cost', Request::input('cost'));
        } else {
            Session::forget('cost');
        }
        Session::put('useCost', Request::has('useCost'));
        $hashes = array_map(function($password) use ($algo, $options) {
            return password_hash($password, $algo, $options);
        }, $passwords);
        Session::flash('hashes', $hashes);
        Session::flash('displayResults', true);
        return redirect()->action("PasswordHashController@getIndex");
    }
}
