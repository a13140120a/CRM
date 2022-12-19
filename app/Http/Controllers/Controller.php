<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function ReturnJsonSuccessMsg($data)
    {
        if (is_string($data)) {
            return response()->json(array("status" => true, "message" => $data));
        }else {
            return response()->json(array("status" => true, "body" => $data));
        }

    }

    public static function ReturnJsonFailMsg($data)
    {
        return response()->json(array("status" => false, 'error' => $data));
    }

    public function validate($request, $rule)
    {
        $error_message = [
            'required' => 'The :attribute field is required.',
            'unique' => 'The :attribute field must be unique.',
            'exists' => 'The :attribute doesn\'t exist.' 
        ];

        $validator = Validator::make($request->all(), $rule, $error_message);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $requests = $request->all();
            Log::error("validate error, request: ");
            Log::error($requests);
            Log::error("error: ");
            Log::error($errors);
            throw new HttpResponseException(Controller::ReturnJsonFailMsg(config('app.error_code.field_error')));
        }

    }
}
