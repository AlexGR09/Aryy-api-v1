<?php

$arr = [
    'status' => false,
    'code' => 0,
    'msg' => '',
    'data' => [],
];

function getResponse($code, $msg, $data)
{
    $arr = [];
    $arr['status'] = $code >= 200 && $code <= 399;
    $arr['code'] = $code;
    $arr['msg'] = $msg ?? '';
    $arr['data'] = $data ?? [];

    return response()
        ->json($arr, $code)
        ->header('Accept', 'application/json')
        ->header('Content-Type', 'application/json');
}

if (! function_exists('ok')) {
    function ok($message = '', $data = [])
    {
        return getResponse(200, $message,  $data);
    }
}

if (! function_exists('created')) {
    function created($message, $data = [])
    {
        return getResponse(201, $message, $data);
    }
}

if (! function_exists('accepted')) {
    function accepted($message, $data = [])
    {
        return getResponse(202, $message, $data);
    }
}

if (! function_exists('no_content')) {
    function no_content($message, $data = [])
    {
        return getResponse(204, $message, $data);
    }
}

if (! function_exists('bad_request')) {
    function bad_request($message, $data = [])
    {
        return getResponse(400, $message, $data);
    }
}

if (! function_exists('unauthorized')) {
    function unauthorized($message, $data = [])
    {
        return getResponse(401, $message, $data);
    }
}

if (! function_exists('payment_required')) {
    function payment_required($message, $data = [])
    {
        return getResponse(402, $message, $data);
    }
}

if (! function_exists('forbidden')) {
    function forbidden($message, $data = [])
    {
        return getResponse(403, $message, $data);
    }
}

if (! function_exists('not_found')) {
    function not_found($message, $data = [])
    {
        return getResponse(404, $message, $data);
    }
}

if (! function_exists('method_not_allowed')) {
    function method_not_allowed($message, $data = [])
    {
        return getResponse(405, $message, $data);
    }
}

if (! function_exists('not_acceptable')) {
    function not_acceptable($message, $data = [])
    {
        return getResponse(406, $message, $data);
    }
}

if (! function_exists('conflict')) {
    function conflict($message, $data = [])
    {
        return getResponse(409, $message, $data);
    }
}

if (! function_exists('expired')) {
    function expired($message, $data = [])
    {
        return getResponse(419, $message, $data);
    }
}

if (! function_exists('server_error')) {
    function server_error($message = 'Hubo un error, no se pudo completar la transacción', $data = [])
    {
        return getResponse(500, $message, $data);
    }
}

if (! function_exists('error_validate')) {
    function error_validate($message = 'La informacion enviada es invalida', $errors = [])
    {
        $arr = [];
        $arr['status'] = false;
        $arr['code'] = 422;
        $arr['msg'] = $message ?? '';
        $arr['errors'] = $errors;

        return response()
            ->json($arr, 422)
            ->header('Accept', 'application/json')
            ->header('Content-Type', 'application/json');
    }
}
