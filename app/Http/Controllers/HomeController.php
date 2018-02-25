<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Control;
use Twitter;

class HomeController extends Controller
{
    public function index()
    {
        $control = new Control();
        $data['dados'] = $control->selectAll(5);

        return view('pages/index', compact('data'));
    }

    public function post(Request $request)
    {
        $control = new Control();
        $data['dados'] = $control->selectAll(5);

        $data = $request->all();
        Control::create($data);

        $tweets = Twitter::getSearch([
            'q' => $data['name'],
            'until' => date('Y-m-d'),
            'count' => 15,
            'result_type' => 'recent'
        ]);

        foreach($tweets->statuses as $index => $tweet) {
            $data['tweet'][$index]['id'] = $tweet->id_str;
            $data['tweet'][$index]['text'] = $tweet->text;
            $data['tweet'][$index]['link'] = Twitter::linkTweet($tweet);
            $data['tweet'][$index]['user'] = $tweet->user->name;
            $data['tweet'][$index]['user_link'] = Twitter::linkUser($tweet->user);
        }

        return view('pages/index', compact('data'));
    }
}
