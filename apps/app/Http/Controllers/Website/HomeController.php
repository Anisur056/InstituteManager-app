<?php

namespace App\Http\Controllers\Website;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Website Notice & Gallery Model
use App\Models\WebsiteNoticeModel;
use App\Models\WebsiteGalleryModel;
use App\Models\WebsiteVideoGalleryModel;

// Online Admission Form Model
use App\Models\User;
use App\Models\InstituteAcademicYearsModel;
use App\Models\InstituteInfoModel;
use App\Models\InstituteBranchModel;
use App\Models\InstituteClassesModel;
use App\Models\InstituteShiftsModel;
use App\Models\InstituteSectionsModel;
use App\Models\InstituteGroupsModel;

class HomeController extends Controller
{
    public function home()
    {
        $notices = WebsiteNoticeModel::where([
            ['enable_status','=','on'],
        ])->orderByDesc('id')->get();

        $gallery = WebsiteGalleryModel::where([
            ['enable_status','=','on'],
        ])->orderByDesc('id')->get();

        $videoGallery = WebsiteVideoGalleryModel::where([
            ['enable_status','=','on'],
        ])->orderByDesc('id')->get();

        $teachers = User::where('status', 'active')
                ->whereIn('role', ['teacher','admin'])->orderByDesc('id')->get();

        return view('website.home',compact('notices','gallery','videoGallery','teachers'));
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

    public function galleryIndex()
    {
        $notices = WebsiteNoticeModel::where([
            ['enable_status','=','on'],
        ])->orderByDesc('id')->get();

        return view('website.noticeIndex',compact('notices'));
    }

    public function onlineAdmission()
    {

        $user = null;
        $academicYear = InstituteAcademicYearsModel::orderBy('id', 'desc')->get();
        $instituteInfo = InstituteInfoModel::all();
        $instituteBranch = InstituteBranchModel::all();
        $classes = InstituteClassesModel::all();
        $shifts = InstituteShiftsModel::all();
        $sections = InstituteSectionsModel::all();
        $groups = InstituteGroupsModel::all();
        $registration_id = Carbon::now()->format('ymdhis') . '-' . random_int(100000, 999999);

        return view('website.onlineAdmission',compact(
            'user',
            'academicYear',
            'instituteInfo',
            'instituteBranch',
            'classes',
            'shifts',
            'sections',
            'groups',
            'registration_id',
        ));
    }

    public function onlineAdmissionSubmit(Request $request)
    {
        return $request->all();
        $request->validate([
            'academic_year' => 'required',
            'institute_info' => 'required',
            'branch' => 'required',
        ]);

        // Handle the admission form submission logic here
        return redirect()->route('online.admission')->with('success', 'Admission form submitted successfully.');
    }
    
}
