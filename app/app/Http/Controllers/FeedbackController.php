<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FeedbackController extends Controller
{
    public function index()
    {
        return view("feedback");
    }

    public function post(Request $request)
    {
        $data = [
            'email' => $request->email,
            'feedback' => $request->feedback,
            'phone' => $request->phone,
        ];

        if ($request->hasFile('attachment')) {
            $data['attachment'] = fopen($request->file('attachment')->getPathname(), 'r');
        }

        $response = Http::attach(
            'attachment', $request->file('attachment'), $request->file('attachment')->getClientOriginalName()
        )->post('https://localhost:8082/api/feedback', $data);

        if ($response->successful()) {
            return redirect()->route('main')->with('status', 'Feedback submitted successfully!');
        } else {
            return back()->withErrors('Error submitting feedback: ' . $response->body());
        }
    }
}