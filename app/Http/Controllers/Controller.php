<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ApiRessponse($data, $message = null, $status = true, $errors = [])
    {
        return response([
            'status' => $status,
            'message' => $message,
            'results' => $data,
            'errors'  => $errors
        ]);
    }
}
