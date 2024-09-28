<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage; // for file storage
use Illuminate\Support\Facades\Hash;

class ApiFeedbackController extends Controller
{
    public function index()
    {
        return view('login.forgotpass');
    }

    public function feedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => ["required", "email"],
            "feedback" => ["required", "min:5", "max:200"],
            "phone" => ["required", "phone:US,RU"],
            "attachment" => ["nullable", "file", "mimes:jpg,jpeg,png,pdf", "max:2048"], // limit file size to 2MB and allow certain types
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()], 401);
        }

        $filePath = null;
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('feedback_attachments', 'public'); // stores in 'storage/app/public/feedback_attachments'
        }

        $admin = User::where('id', '1')->first();
        
        if (!$admin) {
            return response()->json(["error" => "Admin not found"], 404);
        }

        $feedbackData = [
            'email' => $request->email,
            'feedback' => $request->feedback,
            'phone' => $request->phone,
            'filePath' => $filePath, 
        ];

        Mail::to($admin->email)->send(new FeedbackMail($feedbackData));

        return response()->json(["message" => "Feedback sent successfully!"]);
    }
}