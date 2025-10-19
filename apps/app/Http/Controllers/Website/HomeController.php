<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

use App\Models\WebsiteNoticeModel;

class HomeController extends Controller
{
    public function home()
    {
        $notices = WebsiteNoticeModel::where([
            ['enable_status','=','on'],
        ])->orderByDesc('id')->get();

        return view('website.home',compact('notices'));
    }

    public function noticeIndex()
    {
        $notices = WebsiteNoticeModel::where([
            ['enable_status','=','on'],
        ])->orderByDesc('id')->get();

        return view('website.noticeIndex',compact('notices'));
    }

    public function noticeShow($id)
    {
        $notice = WebsiteNoticeModel::where([
            ['enable_status','=','on'],
        ])->Where('id',$id)->first();

        return view('website.noticeShow',compact('notice'));
    }
}
