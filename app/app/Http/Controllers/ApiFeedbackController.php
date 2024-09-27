<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ApiFeedbackController extends Controller
{
    public function feedback(Request $request)
    {
        $data = $request->json()->all();
        $validator = Validator::make($data, [
            "email" => ["required", "email"],
            "feedback" => ["required", "min:5", "max:200"],
            "phone" => ["required","phone:US,RU"],
        ]);

        if($validator->fails())
        {
            return response()->json(["error" => $validator->errors()], 401);
        }

        return response()->json([
            //"token" => $user->createToken("api")->plainTextToken
        ]);
    }
}
