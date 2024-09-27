<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        return view("feedback");
    }

    public function post(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email",
            "feedback" => "required|min5|max:200",
            "phone" => "required|phone:US,RU",
        ]);

        if(Auth::attempt($validated))
        {
            $request->session()->regenerate();

            return redirect()->route("main");
        }
    }
}
