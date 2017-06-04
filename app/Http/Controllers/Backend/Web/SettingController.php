<?php

namespace App\Http\Controllers\Backend\Web;

use App\Http\Controllers\Backend\BackendController;
use Illuminate\Http\Request;

class SettingController extends BackendController
{
    //
    public function index(Request $request){
        return view('backend.web.setting-index');
//        return '站点配置控制器';
    }
}
