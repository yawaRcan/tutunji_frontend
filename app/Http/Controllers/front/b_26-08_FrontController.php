<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Property;
use App\Models\PropertyMedia;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use Mail;
use Symfony\Component\Console\Input\Input;
use function PHPUnit\Framework\exactly;

class FrontController extends Controller
{
    //HOME PAGE
    public function home(Request $request){
        //return PropertyMedia::all();
        //return PropertyMedia::query()->where('property_id','=','')->get();
        $clientIP = request()->ip();
        $allPreConstructData = Property::query()->where('property_type','=','pre-construct')->where('internal_status','=','1')->where('most_recent_upload','=','1')
            ->with('property_media','cat_details')->take(6)->orderBy('id','DESC')->with(['agent_details'])->get()->toArray();
//        echo '<pre>';
//        print_r($allPreConstructData);
//        echo '</pre>';
//        exit();
        $allSaleData = Property::query()->where('property_type','=','sale')->where('internal_status','=','1')->where('most_recent_upload','=','1')
            ->take(6)->with('property_media')->orderBy('id','DESC')->with(['agent_details','cat_details'])->get()->toArray();
        $allCategory = Category::all();
        $allAgent = Agent::all()->take(3);
        $allBlog = Blog::query()->where('status',1)->take(6)->get();
//        return $allBlog;exit();
        $allCat = Category::all();
        return view('frontend.pages.home',compact('clientIP','allPreConstructData','allSaleData','allAgent','allBlog','allCat','allCategory'));
    }

    //ABOUT PAGE
    public function aboutUs(){
        return view('frontend.pages.about');
    }
    //TESTIMONIALS PAGE
    public function testimonial(){
        return view('frontend.pages.testimonial');
    }
    //AGENT PAGE
    public function agent(){
        $allAgent = Agent::query()->paginate('4');
        return view('frontend.pages.agent',compact('allAgent'));
    }
    //TESTIMONIALS PAGE
    public function contact_us(){
        return view('frontend.pages.contact-us');
    }
    //SUBSCRIBE NEWS-LETTER USING AJAX
    public function newsletterPost(Request $request)
    {
        //$emailAddress = $request->email;
        //check validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
        ]);

        $error = $validator->errors()->messages();
        if($error) {
            return response()->json(array('success' => false, 'message' => $error['email'][0]));
        } else {
            $subscription = new Subscriber(array(
                'email' => $request->email
            ));
            $subscription->save();
            return response()->json(array('success' => true, 'message' => 'Subscription Complete'));
        }
    }
    //BLOGS PAGE
    public function blog_pages(){
        $allBlogData = Blog::query()->where('status',1)->paginate('3');
        return view('frontend.pages.blogs.blog-page',compact('allBlogData'));
    }
    //BLOGS2 PAGE
    public function blog_detail($blogId){
        $blogDetail = Blog::query()->where('id','=',$blogId)->get();
        $similarBlogs = Blog::query()->where('id','!=',$blogId)->orderBy('id','desc')->where('status',1)->take(6)->get();
        //return $similarBlogs[0]->image;
        return view('frontend.pages.blogs.blog-detail',compact('blogDetail','similarBlogs'));
    }
    //coming-soon page
    public function coming_soon(){
        return view('frontend.pages.coming-soon');
    }
    //map all property display
    public function location_data(Request $request){
        return Property::join('categories', 'categories.id', '=', 'properties.category')
//            ->select('id','latitude','longitude','address','city','zip','country_state','bathrooms','bedrooms','price','after_price_label','before_price_label',
//            'property_type','source','category','listed_in','from_rooms','to_rooms','from_bedrooms','to_bedrooms','from_bathrooms','to_bathrooms','from_size_in_sqft','to_size_in_sqft')
                ->select('properties.*')
            ->where('internal_status','=','1')
            ->when(request('property_id') != null, function ($q) { return $q->whereIn('properties.id', request('property_id')); })
            ->when(request('sort_by') != null, function ($q) {

                switch (request('sort_by')) {
                    case "newest":

                        $q->orderBy('created_at', 'desc');
                        break;
                    case "oldest":

                        $q->orderBy('created_at', 'asc');
                        break;
                    case "price_low_high":

                        $q->orderByRaw("CAST(REPLACE(price, ',', '') AS DECIMAL) asc");
                        break;
                    case "price_high_low":

                        $q->orderByRaw("CAST(REPLACE(price, ',', '') AS DECIMAL) desc");
                        break;
                    case "sqft_low_high":

                        $q->orderByRaw("LEAST(from_size_in_sqft, to_size_in_sqft)")
                            ->orderByRaw("GREATEST(from_size_in_sqft, to_size_in_sqft)");
                        break;
                    case "sqft_high_low":

                        $q->orderByRaw("GREATEST(from_size_in_sqft, to_size_in_sqft) DESC")
                            ->orderByRaw("LEAST(from_size_in_sqft, to_size_in_sqft) DESC");
                        break;
                    case "bedroom_low_high":

                        $q->orderByRaw("LEAST(from_bedrooms, to_bedrooms)")
                            ->orderByRaw("GREATEST(from_bedrooms, to_bedrooms)");
                        break;
                    case "bedroom_high_low":

                        $q->orderByRaw("GREATEST(from_bedrooms, to_bedrooms) DESC")
                            ->orderByRaw("LEAST(from_bedrooms, to_bedrooms) DESC");
                        break;
                    case "bathroom_low_high":

                        $q->orderByRaw("LEAST(from_bathrooms, to_bathrooms)")
                            ->orderByRaw("GREATEST(from_bathrooms, to_bathrooms)");
                        break;
                    case "bathroom_high_low":

                        $q->orderByRaw("GREATEST(from_bathrooms, to_bathrooms) DESC")
                            ->orderByRaw("LEAST(from_bathrooms, to_bathrooms) DESC");
                        break;
                    case "commercial_residential":

//                        $q->orderBy(function ($query) {
//                            $query->select('name')
//                                ->from('categories')
//                                ->whereColumn('categories.id', 'properties.category')
                        $q->orderByRaw("CASE WHEN categories.name = 'Commercial' THEN 1 WHEN categories.name = 'Residential' THEN 2 ELSE 3 END");
//                        });
                        break;
                    case "residential_commercial":

//                        $q->orderBy(function ($query) {
//                            $query->select('name')
//                                ->from('categories')
//                                ->whereColumn('categories.id', 'properties.category')
                        $q->orderByRaw("CASE WHEN categories.name = 'Residential' THEN 1 WHEN categories.name = 'Commercial' THEN 2 ELSE 3 END");
//                        });
                        break;
                }
            })
            ->with('property_media','cat_details')
            //->orderBy('id','desc')
            ->get();
//        return Category::query()->where('id',$locationData->category)->with('cat_details')->get();
//        return response($locationData);
    }
    //filter box property_status search
//    public function search_property_value(Request $request) {
//        //return $request->input();
//        $query = Property::query()->select('latitude','longitude','address','city','after_price_label','before_price_label','from_bedrooms','to_bedrooms','from_bathrooms','to_bathrooms')->where('internal_status','=','1')
//                    ->when(request('property_type') != 'none', function ($q) { return $q->where('category',  request('property_type')); })
//                    ->when(request('transaction_type') != 'none', function ($q) { return $q->where('property_type', request('transaction_type')); })
//
//                    ->when(request('postal_city_street') != null, function ($q) {
//                        return $q->orWhere('city', 'like', '%'.request('postal_city_street').'%')
//                                 ->orWhere('zip', 'like', '%'.request('postal_city_street').'%')
//                                 ->orWhere('address', 'like', '%'.request('postal_city_street').'%');
//                    })
////                    ->when(request('postal_city_street') != null, function ($q) { return $q->where('city','like','%'. request('postal_city_street'). '%'); })
//
//                    ->when(request('min_price') != null, function ($q) { return $q->where('price', '>=', (int)request('min_price')); })
//                    ->when(request('max_price') != null, function ($q) { return $q->where('price', '<=', (int)request('max_price')); })
//                    ->when(request('bed') != 'none', function ($q) { return $q->where('bedrooms', request('bed')); })
//                    ->when(request('bath') != 'none', function ($q) { return $q->where('bathrooms', request('bath')); })
//                    ->when(request('size') != 'none', function ($q) { return $q->where('size_in_ft2', request('size')); })
//                    /*->when(request('size') != 'none', function ($q) { return $q->where('size_in_ft2', 'like', '%' . request('size'). '%'); })*/
//            ->get();
//            return $query;
//
//
//            //return view('frontend.pages.home');
////            if($query){
//                //return response($query);
//
////            }else{
////                return response('no filter found');
////            }
//
//        /*$propertyStatus = $request->input('property_status');
//        $with_property_status_location = Property::query()->where('property_status', 'like', '%' . $propertyStatus . '%')
//            ->select('latitude','longitude','address')->get();
//        return response($with_property_status_location);*/
//    }
//    //filter box property type search
//    public function search_property_type(Request $request){
//        $propertyType = $request->input('property_type'); //filter property status
//        $property_type_location = Property::query()->where('property_type', 'like', '%' . $propertyType . '%')
//            ->select('latitude','longitude','address')->get();
//        return response($property_type_location);
//    }
//    //filter box postal code,city,street name search
//    public function search_property_data(Request $request){
//        $propertySearchData = $request->input('search_data'); //filter property status
//        $property_search_location = Property::query()->where('title', 'like', '%' . $propertySearchData . '%')
//            ->select('latitude','longitude','address')->get();
//        return response($property_search_location);
//    }
//    public function property_click_filter(){
//        echo 'test';
//    }

    public function filterProperty(Request $request) {
        // dd($request->all());
        return Property::join('categories', 'categories.id', '=', 'properties.category')
            ->where('internal_status','=','1')
            ->when(request('property_type') != 'none', function ($q) { return $q->where('category',  request('property_type')); })
            ->when(request('transaction_type') != 'none', function ($q) { return $q->where('property_type', request('transaction_type')); })
            // ->when(request('postal_city_street') != null, function ($q) {

            //     $ok = $q->where('city', 'like', '%'.request('postal_city_street').'%')
            //     ->orWhere('zip', 'like', '%'.request('postal_city_street').'%')
            //     ->orWhere('country_state', 'like', '%'.request('postal_city_street').'%')
            //     ->orWhere('address', 'like', '%'.request('postal_city_street').'%')
            //     ->orWhere(DB::raw("CONCAT_WS(', ', city, zip, country)"), 'LIKE', '%' . request('postal_city_street') . '%')
            //     ->orWhere(DB::raw("CONCAT_WS(', ', city, country)"), 'LIKE', '%' . request('postal_city_street') . '%')
            //     ->orWhere(DB::raw("CONCAT_WS(', ', country_state, country)"), 'LIKE', '%' . request('postal_city_street') . '%')
            //     ->orWhere(DB::raw("CONCAT_WS(', ', zip, country)"), 'LIKE', '%' . request('postal_city_street') . '%')
            //     ->orWhere(DB::raw("CONCAT_WS(', ', zip, city)"), 'LIKE', '%' . request('postal_city_street') . '%');

            //     // dd($ok);
            // })

            ->when(request('postal_city_street') != null, function ($q) {
                return $q->where(function ($query) {
                    $filter = request('postal_city_street');
                    $query->where('city', 'LIKE', '%' . $filter . '%')
                        ->orWhere('zip', 'LIKE', '%' . $filter . '%')
                        ->orWhere('country_state', 'LIKE', '%' . $filter . '%')
                        ->orWhere('address', 'LIKE', '%' . $filter . '%')
                        ->orWhere(DB::raw("CONCAT_WS(', ', city, zip, country)"), 'LIKE', '%' . $filter . '%')
                        ->orWhere(DB::raw("CONCAT_WS(', ', city, country)"), 'LIKE', '%' . $filter . '%')
                        ->orWhere(DB::raw("CONCAT_WS(', ', country_state, country)"), 'LIKE', '%' . $filter . '%')
                        ->orWhere(DB::raw("CONCAT_WS(', ', zip, country)"), 'LIKE', '%' . $filter . '%')
                        ->orWhere(DB::raw("CONCAT_WS(', ', zip, city)"), 'LIKE', '%' . $filter . '%');
                });
            })
            ->when(request('min_price') != '0', function ($q) { return $q->where('price', '>=', (int)request('min_price')); })
            ->when(request('max_price') != '0', function ($q) { return $q->where('price', '<=', (int)request('max_price')); })
            ->when(request('bed') != 'none', function ($q) {
               //dd(request('transaction_type'));
               $transaction_type = request('transaction_type');
               if($transaction_type == "pre-construct"){
                   $q->where(function ($q){
                       $q->where('to_bedrooms','>=',request('bed'));
                       $q->where('from_bedrooms','<=',request('bed'));
                   });
               }else{
                   return (request('bed') != '5') ? $q->where('bedrooms',request('bed')) : $q->where('bedrooms', '>=', request('bed'));

               }
               //$q->orwhere('bedrooms',request('bed'));
            })

//            ->when(request('bed') != 'none', function ($q){
//                    $q->where(function ($q){
//                    $q->where('property_type','=','sale');
//                    $q->where('bedrooms',request('bed'));
//                });
////                return (request('bed') != '5') ? $q->where('bedrooms', request('bed')) : $q->where('bedrooms', '>=', request('bed'));
//            })
//            ->when(request('bed') != 'none', function ($q){ return $q->where('from_bedrooms', '>=', (int)request('bedrooms'));})
//            ->when(request('bed') != 'none', function ($q){ return $q->where('to_bedrooms', '<=', (int)request('bedrooms'));})
//            ->when(request('bed') != 'none', function ($q){
//                $q->where('from_bedrooms')
//                return $q->where('bedrooms', '>=', request('bedrooms'));
//            })
            ->when(request('bath') != 'none', function ($q) {
                $transaction_type = request('transaction_type');
                if($transaction_type == "pre-construct"){
                    $q->where(function ($q){
                        $q->where('to_bathrooms','>=',request('bath'));
                        $q->where('from_bathrooms','<=',request('bath'));
                    });
                }else{
                    return (request('bath')  != '5') ? $q->where('bathrooms', request('bath')) : $q->where('bathrooms', '>=', request('bath'));

                }
            })
//            ->when(request('size') != 'none', function ($q) {
//                //$size = explode('-', request('size'));
////                return $size;
////                $q->where(function ($q){
////                   $q->where('to_size_in_sqft','>=',request('size'));
////                   $q->where('from_size_in_sqft','<=',request('size'));
////                   //$q->orwhere('size_in_ft2','>=',$size[0])->orwhere('size_in_ft2', '<=', $size[1]);
////                });
//                //return (request('size') != '10000') ? $q->where('to_size_in_sqft', '>=', $size[0])->where('from_size_in_sqft', '<=', $size[1]) : $q->where('size_in_ft2', '>=', request('size'));
////
////                return (request('size') != '10000') ? $q->where('from_size_in_sqft', '>=', $size[0])->where('to_size_in_sqft', '<=', $size[1]) : $q->where('size_in_ft2', '>=', request('size'))
////                    ->orwhere('from_size_in_sqft','<=',$size[0])
////                    ->orwhere('to_size_in_sqft','>=',$size[1]);
////                $q->where('to_size_in_sqft','>=', $size[0])
////                    ->where('from_size_in_sqft','<=',$size[1])->orwhere('lot_size_in_ft2','>=',$size[0])->orwhere('size_in_ft2','<=',$size[1]);
//                return (request('size') != '10000') ? $q->where('from_size_in_sqft', '<=', $size[0])->where('to_size_in_sqft', '>=', $size[1]) : $q->where('from_size_in_sqft', '<=', request('size'));
//
//
//            })
            ->when(request('size') != 'none', function ($q) {
                $size = explode('-', request('size'));
                $transaction_type = request('transaction_type');
                if($transaction_type == "pre-construct"){
                    //dd($size);
                    if(!empty($size[1])){
                        if(($size[0] >= 0 && $size[1] <= 2000)){
                            $q->where('to_size_in_sqft','>=',0);
                            $q->where('from_size_in_sqft','<=',2000);
                        }
                        if(($size[0] >= 2001 && $size[1] <= 3000)){
                            $q->where('to_size_in_sqft','>=',2001);
                            $q->where('from_size_in_sqft','<=',3000);
                        }
                        if(($size[0] >= 3001 && $size[1] <= 4000)){
                            $q->where('to_size_in_sqft','>=',3001);
                            $q->where('from_size_in_sqft','<=',4000);
                        }
                        if(($size[0] >= 4001 && $size[1] <= 5000)){
                            $q->where('to_size_in_sqft','>=',4001);
                            $q->where('from_size_in_sqft','<=',5000);
                        }
                        if(($size[0] >= 5001 && $size[1] <= 7000)){
                            $q->where('to_size_in_sqft','>=',5001);
                            $q->where('from_size_in_sqft','<=',7000);
                        }
                        if(($size[0] >= 7001 && $size[1] <= 10000)){
                            $q->where('to_size_in_sqft','>=',7001);
                            $q->where('from_size_in_sqft','<=',10000);
                        }
                    }
                    if($size[0] >= 10000){
                        return $q->where('to_size_in_sqft','>=',10000)->where('from_size_in_sqft','>=',10000);
                    }
                }else{
                    if(!empty($size[1])){
                        if(($size[0] >= 0 && $size[1] <= 2000)){
                            $q->where('lot_size_in_ft2','>=',0);
                            $q->where('size_in_ft2','<=',2000);
                        }
                        if(($size[0] >= 2001 && $size[1] <= 3000)){
                            $q->where('lot_size_in_ft2','>=',2001);
                            $q->where('size_in_ft2','<=',3000);
                        }
                        if(($size[0] >= 3001 && $size[1] <= 4000)){
                            $q->where('lot_size_in_ft2','>=',3001);
                            $q->where('size_in_ft2','<=',4000);
                        }
                        if(($size[0] >= 4001 && $size[1] <= 5000)){
                            $q->where('lot_size_in_ft2','>=',4001);
                            $q->where('size_in_ft2','<=',5000);
                        }
                        if(($size[0] >= 5001 && $size[1] <= 7000)){
                            $q->where('lot_size_in_ft2','>=',5001);
                            $q->where('size_in_ft2','<=',7000);
                        }
                        if(($size[0] >= 7001 && $size[1] <= 10000)){
                            $q->where('lot_size_in_ft2','>=',7001);
                            $q->where('size_in_ft2','<=',10000);
                        }
                    }
                    if($size[0] >= 10000){
                        return $q->where('lot_size_in_ft2','>=',10000)->where('size_in_ft2','>=',10000);
                    }
                    //return (request('size') != '10000') ? $q->where('size_in_ft2', '>=', $size[0])->where('size_in_ft2', '<=', $size[1]) : $q->where('size_in_ft2', '>=', request('size'));

                }

            })
            ->when(request('sort_by') != null, function ($q) {

                switch (request('sort_by')) {
                    case "newest":

                        $q->orderBy('created_at', 'desc');
                        break;
                    case "oldest":

                        $q->orderBy('created_at', 'asc');
                        break;
                    case "price_low_high":

                        $q->orderByRaw("CAST(REPLACE(price, ',', '') AS DECIMAL) asc");
                        break;
                    case "price_high_low":

                        $q->orderByRaw("CAST(REPLACE(price, ',', '') AS DECIMAL) desc");
                        break;
                    case "sqft_low_high":

                        $q->orderByRaw("LEAST(from_size_in_sqft, to_size_in_sqft)")
                            ->orderByRaw("GREATEST(from_size_in_sqft, to_size_in_sqft)");
                        break;
                    case "sqft_high_low":

                        $q->orderByRaw("GREATEST(from_size_in_sqft, to_size_in_sqft) DESC")
                            ->orderByRaw("LEAST(from_size_in_sqft, to_size_in_sqft) DESC");
                        break;
                    case "bedroom_low_high":

                        $q->orderByRaw("LEAST(from_bedrooms, to_bedrooms)")
                            ->orderByRaw("GREATEST(from_bedrooms, to_bedrooms)");
                        break;
                    case "bedroom_high_low":

                        $q->orderByRaw("GREATEST(from_bedrooms, to_bedrooms) DESC")
                            ->orderByRaw("LEAST(from_bedrooms, to_bedrooms) DESC");
                        break;
                    case "bathroom_low_high":

                        $q->orderByRaw("LEAST(from_bathrooms, to_bathrooms)")
                            ->orderByRaw("GREATEST(from_bathrooms, to_bathrooms)");
                        break;
                    case "bathroom_high_low":

                        $q->orderByRaw("GREATEST(from_bathrooms, to_bathrooms) DESC")
                            ->orderByRaw("LEAST(from_bathrooms, to_bathrooms) DESC");
                        break;
                    case "commercial_residential":

//                        $q->orderBy(function ($query) {
//                            $query->select('name')
//                                ->from('categories')
//                                ->whereColumn('categories.id', 'properties.category')
                                $q->orderByRaw("CASE WHEN categories.name = 'Commercial' THEN 1 WHEN categories.name = 'Residential' THEN 2 ELSE 3 END");
//                        });
                        break;
                    case "residential_commercial":

//                        $q->orderBy(function ($query) {
//                            $query->select('name')
//                                ->from('categories')
//                                ->whereColumn('categories.id', 'properties.category')
                                $q->orderByRaw("CASE WHEN categories.name = 'Residential' THEN 1 WHEN categories.name = 'Commercial' THEN 2 ELSE 3 END");
//                        });
                        break;
                }
            })
            ->with('property_media', 'cat_details')
            ->select('properties.*')
            ->get();
    }
    public function aboutCityScape(){
        $allBlog = Blog::all();
        return view('frontend.pages.about-cityScape',compact('allBlog'));
    }

}
