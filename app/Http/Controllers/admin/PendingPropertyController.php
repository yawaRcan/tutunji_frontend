<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;

class PendingPropertyController extends Controller
{
    //LIST PENDING PROPERTY PAGE
    public function pendingProperty(){
        //display agent data in popup dropdown list
        $get_agent = DB::table('agents')->select('id','fullName')->get();
        $name = $get_agent ? $get_agent : 0;
        if(!empty($name)){
            foreach ($name as $agentData){
                 $data[$agentData->id ? $agentData->id : 0] = $agentData->fullName;
            }
           if(empty($data)){
               $data = null;
           }
        }

        $query = Property::query()->where('internal_status','!=', '1')->where('property_type','sale')->with('property_media')->orderBy('id', 'desc')
            ->with('cat_details')->get()->toArray();
        return view('admin.pages.pending-property.list-pending-property',compact('query','data'));
    }
    //UPDATE PENDING PROPERTY STATUS
    public function propertyStatus(Request $request)
    {
        $property = Property::query()->where('id', $request->input('a_id'));
        if(!$property){
            //$propertyStatus = Property::query()->where('id','=',$request->input('a_id'))->pluck('internal_status');
            return response()->json(['success' => '0', 'message' => 'Error! Invalid property id.']);

        }else{
            $property->update(['internal_status' => '1','agent_id' => $request->get('agent')]);
            return response()->json(['success' => '1', 'message' => 'Success! Property Approved.']);
        }
//
//        $property->update(['internal_status' => '1']);
////        $propertyStatus = Property::where('id',$statusId)->pluck('internal_status');
//        if($propertyStatus[0] == 1)
//        {
//            $update = array('internal_status' => 0);
//            DB::table('properties')->where('id', $statusId)->update($update);
//            return redirect('/admin/list-pending-property')->with('success','Success! Property added.');
//        }else{
////            $update = array('internal_status' => 1,'approved_at' => Carbon::now());
//            $update = array('internal_status' => 1);
//            DB::table('properties')->where('id', $statusId)->update($update);
//            return redirect('/admin/list-pending-property')->with('get_agent')->with('success','Success! Property now approved.');
//        }
//        return redirect()->back();
    }
    //REJECT REASON USING AJAX
    public function reject_reason(Request $request){
        $property = Property::query()->where('id', $request->input('p_id'));
        if(!$property)
            return response()->json(['success' => '0', 'message' => 'Error! Invalid property id.']);
        $property->update([
            'reject_reason' => $request->get('reason'),
            'internal_status' => '2'
        ]);
        return response()->json(['success' => '1', 'message' => 'Success! Property rejected.']);
    }
    //VIEW PROPERTY
    public function viewProperty($propertyId){
        //GET PROPERTY DATA
        $propertyDetail = DB::table('properties')
            ->where('id','=',$propertyId)->get();
        //GET MEDIA DATA
        $getMedia = DB::table('property_media')
            ->select('id','media_name','media_type')->where('property_id',$propertyId)->get();
        return view('admin.pages.pending-property.view-pending-property',compact('propertyDetail','getMedia'));
    }
    //ALL REJECTED PROPERTIES
    public function rejected_properties(){
        $rejectedProperties = Property::query()->where('internal_status','=',2)->orderBy('id','desc')->with('cat_details')->get();
        return view('admin.pages.pending-property.rejected-property',compact('rejectedProperties'));
    }
    //ALL PENDING PROPERTIES
    public function pending_properties(){
        $pendingProperties = Property::query()->where('internal_status','=',0)->where('property_type','=','sale')->orderBy('id','desc')
            ->with('cat_details')->get();
        return view('admin.pages.pending-property.all-pending-property',compact('pendingProperties'));
    }
}
