<?php

namespace App\Http\Controllers;

use App\Models\Book;

abstract class Controller
{
    public function success($message="success",$data=[], $status=200){

        return response()->json([
            'message'=>'success',
            'data'=> $data
        ],$status);
    }
}
