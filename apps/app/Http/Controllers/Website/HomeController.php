<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

use App\Models\WebsiteNoticeModel;

class HomeController extends Controller
{
    public function home()
    {
        $notice = WebsiteNoticeModel::where([
                ['enable_status','=','on'],
            ])->orderByDesc('id')->get();

        return view('website.home',compact('notice',));
    }

    public function noticeIndex()
    {
        $notice = WebsiteNoticeModel::where([
            ['enable_status','=','on'],
        ])->orderByDesc('id')->get();

        return view('website.noticeIndex',compact('notice'));
    }

    public function noticeShow($id)
    {
        $notice = WebsiteNoticeModel::where([
            ['enable_status','=','on'],
        ])->Where('id',$id)->first();

        return view('website.noticeShow',compact('notice'));
    }
}
