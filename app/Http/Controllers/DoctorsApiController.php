<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Doctor;

class DoctorsApiController extends Controller
{
    public function list()
    {
        $response = Doctor::all();

        return $response;

    }
}
