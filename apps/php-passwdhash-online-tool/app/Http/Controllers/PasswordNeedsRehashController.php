<?php namespace app\Http\Controllers;
use Request, Session;

class PasswordNeedsRehashController extends Controller
{
    public function getIndex()
    {
        return view('password_needs_rehash', [
            'hashes' => Session::get('hashes', []),
            'displayResults' => Session::get('displayResults', false),
            'algo' => Session::get('algo', PASSWORD_DEFAULT),
            'useCost' => Session::get('useCost', false),
            'cost' => Session::get('cost', 10),
            'results' => Session::get('results', []),
        ]);
    }

    public function postIndex()
    {
        $hashes = explode("\r\n", Request::input('hashes'));
        Session::flash('hashes', $hashes);
        $algo = Request::input('algo');
        Session::put('algo', $algo);
        $options = [];
        Session::put('useSalt', Request::has('useSalt'));
        if (Request::has('useCost')) {
            $options['cost'] = Request::input('cost');
            Session::put('cost', Request::input('cost'));
        } else {
            Session::forget('cost');
        }
        Session::put('useCost', Request::has('useCost'));
        $results = array_map(function($hash) use ($algo, $options) {
            return [
                'hash' => $hash,
                'needsRehash' => password_needs_rehash($hash, $algo, $options),
            ];
        }, $hashes);
        Session::flash('results', $results);
        Session::flash('displayResults', true);
        return redirect()->action("PasswordNeedsRehashController@getIndex");
    }
}