<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactEmail;
use App\Models\Information;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    public function show(){

        $objects = Information::where(['type' => 'ABOUT'])->first();

        return view('about', [
            "about" => $objects,
        ]);
    }
}