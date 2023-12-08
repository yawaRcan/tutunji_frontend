<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    //LIST UNIQUE VISITORS TODAY
    public function listVisitorsToday(){
        $uniqueVisitorsToday = Visitor::query()->where('created_at', '>=', Carbon::today())->orderBy('id','desc')->get()->toArray();
        return view('admin.pages.visitors.list-unique-visitors-today',compact('uniqueVisitorsToday'));
    }
    //LIST TOTAL UNIQUE VISITORS
    public function listTotalVisitors(){
        $totalUniqueVisitors = Visitor::all();
        $getDailyData = Visitor::query()->where('created_at','>=',Carbon::today())->get();
        $getMonthlyData = Visitor::query()->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->orderBy('id','desc')
            ->get(['id','ip_address','visited_date','created_at']);
        return view('admin.pages.visitors.total-unique-visitors',compact('totalUniqueVisitors','getDailyData','getMonthlyData'));
    }

    public function get_list_of_visitors(Request $request) {
        if($request->input('type') == 'daily') {
            $getDailyData = Visitor::query()->where('created_at','>=',Carbon::today())->get();
        } else if($request->input('type') == 'monthly') {
            $getDailyData = Visitor::query()->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get(['id','ip_address','visited_date','created_at']);
        }  else if($request->input('type') == 'all_records') {
            $getDailyData = Visitor::all();
        } else {
            $getDailyData = [];
        }


        $array = [];
        if($getDailyData) {
            $no = 1;
            foreach ($getDailyData as $row) {
                $array[] = [
                    'No'            => $no++,
                    'ip_address'    => $row['ip_address'],
                    'visited_date'  => $row['visited_date'],
                    'action'        => '-',
                ];
            }
        }

        return [
            'draw'              => 1,
            'recordsTotal'      => count($getDailyData),
            'recordsFiltered'   => count($getDailyData),
            'data'              => $array
        ];
    }
    //all visitors
    public function allVisitors(){
        $allVisitors = Visitor::query()->orderBy('id','desc')->get();
        return view('admin.pages.visitors.all-visitors',compact('allVisitors'));
    }
    public function get_list_of_today_visitors() {
        $getTodayData = Visitor::query()->where('created_at','>=',Carbon::today())->orderBy('id','desc')->get();
        return view('admin.pages.visitors.today-visitors',compact('getTodayData'));
    }
}
