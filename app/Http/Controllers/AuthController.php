<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Dcblogdev\MsGraph\Facades\MsGraph;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function connect()
    {
//        dd(MsGraph::connect());
        return MsGraph::connect();

//        if (! MsGraph::isConnected()) {
//            return redirect('login')->with('error', "Couldn't connect.");
//        } else {
//            $data = MsGraph::emails();
//            return view('emails')->with([
//                'data' => $data
//            ]);
//        }
    }

    public function logout()
    {
//        if (MsGraph::isConnected()) {
            return MsGraph::disconnect();
//        }
    }
}
