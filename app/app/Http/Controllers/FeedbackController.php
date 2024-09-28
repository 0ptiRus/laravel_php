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
        return redirect()->route("main")->with('status', 'Feedback submitted!');
    }
}
