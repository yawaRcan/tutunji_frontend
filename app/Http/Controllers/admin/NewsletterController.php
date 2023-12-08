<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class NewsletterController extends Controller
{
    //LIST NEWSLETTER MEMBERS
    public function listNewsletter(){
        $newsletterData = Subscriber::query()->orderBy('id','desc')->get();
        return view('admin.pages.newsletter.list-newsletter',compact('newsletterData'));
    }
    //LIST TODAY NEWSLETTER MEMBERS
    public function todayNewsletter(){
        $todaySubscribers = DB::table('subscribers')->where('created_at', '>=', Carbon::today())->orderBy('id','desc')->get()->toArray();
        return view('admin.pages.newsletter.list-new-newsletter',compact('todaySubscribers'));
    }
    //edit newsletter
    public function editNewsletter($newsletterId){
        $newsletterData = DB::table('subscribers')->where('id','=',$newsletterId)->get();
        return view('admin.pages.newsletter.edit-newsletter',compact('newsletterData'));
    }
    //update newsletter
    public function updateNewsletter(Request $request,$newsletterId){
        $rules = [
            'email' => 'required|email',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return redirect('/admin/edit-newsletter/'.$newsletterId)->withErrors($validator)->withInput();
        }else{
            DB::table('subscribers')->where('id','=',$newsletterId)->update(['email' => $request->get('email')]);
        }
        return redirect('/admin/list-newsletter')->with('success','Success! Newsletter Members Updated.');
    }
    //delete newsletter
    public function destroyNewsletter($newsletterId){
        $newsletterData = Subscriber::findOrFail($newsletterId);
        $newsletterData->delete();
        return redirect('/admin/list-newsletter')->with('success', 'Success! Newsletter Members Deleted.');
    }
}
