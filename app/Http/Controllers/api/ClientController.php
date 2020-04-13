<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;

class ClientController extends Controller
{
    public function getAll()
    {
        $clients = Client::all();
        return $clients;
    }

}
