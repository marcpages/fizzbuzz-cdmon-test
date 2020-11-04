<?php

namespace App\Http\Controllers;

use App\Services\FizzBuzzService;
use Illuminate\Http\Request;

class FizzBuzzController extends Controller
{

    public function get(Request $request) {
        $this->validate($request, [
            'number' => 'required|integer|between:1,100'
        ]);

        $number = $request->input('number');

        return response()->json([
            'output' => FizzBuzzService::getOutputFromNumber($number)
        ]);
    }

}
