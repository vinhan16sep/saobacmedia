<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Information;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $activedParentCategories = [];
    protected $contactInformations = [];
    protected $activeBanners = [];
    protected $ver = '';
    protected $currentAction = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->contactInformations = $this->getContactInformations();
        $this->activeBanners = $this->getActiveBanners();
        $this->ver = Config::get('site_settings.assets_ver');
        $this->currentAction = Request::segment(1);
        View::share('contactInformations', $this->contactInformations);
        View::share('activedParentCategories', $this->activedParentCategories);
        View::share('activeBanners', $this->activeBanners);
        View::share('ver', $this->ver);
        View::share('currentAction', $this->currentAction);
    }

    protected function getContactInformations() {
        $objects = Information::where(['type' => 'CONTACT'])->get()->toArray();
        $contactInformations = [];
        foreach ($objects as $item) {
            $contactInformations[$item['label']] = $item['value'];
        }
        return $contactInformations;
    }

    protected function getActiveBanners() {
        return Banner::where(['is_active' => '1'])->get();
    }
}
