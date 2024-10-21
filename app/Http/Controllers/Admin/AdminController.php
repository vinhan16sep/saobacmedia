<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected $loggedinUsrId = null;
    private $storageUrl = '';
    private $appUrl = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
        
        $protocol = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) ? 'https://' : 'http://';
        $server = $_SERVER['SERVER_NAME'];
        $port = $_SERVER['SERVER_PORT'] ? ':'.$_SERVER['SERVER_PORT'] : '';
        $this->storageUrl = $protocol . $server . $port . '/storage/';
        $this->appUrl = $protocol . $server . $port;

        View::share('contactInformations', $this->contactInformations);
    }

    protected function uploadImage($path, $request) {
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }
        $upload = '';
        if($request->hasfile('image')) {
            $img = $request->file('image');
            $name = time() . str_pad(rand(1,1000000), 6, '0', STR_PAD_LEFT) . '.' . $img->extension();
            $img->storeAs($path, $name);
            // $upload = str_replace('public/', 'storage/', $path) . $name;  
            $upload = 'storage/' . $path . $name;
        }
        return $upload;
    }

    protected function uploadImages($path, $request, $input = 'image') {
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }
        $uploads = [];
        if($request->hasfile($input)) { 
            foreach($request->file($input) as $img) {
                $name = time() . str_pad(rand(1,1000000), 6, '0', STR_PAD_LEFT) . '.' . $img->extension();
                $img->storeAs($path, $name);
                $uploads[] = 'storage/' . $path . $name;
            }
        }

        return $uploads;
    }

    protected function updateImage($path, $request, $prevImg) {
        $upload = '';
        if($request->hasfile('image')) {
            Storage::delete(str_replace('storage', 'public', $prevImg));
            $upload = $this->uploadImage($path, $request);
        }
        return $upload;
    }

    protected function updateImages($path, $request, $inputUpload = 'image') {
        $uploads = [];
        if($request->hasfile($inputUpload)) {
            Storage::deleteDirectory($path);
            $uploads = $this->uploadImages($path, $request, $inputUpload);
        }
        return $uploads;
    }

    protected function deleteImage($path) {
        return Storage::deleteDirectory($path);
    }
}
