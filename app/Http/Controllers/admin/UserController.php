<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\Property;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userIndex(){
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
        $uniqueVisitorsToday = DB::table('visitors')->where('visited_date', '=',date('Y-m-d'))->get()->count();
        return view('admin.pages.admin-users.user-dashboard',compact('totalSaleProperty','totalNewsletterMembers','totalWebsiteMembers',
            'todayWebsiteMembers','todayNewsletterMembers','totalPreConstructProperty','totalPendingProperty','totalSubmitPropertyToday',
            'visitorsData','uniqueVisitorsToday','websiteMembersData','newsletterMembersData','todaySalePropertyData'));
    }
    public function listAdminUsers(){
        $usersData = AdminUser::query()->with('role_detail')->orderBy('id','desc')->get();
        return view('admin.pages.admin-users.list-admin-users',compact('usersData'));
    }
}
