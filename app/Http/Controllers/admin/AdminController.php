<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\AdminUsers;
use App\Models\Amenities;
use App\Models\Inquiry;
use App\Models\Permission;
use App\Models\Property;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Validator;
use Auth;
use Carbon\Carbon;
class AdminController extends Controller
{
    //ADMIN DASHBOARD PAGE
    public function index(Request $request){

//        if($request->session()->has('loginId')){
            //TOTAL COUNT SALE PROPERTY
            $totalSaleProperty = DB::table('properties')->where('property_type','=','sale')
                ->where('internal_status','=','1')->count();
            //TOTAL COUNT PRE-CONSTRUCT PROPERTY
            $totalPreConstructProperty = DB::table('properties')->where('property_type','=','pre-construct')->count();
            //TOTAL COUNT NEWSLETTER(SUBSCRIBERS) MEMBERS
            $totalNewsletterMembers = DB::table('subscribers')->count();
            //TOTAL COUNT WEBSITE MEMBERS
            $totalWebsiteMembers = DB::table('users')->where('role','=','user')->count();
            //TOTAL COUNT TODAY WEBSITE MEMBERS
            $todayWebsiteMembers = DB::table('users')->where('created_at', '>=', Carbon::today())->get()->count();
            //TOTAL COUNT TODAY NEWSLETTER MEMBERS
            $todayNewsletterMembers = DB::table('subscribers')->where('created_at', '>=', Carbon::today())->get()->count();
            //TOTAL COUNT PENDING PROPERTY
            $totalPendingProperty = DB::table('properties')->where('property_type','=','sale')->where('internal_status','=','0')->get()->count();
            //TOTAL COUNT TODAY SUBMIT PROPERTY
            $totalSubmitPropertyToday = DB::table('properties')->where('property_type','=','sale')->where('internal_status','=','1')
                ->where('created_at', '>=', Carbon::today())->get()->count();
            //UNIQUE VISITORS TODAY
            $uniqueVisitorsToday = DB::table('visitors')->where('visited_date', '=',Carbon::today())->get()->count();
            //TOTAL UNIQUE VISITORS TODAY
            $totalUniqueVisitors = DB::table('visitors')->count();
            //Pre-construction Submission Today
            $todaySubmissionPreConstruct = Inquiry::query()->where('created_at','>=',Carbon::today())->get()->count();
            //All Active Pre-construction Submission
            $allActivePreConstructionSubmission = Inquiry::query()->count();
            //Daily Unique Visitors
//            $dailyUniqueVisitorsData = array();
//            for($i = 0; $i < 30; $i++)
//                $dailyUniqueVisitorsData[] = Visitor::query()->select('id')->where("visited_date",'=',
//                date("Y-m-d", strtotime('-'. $i .' days')))->count();
            //$dailyUniqueVisitors = Visitor::query()->where('visited_date', '>=', Carbon::now()->subDay())->get()->count();
            //$dailyUniqueVisitors = Visitor::query()->whereDate('created_at', Carbon::today())->get();
            $dailyUniqueVisitors = [];
            $time = [];
            for($i = 25; $i > 1; $i--) {
                $start_time = $i - 1;
                $time[] = date('H:i', strtotime( $start_time.'hours')).' To '.date('H:i', strtotime( $i.'hours'));
                $dailyUniqueVisitors[] = Visitor::query()->select('id')
                    ->where('visited_date', Carbon::today())
                    ->where('visited_time', '>=', date('H:00:00', strtotime( $start_time.'hours')))
                    ->where('visited_time', '<=', date('H:00:00', strtotime( $i.'hours')))
                    ->count();
            }
//        echo '<pre>';
//        print_r($dailyUniqueVisitors);exit();
            //LAST 30 DAYS UNIQUE WEBSITE VISITORS
            $visitorsData = array();
            for($i = 0; $i < 30; $i++)
                $visitorsData[] = Visitor::query()->select('id')->where("visited_date",'=',
                    date("Y-m-d", strtotime('-'. $i .' days')))->count();
            //LAST 30 DAYS WEBSITE VISITORS
            $websiteMembersData = array();
            for($i = 0; $i < 30; $i++)
                $websiteMembersData[] = User::query()->select('id')->where("created_at",'=',
                    date("Y-m-d", strtotime('-'. $i .' days')))->count();
            //LAST 30 DAYS NEWSLETTER MEMBERS
            $newsletterMembersData = array();
            for($i = 0; $i < 30; $i++) {
                $newsletterMembersData[] = Subscriber::query()->select('id')->where("created_at", 'like', '%' .
                    date("Y-m-d", strtotime('-'. $i .' days')).'%')->count();
            }
            //LAST 30 DAYS SALE PROPERTY
            $todaySalePropertyData = array();
            for($i = 0; $i < 30; $i++) {
                $todaySalePropertyData[] = Property::query()->select('id')->where("created_at", 'like', '%' .
                    date("Y-m-d", strtotime('-'. $i .' days')).'%')->with('property_type','=','sale')->count();
            }
            //TODAY SUBMISSION
            $todaySubmission = array();
            for($i = 0; $i < 30; $i++) {
                $todaySubmission[] = Inquiry::query()->select('id')->where("created_at", 'like', '%' .
                    date("Y-m-d", strtotime('-'. $i .' days')).'%')->count();
            }

            return view('admin.pages.dashboard',compact('totalSaleProperty','totalNewsletterMembers','totalWebsiteMembers',
                'todayWebsiteMembers','todayNewsletterMembers','totalPreConstructProperty','totalPendingProperty','totalSubmitPropertyToday',
                'visitorsData','uniqueVisitorsToday','websiteMembersData','newsletterMembersData','todaySalePropertyData','totalUniqueVisitors',
                'dailyUniqueVisitors', 'time','todaySubmissionPreConstruct','allActivePreConstructionSubmission','todaySubmission'));
    }
}
