<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class ApiBaseController extends Controller
{


    public function sendResponse($result=[], $deleted=[], $message=[], $interval)
    {
    	$response = [
            'status' => true,
            'message' => $message,
            'createdOrUpdated'    => $result,
            'deleted'      => $deleted,
            'interval'=> $interval,
        ];

        return response()->json($response, 200);
    }


    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}