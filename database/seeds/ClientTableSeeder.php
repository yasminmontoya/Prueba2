<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client->name = "Cliente";
        $client->document = "123456789";
        $client->email = "cliente@gmail.com";
        $client->address = "Cra. 1 # 2 - 3";
        $client->save();
    }
}
