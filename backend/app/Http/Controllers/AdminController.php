<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index()
    {
        // $event = Http::get('http://localhost:8000/api/event/')->json();
        return view('index');
    }
}
