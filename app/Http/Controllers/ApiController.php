<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected function sendSuccess($data = [], $massage = 'success'){
        return response()->json([
            "code" => 200,
            "massage" => $massage,
            "data"=> $data
        ],200);
    }
    protected function sendMassage( $massage = 'success'){
        return response()->json([
            "code" => 200,
            "massage" => $massage
        ],200);
    }

    protected function sendUnauthorized($massage = 'Unauthorized'){
        return response()->json([
            "code" => 401,
            "massage" => $massage
        ],401);
    }
    protected function sendBadrequest($massage = 'Bad Request'){
        return response()->json([
            "code" => 400,
            "massage" => $massage
        ],400);
    }
    protected function sendForbidden($massage = 'Forbiden'){
        return response()->json([
            "code" => 403,
            "massage" => $massage
        ],403);
    }

}
