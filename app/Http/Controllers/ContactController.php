<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactEmail;
use Illuminate\Http\Request;

class ContactController extends Controller
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
        return view('contact', [
            "contactInformations" => $this->contactInformations,
        ]);
    }

    public function store(Request $request){
        try {
            $data = $request->only(["name", "email", "phone", "message"]);
            //insert db

            
            $this->sendMailContact($data);
            return true;
        } catch (\Throwable $th) {
            \Log::error($th);
        }
        return false;
    }
    

    private function sendMailContact($data){
        $name = $data["name"] ?? ""; 
        $email = $data["email"] ?? ""; 
        $phone = $data["phone"] ?? ""; 
        $message = $data["message"] ?? "";
        return SendContactEmail::dispatch($name, $phone, $email, $message);
    }
}