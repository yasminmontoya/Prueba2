<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests\StoreClientRequest;

class ClientController extends Controller
{
    public function getAll()
    {
        $clients = Client::all();
        return $clients;
    }

}
