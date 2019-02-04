<?php namespace app\Http\Controllers;
use Request, Session;

class PasswordVerifyController extends Controller
{
    public function getIndex()
    {
        return view('password_verify', [
            'passwords' => Session::get('passwords', []),
            'hashes' => Session::get('hashes', []),
            'displayResults' => Session::get('displayResults', false),
            'results' => Session::get('results', []),
            'resultCount' => count(Session::get('results', [])),
            'okCount' => Session::get('okCount', 0),
        ]);
    }

    public function postIndex()
    {
        $passwords = explode("\r\n", Request::input('passwords'));
        $hashes = explode("\r\n", Request::input('hashes'));
        Session::flash('hashes', $hashes);
        Session::flash('passwords', $passwords);
        $results = array_map(function($hash, $password) {
            return [
                'ok' => password_verify($password, $hash),
                'hash' => $hash,
                'password' => $password,
            ];
        }, $hashes, $passwords);
        $okCount = count(array_filter($results, function($result) {
            return $result['ok'];
        }));
        Session::flash('results', $results);
        Session::flash('okCount', $okCount);
        Session::flash('displayResults', true);
        return redirect()->action("PasswordVerifyController@getIndex");
    }
}