<?php

/**
 * Custome json response herlper
 *
 * @return response()
 */
if (! function_exists('customeResponse')) {
    function customeResponse($response, $message = null, $code = 200)
    {

        $json = [
            'response_code'    => $code,
            'response_data'    => $response,
            'response_message' => $message
        ];

        return response()->json($json);
    }
    
}
