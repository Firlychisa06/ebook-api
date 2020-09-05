<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me()
    {
        return
        [
            "NIS" => "3103118066",
            "Name" => "Firly Chisa Putri",
            "Gender" => "Female",
            "Phone" => "081329989742",
            "Kelas" => "XII RPL 2",
        ];
    }
}
