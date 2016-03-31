<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class JsonController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  String  $status
     * @param  Array  $data
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseJson($status, $data = null, $code = 200)
    {
        if ($status == 'error' || $status == 'fail') {
            $code = 400;
        }

        if ($data == null) {
            $res = [
                'status' => $status
            ];
        } else {
            $res = [
                'status' => $status,
                'data' => $data
            ];
        }

        return response()->json($res, $code);
    }
}
