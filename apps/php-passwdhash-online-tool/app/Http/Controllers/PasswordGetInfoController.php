<?php namespace app\Http\Controllers;
use Request, Session;

class PasswordGetInfoController extends Controller
{
    public function getIndex()
    {
        return view('password_get_info', [
            'displayResults' => Session::get('displayResults', false),
            'hashes' => Session::get('hashes', []),
            'results' => Session::get('results', []),
        ]);
    }

    public function postIndex()
    {
        $hashes = explode("\r\n", Request::input('hashes'));
        Session::flash('hashes', $hashes);
        $results = array_map(function($hash) {
            $info = password_get_info($hash);
            return [
                'hash' => $hash,
                'algo' => $info['algo'],
                'algoName' => $info['algoName'],
                'cost' => array_key_exists('cost', $info['options']) ? $info['options']['cost'] : null,
            ];
        }, $hashes);
        Session::flash('results', $results);
        Session::flash('displayResults', true);
        return redirect()->action("PasswordGetInfoController@getIndex");
    }
}