<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;
use Validator;

class WebsiteMemberController extends Controller
{
    //LIST USERS PROPERTY
    public function listWebsiteMember(){
        $memberData = User::query()->where('role','=','user')->orderBy('id','desc')->get();
        return view('admin.pages.website-member.list-website-member',compact('memberData'));
    }
    //NEW WEBSITE MEMBER
    public function todayWebsiteMember(){
        $todayMemberData = User::query()->where('created_at', '>=', Carbon::today())->orderBy('id','desc')->get()->toArray();
        //retu$todayMemberData[0]['image'];
        return view('admin.pages.website-member.list-new-website-member',compact('todayMemberData'));
    }
    //edit newsletter
    public function edit_website_member($memberId){
        $websiteMemberData = DB::table('users')->where('id','=',$memberId)->get();
        return view('admin.pages.website-member.edit-website-member',compact('websiteMemberData'));
    }
    //update newsletter
    public function update_website_member(Request $request,$memberId){
        $rules = [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return redirect('/admin/edit-website-member/'.$memberId)->withErrors($validator)->withInput();
        }else {

            if ($request->hasFile('profileImage')) {
//                return "true";
                $floor2dPrevImage = DB::table('users')->where('id', '=', $memberId)->get();
                $oldImage = $floor2dPrevImage[0]->image;
                if (File::exists(public_path('frontend/assets/profile/' . $oldImage))) {
                    File::delete(public_path('frontend/assets/profile/' . $oldImage));

                    $imageName = 'userImage' . '-' . time() . '.' . $request->profileImage->extension();
                    $request->profileImage->move(public_path('frontend/assets/profile/'), $imageName);

                    DB::table('users')->where('id', $memberId)
                        ->update(['image' => $imageName]);
                } else {
                    $imageName = null;
                }
            } DB::table('users')->where('id', '=', $memberId)->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone')
            ]);
        }
        return redirect('/admin/list-website-member')->with('success','Success! Website Members Updated.');
    }
    //delete newsletter
    public function destroyWebsiteMember($memberId){
        $memberData = User::findOrFail($memberId);
        $memberData->delete();
        return redirect('/admin/list-website-member')->with('success', 'Success! Website Members Deleted.');
    }
}
