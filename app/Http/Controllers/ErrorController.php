<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function showError($errorCode, $errorMessage)
    {
        $data = [
            'errorTitle' => $errorCode,
            'errorMessage' => $errorMessage
        ];

        return view('error.index', $data);
    }
}