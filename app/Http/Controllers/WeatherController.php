<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        try {
            $res = $client->request('GET', 'http://api.weatherstack.com/current?access_key=b1bf7a1a1c2aebfaa4d42bbd4e18dc89&query=Bryansk');

            $status = $res->getStatusCode();
            $body = $res->getBody()->getContents();
        } catch (RequestException $e) {
            echo 'server not accessible ';
            die();
        }
        $data['temperature'] = (json_decode($body)->current->temperature);
        return view('weather', $data);
        //return view('welcome');
    }


}
