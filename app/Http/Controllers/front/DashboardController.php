<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\Inquiry;
use App\Models\Offer;
use App\Models\Property;
use App\Models\PropertyView;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
/*use Illuminate\Support\Facades\Password;*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Rules\IsValidPassword;
use Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use File;
class DashboardController extends Controller
{
    //DASHBOARD PAGE
//    public function index(Request $request){
//        if(Auth::check()){
//            if($request->session()->has('media_name')) {
//                $request->session()->remove('media_name');
//            }
//
//
//            //$totalActivePropertyLastOneHour = DB::table('properties')->select(DB::raw('hour(created_time)'), DB::raw('COUNT(id)'))->groupBy(DB::raw('hour(created_time)'))->get()->count();
//            $totalActivePropertyLastOneHour = Property::query()->select('id')
//                                                               ->where('created_at', '>', Carbon::now()->subMinutes(60))
//                                                               ->count();
//            $totalListingActiveOneHour = [];
//            $time1 = [];
//            for($i = 25; $i > 1; $i--) {
//                $start_time = $i - 1;
//                $time1[] = date('H:i', strtotime( $start_time.'hours')).' To '.date('H:i', strtotime( $i.'hours'));
//                $totalListingActiveOneHour[] = Property::query()->select('id')
//                                                                ->where('created_date', Carbon::today())
//                                                                ->where('created_time', '>=', date('H:00:00', strtotime( $start_time.'hours')))
//                                                                ->where('created_time', '<=', date('H:00:00', strtotime( $i.'hours')))
//                                                                ->count();
//            }
//
//            //Listing Active Last 6 Hour(for dashboard-box)
//            //$totalActivePropertyLastSixHour = \DB::table('properties')->where('created_date', Carbon::today())->where('created_time', '>=', \DB::raw('DATE_SUB(NOW(), INTERVAL 6 HOUR)'))->count();
//
//            $totalActivePropertyLastSixHour = Property::query()->select('id')
//                                                                ->where('created_at', '>', Carbon::now()->subMinutes(360))
//                                                                ->count();
//            $totalListingActiveSixHour = [];
//            $time2 = [];
//            for($i = 25; $i > 1; $i--) {
//                $start_time = $i - 6;
//                $time2[] = date('H:i', strtotime( $start_time.'hours')).' To '.date('H:i', strtotime( $i.'hours'));
//                $totalListingActiveSixHour[] = Property::query()->select('id')
//                                                                ->where('created_date', Carbon::today())
//                                                                ->where('created_time', '>=', date('H:00:00', strtotime( $start_time.'hours')))
//                                                                ->where('created_time', '<=', date('H:00:00', strtotime( $i.'hours')))
//                                                                ->count();
//            }
//
//            $totalActivePropertyLast24Hour = Property::query()->where('created_at', '>', Carbon::now()->subMinutes(1440))->get()->count();
//            $totalListingActiveDaily = [];
//
//            for($i = 0; $i < 30; $i++) {
//                $totalListingActiveDaily[] = Property::query()->select('id')->where("created_at", 'like', '%' .
//                    date("Y-m-d", strtotime('-'. $i .' days')).'%')->count();
//            }
//
//            //Listing Active Last 1 week(for dashboard-box)
//            $totalActivePropertyLastOneWeek = Property::query()->where('created_date', '>=', Carbon::now()->subDays(7))->get()->count();
//            //Listing Active Last 1 week(Chart View)
//            $totalListingActiveOneWeek = array();
////            $day = ['01','02','03','04','05','06','07'];
//            for($i = 0; $i < 7; $i++) {
//                //return Property::query()->where('user_id','=',Auth::user()->id)->where('property_type', '=','sale')->where('created_date', '>=', Carbon::now()->subDays(7))->get()->count();
//                $totalListingActiveOneWeek[] = Property::query()->select('id')->where("created_date", 'like', '%' .
//                        date("Y-m-d", strtotime('-'. $i .' days')).'%')->count();
//            }
//            //Listing Active Last 1 Month(for dashboard-box)
//            $totalActivePropertyLastOneMonth = Property::query()->whereMonth('created_date', '=', Carbon::now()->subMonth()->month)->count();
//            $totalListingActiveMonth = [];
//            $month = ['01','02','03','04','05','06','07','08','09','10','11','12'];
//            foreach ($month as $m) {
//                $totalListingActiveMonth[] = Property::query()->select('id')->where("created_date", 'like', '%'.date('Y').'-'.$m.'%')->count();
//            }
//
//            //Property views Last 1 hour(for dashboard-box)
//            $totalPropertyViewLastOneHour = PropertyView::query()->select('id')
//                                                ->where('created_at', '>', Carbon::now()->subMinutes(60))->count();
//            //Property views Last 1 hour(Chart view)
//            $property_views_one_hour = [];
//            $time21 = [];
//            for($i = 25; $i > 1; $i--) {
//                $start_time21 = $i - 1;
//                $time21[] = date('H:i', strtotime( $start_time21.'hours')).' To '.date('H:i', strtotime( $i.'hours'));
//                $property_views_one_hour[] = PropertyView::query()->select('id')
//                    ->where('visited_date', Carbon::today())
//                    ->where('visited_time', '>=', date('H:00:00', strtotime( $start_time21.'hours')))
//                    ->where('visited_time', '<=', date('H:00:00', strtotime( $i.'hours')))
//                    ->count();
//            }
////            for($i = 25; $i > 1; $i--) {
////                $start_time21 = $i - 1;
////                $time21[] = date('H:i', strtotime( $start_time21.'hours')).' To '.date('H:i', strtotime( $i.'hours'));
////                $property_views_one_hour[] = PropertyView::query()->select('id')
////                    ->where('visited_date', Carbon::today())
////                    ->where('visited_time', '>=', date('H:00:00', strtotime( $start_time.'hours')))
////                    ->where('visited_time', '<=', date('H:00:00', strtotime( $i.'hours')))
////                    ->count();
////            }
//            //Property views Last 6 Hour(for dashboard-box)
//            $totalPropertyViewsLastSixHours = PropertyView::query()->select('id')
//                ->where('created_at', '>', Carbon::now()->subMinutes(360))
//                ->count();
//            //Property views Last 6 hour(Chart View)
//            $property_views_six_hours = [];
//            $time22 = [];
//            for($i = 25; $i > 1; $i--) {
//                $start_time = $i - 6;
//                $time22[] = date('H:i', strtotime( $start_time.'hours')).' To '.date('H:i', strtotime( $i.'hours'));
//                $property_views_six_hours[] = PropertyView::query()->select('id')
//                    ->where('visited_date', Carbon::today())
//                    ->where('visited_time', '>=', date('H:00:00', strtotime( $start_time.'hours')))
//                    ->where('visited_time', '<=', date('H:00:00', strtotime( $i.'hours')))
//                    ->count();
//            }
//            //Property views last 1 day(for dashboard-box)
//            $totalPropertyViewsLast24Hour = PropertyView::query()->where('created_at', '>', Carbon::now()->subMinutes(1440))->get()->count();
//            //Property Views last 1 day(Chart view)
//            $property_views_24_hours = [];
//
//            for($i = 0; $i < 30; $i++) {
//                $property_views_24_hours[] = PropertyView::query()->select('id')->where("created_at", 'like', '%' .
//                    date("Y-m-d", strtotime('-'. $i .' days')).'%')->count();
//            }
////            $property_views_24_hours = array();
////            for($i = 0; $i < 30; $i++) {
////                $property_views_24_hours[] = PropertyView::query()->select('id')->where("created_at", 'like', '%' .
////                    date("Y-m-d", strtotime('-'. $i .' days')).'%')->count();
////            }
//            //Property Views Last 1 week(for dashboard-box)
//            $totalPropertyViewsLastOneWeek = PropertyView::query()->where('visited_date', '>=', Carbon::now()->subDays(7))->get()->count();
//            //Property views Last 1 week(Chart View)
//            $property_views_week = array();
////            $day = ['01','02','03','04','05','06','07'];
//            for($i = 0; $i < 7; $i++) {
//                //return Property::query()->where('user_id','=',Auth::user()->id)->where('property_type', '=','sale')->where('created_date', '>=', Carbon::now()->subDays(7))->get()->count();
//                $property_views_week[] = PropertyView::query()->select('id')->where("visited_date", 'like', '%' .
//                        date("Y-m-d", strtotime('-'. $i .' days')).'%')->count();
//            }
//            //Property View For Last 1 Month(for dashboard-box)
//            $totalPropertyViewsLastOneMonth = PropertyView::query()->whereMonth('visited_date', '=', Carbon::now()->subMonth()->month)->count();
//            //Property views For Last 1 month(Chart View)
//            $property_views_month = [];
//            $month = ['01','02','03','04','05','06','07','08','09','10','11','12'];
//
//            foreach ($month as $m) {
//              $property_views_month[] = PropertyView::query()->select('id')->where("visited_date", 'like', '%'.date('Y').'-'.$m.'%')->count();
//            }
//            //offers Last 1 hour(for dashboard-box)
//            $totalOffersOneHourBoxView = Offer::query()->select('id')
//                ->where('created_at', '>', Carbon::now()->subMinutes(60))
//                ->count();
//            //offers Last 1 hour(Chart view)
//            $totalOffersOneHourChartView = [];
//            $time31 = [];
//            for($i = 25; $i > 1; $i--) {
//                $start_time = $i - 1;
//                $time31[] = date('H:i', strtotime( $start_time.'hours')).' To '.date('H:i', strtotime( $i.'hours'));
//                $totalOffersOneHourChartView[] = Offer::query()->select('id')
//                    ->where('created_date', Carbon::today())
//                    ->where('created_time', '>=', date('H:00:00', strtotime( $start_time.'hours')))
//                    ->where('created_time', '<=', date('H:00:00', strtotime( $i.'hours')))
//                    ->count();
//            }
//            //offers Last 6 hour(dashboard-Box)
//            $totalOffersSixHoursBoxView = Offer::query()->select('id')
//                ->where('created_at', '>', Carbon::now()->subMinutes(360))
//                ->count();
//            //offers Last 6 hour(Chart view)
//            $totalOffersSixHoursChartView = [];
//            $time32 = [];
//            for($i = 25; $i > 1; $i--) {
//                $start_time = $i - 6;
//                $time32[] = date('H:i', strtotime( $start_time.'hours')).' To '.date('H:i', strtotime( $i.'hours'));
//                $totalOffersSixHoursChartView[] = Offer::query()->select('id')
//                    ->where('created_date', Carbon::today())
//                    ->where('created_time', '>=', date('H:00:00', strtotime( $start_time.'hours')))
//                    ->where('created_time', '<=', date('H:00:00', strtotime( $i.'hours')))
//                    ->count();
//            }
//            //Offers Last 24 Hour(1 Day)(for dashboard-box)
//            $totalOffersOneDayBoxView = Offer::query()->where('created_at', '>', Carbon::now()->subMinutes(1440))->get()->count();
//            //Offers one Day(for chart view)
//            $totalOffersOneDayChartView = array();
//
//            for($i = 0; $i < 30; $i++) {
//                $totalOffersOneDayChartView[] = Offer::query()->select('id')->where("created_at", 'like', '%' .
//                    date("Y-m-d", strtotime('-'. $i .' days')).'%')->count();
//            }
//            //Offers For Last 1 week(for dashboard-box)
//            $totalOffersOneWeekBoxView = Offer::query()->where('created_date', '>=', Carbon::now()->subDays(7))->get()->count();
//            //Offers For 1 Week(Chart View)
//            $totalOffersOneWeekChartView = array();
////            $day = ['01','02','03','04','05','06','07'];
//            for($i = 0; $i < 7; $i++) {
//                //return Property::query()->where('user_id','=',Auth::user()->id)->where('property_type', '=','sale')->where('created_date', '>=', Carbon::now()->subDays(7))->get()->count();
//                $totalOffersOneWeekChartView[] = Offer::query()->select('id')->where("created_date", 'like', '%' .
//                        date("Y-m-d", strtotime('-'. $i .' days')).'%')->count();
//            }
//            //Offers Last 1 Month(for dashboard-box)
//            $totalOffersOneMonthBoxView = Offer::query()->whereMonth('created_date', '=', Carbon::now()->subMonth()->month)->count();
//            //offer For 1 Month(Chart View)
//            $totalOffersOneMonthChartView = [];
//            $month = ['01','02','03','04','05','06','07','08','09','10','11','12'];
//            foreach ($month as $m) {
//                $totalOffersOneMonthChartView[] = Offer::query()->select('id')->where("created_date", 'like', '%'.date('Y').'-'.$m.'%')->count();
//            }
//
//            return view('frontend.dashboard.pages.dashboard',compact('totalListingActiveOneHour','time1','totalListingActiveSixHour','time2','totalListingActiveDaily'
//                ,'totalListingActiveOneWeek', 'totalListingActiveMonth','totalActivePropertyLastOneHour','totalActivePropertyLastSixHour','totalActivePropertyLast24Hour'
//                ,'totalActivePropertyLastOneWeek','totalActivePropertyLastOneMonth','totalPropertyViewLastOneHour','property_views_one_hour','time21','time22','property_views_six_hours'
//                ,'totalPropertyViewsLastSixHours','property_views_24_hours','totalPropertyViewsLast24Hour','property_views_week','totalPropertyViewsLastOneWeek','property_views_month'
//                ,'totalPropertyViewsLastOneMonth','totalOffersOneHourBoxView','time31','totalOffersOneHourChartView','totalOffersSixHoursBoxView','totalOffersSixHoursChartView','time32'
//                ,'totalOffersOneDayBoxView','totalOffersOneDayChartView','totalOffersOneWeekBoxView','totalOffersOneWeekChartView','totalOffersOneMonthBoxView','totalOffersOneMonthChartView'));
//        }else{
//            return redirect('/coming-soon');
////            return redirect('/sign-in');
//        }
//    }
    //MY-PROPERTIES PAGE
    public function my_properties(Request $request){
        //return Favourite::all();
        if(Auth::check()){
            $query = Property::query()->where('user_id','=',Auth::id())
                ->with('property_media','user_details','fav_data')->orderBy('id','DESC')->with(['agent_details','property_views','property_offer'])
                ->paginate(3);
            //return $query;
//            $property_views = PropertyView::query()->selectRaw("property_id,count(*) as total")
//                ->groupBy('property_id')
//                ->get();
            //return $property_views[0]['total'];
//            $propertyViews = PropertyView::all();
//            foreach($property_views as $p_views ) {
//                $views_data  = PropertyView::query()->selectRaw("property_id,count(*) as total")
//                    ->groupBy('property_id')
//                    ->get();
//            }
//            return $views_data;exit();
            //return $p_views = PropertyView::query()->where('property_id',$query[0]['id'])->get()->count();
            //$totalPropertyViews = Property::query()->where('id', $query[0]['id'])->first()->property_views()->count();
            //$totalViewsToday = PropertyView::query()->where('property_id', '=',$query[0]['id'])->where('visited_date','=',Carbon::today())->get();
            //return $totalOffers = Offer::query()->where('property_id','=',$query[0]['id'])->count();

            //$property_id = $query->id != null ? $query->id : null;
            //$property_views = PropertyView::query()->where('property_id','=',$property_id)->get();
            return view('frontend.dashboard.pages.my-property',compact('query'));
        }else{
            return redirect('/coming-soon');
//            return redirect('/sign-in');
        }
    }
//    public static function getStudents()
//    {
//
//    }
    //MY-PROFILE PAGE
    public function my_profile(){
        if(Auth::check()){
            $userId = Auth::user()->id;
            $profile_data = DB::table('users')->where('id','=',$userId)->get();
            $name = $profile_data[0]->name;
            $name = explode(' ',$name);
            //GET FIRST-NAME AND LAST-NAME VALUE FROM NAME
            $first_name = isset($name[0]) ? $name[0] : '';
            $last_name = isset($name[1]) ? $name[1] : '';
            return view('frontend.dashboard.pages.my-profile',compact('profile_data','first_name','last_name'));
        }else{
            return redirect('/coming-soon');
//            return redirect('/sign-in');
        }
    }
    //UPDATE PROFILE DATA
    public function updateProfile(Request $request)
    {
        //APPLY VALIDATION RULES
        $validator = Validator::make($request->all(),[
            'userFirstName' => 'required',
            'userLastName' => 'required',
        ]);
        if ($validator->fails())
        {
            $validation_error = "";
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $validation_error .= $value[0]."<br>";
            }
            $response = array('success' => '0', 'message' => $validation_error);
        }else{
            $userId = Auth::user()->id;
            DB::table('users')->where('id', $userId)
                ->update([
                    'name' => $request->get('userFirstName').' '.$request->get('userLastName'),
                    'phone' => $request->get('userPhone'),
                    'mobile' =>$request->get('userMobile'),
                    'skype' => $request->get('userSkype'),
                    'facebook_url' => $request->get('userFaceBookUrl'),
                    'instagram_url' => $request->get('userInstagramUrl'),
                    'twitter_url' => $request->get('userTwitterUrl'),
                    'pinterest_url' => $request->get('userPinterestUrl'),
                    'linkedIn_url' => $request->get('userLinkedInUrl'),
                    'website_url' => $request->get('userWebUrl'),
                    'position' => $request->get('userTitle'),
                    'about_user' => $request->get('userAboutMe')
                ]);
            $response = array('success' => '1', 'message' => 'Profile Updated.');
        }
        return response()->json($response);
    }
    //UPLOAD PROFILE IMAGE USING AJAX
    public function saveProfileImage(Request $request){
        $file       = $request->file('file');

        $mediaType  = $file->getMimeType();

        $validator = Validator::make($request->all(), [
            'file' => ($mediaType == 'application/pdf') ? 'required|mimes:pdf|max:2048' : 'required|image|max:2048|mimes:jpg,jpeg,png|dimensions:min_width=500,min_height=500',
        ]);

        $imageName = '';
        if ($validator->passes()) {
            $user_id = Auth::user()->id;
            if($request->has('file')) {

                $profileImage   = DB::table('users')->where('id','=',$user_id)->get();
                $oldImage       = $profileImage[0]->image;

                if(File::exists(public_path('frontend/assets/profile/'.$oldImage))) {
                    File::delete(public_path('frontend/assets/profile/'.$oldImage));
                }

                $imageName = time() . '.' . $request->file->getClientOriginalExtension();
                $request->file->move(public_path('frontend/assets/profile/'), $imageName);
                DB::table('users')->where('id',$user_id)->update(['image'=>$imageName]);

            }

            return ['code' => 200, 'message' => 'Image uploaded','data' => $imageName];
        }else{
            //ERROR RESPONSE
            return ['code' => 500, 'message' => 'You select Invalid File Format.'];
        }
    }
    //CHANGE PASSWORD USING AJAX
    public function changePassword(Request $request){
        //APPLY VALIDATION RULES
        $validator = Validator::make($request->all(),[
            'currentPassword' => 'required',
            'newPassword' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'confirmPassword' => 'required_with:newPassword|same:newPassword',
        ]);
        if ($validator->fails())
        {
            $validation_error = "";
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $validation_error .= $value[0]."<br>";
            }
            $response = array('success' => '0', 'message' => $validation_error);
            //return Redirect('/front/register')->withErrors($validator)->withInput();
        }else {
            //GET CURRENT LOGGED-IN USER PASSWORD
            $hashedPassword = Auth::user()->password;
            if (Hash::check($request->currentPassword, $hashedPassword)) {
                //$user_id = Auth::user()->id;
                $new_password = $request->get('newPassword');
                $confirmPassword = $request->get('confirmPassword');
                if ($new_password == $confirmPassword) {
                    DB::table('users')->where('id', Auth::user()->id)
                        ->update(['password' => Hash::make($confirmPassword)]);
                    $response = array('success' => '2', 'message' => 'Password updated');
                }
            } else {
                $response = array('success' => '1', 'message' => 'current Password is Incorrect');
            }
        }
        return response()->json($response);
    }
    //CHANGE EMAIL USING AJAX
    public function changeEmail(Request $request){
        //APPLY VALIDATION RULES
        $validator = Validator::make($request->all(),[
            'currentEmail' => 'required',
            'newEmail' => 'required',
            'confirm_password' => 'required',
        ]);
        if ($validator->fails())
        {
            $validation_error = "";
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $validation_error .= $value[0]."<br>";
            }
            $response = array('success' => '0', 'message' => $validation_error);
            //return Redirect('/front/register')->withErrors($validator)->withInput();
        }else{
            $current_email = $request->get('currentEmail');
            $new_email = $request->get('newEmail');
            if(Auth::user()->email == $current_email){
                DB::table('users')->where('id',Auth::user()->id)->update(['email' => $new_email]);
                $response = array('success' => '2', 'message' => 'Email updated');
            }else{
                $response = array('success' => '1', 'message' => 'current Email is Incorrect');
            }
        }
        return response()->json($response);
    }
    //my-favourite properties
    public function my_favourite(){
        if(Auth::check()){
            /*'multiple_media','user_details','property_data', */
          $favourite = Favourite::query()->where('user_id','=',Auth::id())
                ->with(['properties'])->orderBy('id','DESC')
                ->paginate(2);
          //return $favourite[0]['properties']['agent_id'];
          if($favourite[0]['properties']['agent_id'] != null){
              //return 'agent available';
             $findagent = Property::query()->where('id','=',$favourite[0]['property_id'])->with('agent_details')->get();

          }else{
              $findagent = Property::query()->where('id','=',$favourite[0]['property_id'])->with('agent_details')->get();
          }
          //return $findagent[0]['agent_details']['fullName'];
            return view('frontend.dashboard.pages.my-favourites',compact('favourite','findagent'));
        }else{
            return redirect('/coming-soon');
//            return redirect('/sign-in');
        }
    }
    //inquiry pop-up for pre-construction-search(Register Now Button)
    public function register_inquiry_popup(Request $request,$inquiryId){
        //APPLY VALIDATION RULES
        $validator = Validator::make($request->all(),[
            'inquiry_fullName' => 'required|string|max:50',
            'inquiry_phone' => 'required|numeric|digits:10',
            'inquiry_email' => 'required|email',
            'selector' => 'required|in:yes,no'
        ]);
        if ($validator->fails())
        {
            $validation_error = "";
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $validation_error .= $value[0]."<br>";
            }
            $response = array('success' => '0', 'message' => $validation_error);
        }else{
            $inquiryData = new Inquiry(array(
                'full_name' => $request->get('inquiry_fullName'),
                'property_id' => $inquiryId,
                'user_id' => Auth::user()->id,
                'phone_number' => $request->get('inquiry_phone'),
                'email_address' => $request->get('inquiry_email'),
                'broker_or_agent' => $request->get('selector')
            ));
            $inquiryData->save();
            $response = array('success' => '1', 'message' => 'Inquiry Saved.');
        }
        return response()->json($response);
    }
    //property-view
//    public function property_view(){
//        return view('frontend.dashboard.pages.dashboard');
//    }
}
