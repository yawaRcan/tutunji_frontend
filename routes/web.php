<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\front\AuthController;
use App\Http\Controllers\front\PropertyController;
use App\Http\Controllers\front\DashboardController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AmenitiesController;
use App\Http\Controllers\admin\SalePropertyController;
use App\Http\Controllers\admin\PreconstructPropertyController;
use App\Http\Controllers\admin\NewsletterController;
use App\Http\Controllers\admin\PendingPropertyController;
use App\Http\Controllers\admin\WebsiteMemberController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RolePermissionController;
use App\Http\Controllers\admin\VisitorController;
use App\Http\Controllers\admin\AgentController;
use App\Http\Controllers\front\SocialShareController;
use App\Http\Controllers\admin\OffersController;
use App\Http\Controllers\admin\InquiryController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', function () {
//    return view('welcome');
//});

//ADMIN-USERS LOGIN ROUTES

//GROUP MIDDLEWARE ROUTES


//CLIENT-SIDE(CUSTOMER) ALL ROUTES
//HOME PAGE ROUTE
Route::group(['middleware' => 'count_visitors'], function () {
    //NEW-DESIGN FRONT PAGE ROUTES
    Route::get('/', [FrontController::class, 'home']);
    Route::get('/home-new', [FrontController::class, 'new_home']);

});

Route::post('/save-contact-form', [ContactController::class, 'storeContactForm']);
////SIGN-IN PAGE ROUTES
//Route::get('/sign-in',[AuthController::class,'signIn']);
//Route::post('/sign-in',[AuthController::class,'signIn_store']);
////SIGN-UP PAGE ROUTE
//Route::post('/sign-up',[AuthController::class,'signUp_store']);
////GOOGLE LOGIN ROUTES
//Route::get('login/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
//Route::get('login/google/callback', [AuthController::class,'handleGoogleCallback']);
////FACEBOOK LOGIN ROUTES
//Route::get('login/facebook', [AuthController::class, 'redirectToFacebook'])->name('login.facebook');
//Route::get('login/facebook/callback', [AuthController::class,'handleFacebookCallback']);

//ABOUT PAGE ROUTE
Route::get('/about', [FrontController::class, 'aboutUs']);
//TESTIMONIALS PAGE ROUTE
Route::get('/testimonial', [FrontController::class, 'testimonial']);
//ContactUs PAGE ROUTE
Route::get('/contact-us', [FrontController::class, 'contact_us']);
//AGENT PAGE ROUTE
Route::get('/agent', [FrontController::class, 'agent']);
//AGENT PAGE ROUTE
Route::get('/about-cityScape', [FrontController::class, 'aboutCityScape']);
////SUBMIT-PROPERTY PAGE ROUTES
//Route::get('/submit-property', [PropertyController::class,'addPropertyData']);
//Route::post('/submit-property', [PropertyController::class,'storePropertyData']);
//ADD PROPERTY-MEDIA ROUTE
Route::post('/add-property-media', [PropertyController::class, 'savePropertyMediaFile']);
//DELETE PROPERTY-MEDIA ROUTE
Route::post('/destroy-property-media', [PropertyController::class, 'destroyPropertyMedia']);
//EDIT-PROPERTY PAGE ROUTE
Route::get('/edit-property/{id}', [PropertyController::class, 'edit_property']);
Route::post('/edit-property/{id}', [PropertyController::class, 'update_property']);
//UPDATE-MEDIA-FILE
Route::post('/update-property-media', [PropertyController::class, 'updateMediaFile']);


//PRE-CONSTRUCT-PROPERTY SEARCH PAGE ROUTE
Route::get('/pre-construct-search', [PropertyController::class, 'pre_construct_search'])->name('pre-construct-search');
//Route::get('/pre-construct-search-new',[PropertyController::class,'pre_construct_search_new']);
//BLOG ROUTE
Route::get('/blog-page', [FrontController::class, 'blog_pages']);
Route::get('/blog-detail/{id}', [FrontController::class, 'blog_detail']);

Route::get('/sale-search', [PropertyController::class, 'sale_search']);

Route::post('/save-agent-inquiry', [PropertyController::class, 'saveAgentInquiry']);
//sale-property agent form
Route::post('/save-sale-agent-form/{id}', [PropertyController::class, 'store_agent_form']);
//pre-construct-popup-inquiry-form
Route::post('/info-inquiry/{id}', [PropertyController::class, 'inquiry_popup']);
Route::post('/check-inquiry', [PropertyController::class, 'check_inquiry']);

//pre-construct-inquiry-form
Route::post('/save-inquiry/{id}', [PropertyController::class, 'save_inquiry_form']);

//PRE-CONSTRUCT-PROPERTY POPUP PAGE ROUTE
Route::post('/pre-construct-property/{id}', [PropertyController::class, 'storeAgent']);

Route::group(['middleware' => 'total_viewer'], function () {
    //SALE-PROPERTY SEARCH PAGE ROUTE
    Route::get('/sale-property/{id}', [PropertyController::class, 'sale_single']);
    //Sale-property form

    //sale-property-inquiry-form
//    Route::post('/save-inquiry-for-sale/{id}', [PropertyController::class, 'save_agent_for_sale']);
    //inquiry-popup-for-sale
//    Route::get('/save-agent-popup', [PropertyController::class, 'store_agent_popup']);

    Route::get('/pre-construct-property/{id}', [PropertyController::class, 'pre_construct_single']);



});
Route::get('/sale-slider-popup/{pid}', [PropertyController::class, 'get_sale_slider']);
Route::get('/pre-construct-slider-popup/{pid}', [PropertyController::class, 'get_pre_slider']);
//Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/my-properties', [DashboardController::class, 'my_properties']);
Route::post('/my-profile', [DashboardController::class, 'updateProfile']);
Route::get('/my-profile', [DashboardController::class, 'my_profile']);
Route::get('/my-favourite', [DashboardController::class, 'my_favourite']);
//favourite property
Route::get('/like/{id}', [AuthController::class, 'like']);
Route::get('/unlike/{id}', [AuthController::class, 'unlike']);

//ADD PROFILE-IMAGE ROUTE
Route::post('/add-profile-image', [DashboardController::class, 'saveProfileImage']);
//RESET PASSWORD ROUTE
Route::post('/change-password', [DashboardController::class, 'changePassword']);
//CHANGE EMAIL ROUTE
Route::post('/change-email', [DashboardController::class, 'changeEmail']);
//SUBSCRIBER NEWSLETTER ROUTE
Route::post('/subscribe-email', [FrontController::class, 'newsletterPost']);
//get state by country
Route::post('get-states-by-country', [PropertyController::class, 'getState']);
//Route::post('get-selected-state',[PropertyController::class,'get_selected_state']);

//social share
Route::get('/social-share', [SocialShareController::class, 'index']);

//LOGOUT ROUTE
Route::get('/logout', [AuthController::class, 'auth_logout']);

//search-route
Route::get('/search-property', [PropertyController::class, 'search_data']);

//filter-property-result
Route::get('/filter-search-result', [PropertyController::class, 'filter_search']);
//search-city
Route::get('/search-city', [PropertyController::class, 'search_city']);
Route::post('/register-inquiry/{id}', [DashboardController::class, 'register_inquiry_popup']);
//del-plan-2d-images(front-side for sale property)
Route::post('delete_floor_2d_image', [PropertyController::class, 'destroy_plan_2d_image']);
//del-plan-3d-images(front-side for sale-property)
Route::post('delete_floor_3d_image', [PropertyController::class, 'destroy_plan_3d_image']);
//del-plan-2d-images(admin-side for pre-construct property)
Route::post('/delete-pre-construct-floor-2d-image', [PreconstructPropertyController::class, 'destroy_pre_construct_plan_2d_image']);
//del-plan-3d-images(admin-side for pre-construct property)
Route::post('/delete-pre-construct-floor-3d-image', [PreconstructPropertyController::class, 'destroy_pre_construct_plan_3d_image']);
//del-plan-2d-images(admin-side for sale property)
Route::get('/delete-sale-floor-2d-image', [SalePropertyController::class, 'destroy_sale_plan_2d_image']);
//del-plan-3d-images(admin-side for sale property)
Route::get('/delete-sale-floor-3d-image', [SalePropertyController::class, 'destroy_sale_plan_3d_image']);

Route::get('multiple-image-preview', [PropertyController::class, 'index']);

Route::post('upload-multiple-image-ajax', [PropertyController::class, 'saveUpload']);
//coming-soon route
Route::get('/coming-soon', [FrontController::class, 'coming_soon']);

//search filter property-status
Route::get('/property-data', [FrontController::class, 'search_property_value']);
//search filter property-type
Route::get('/property-type-search', [FrontController::class, 'search_property_type']);
//search property data
Route::get('/property-data-search', [FrontController::class, 'search_property_data']);


//map all property
Route::get('/map-data', [FrontController::class, 'location_data']);
//Route::get('/zip-code-data',[FrontController::class,'zip_code']);
//filter pre-construction property search
//Route::get('/prearch-filter',[PropertyController::class,'filter_data']);
//Route::post('/property-search-filter',[PropertyController::class,'filter_data']);
Route::get('/property-search-filter', [PropertyController::class, 'filter_data'])->name('property-search-filter');

//Route::post('/property-sale-search-filter',[PropertyController::class,'filter_sale_data']);
Route::get('/property-sale-search-filter', [PropertyController::class, 'filter_sale_data'])->name('property-sale-search-filter');
//add property category
Route::get('/admin/add-category', [PreconstructPropertyController::class, 'addCategory']);
Route::post('/admin/add-category', [PreconstructPropertyController::class, 'storeCategory']);
//view property category
Route::get('/admin/view-category', [PreconstructPropertyController::class, 'showCategory']);
//edit-category
Route::get('/admin/edit-category/{id}', [PreconstructPropertyController::class, 'EditCategory']);
Route::post('/admin/edit-category/{id}', [PreconstructPropertyController::class, 'UpdateCategory']);
Route::get('/admin/delete-category/{id}', [PreconstructPropertyController::class, 'DeleteCategory']);

Route::get('/property-map-filter', [FrontController::class, 'property_click_filter']);

//Route::get('/property-search-filter',[PropertyController::class,'filter_data']);

Route::post('filter-property', [FrontController::class, 'filterProperty']);

Route::get('/new-pre-construction', [PropertyController::class, 'new_pre_construction_pro']);
//Route::get('/header-1',[PreconstructPropertyController::class,'header_1']);

//delete banner-1
Route::get('/admin/delete-banner-1', [PreconstructPropertyController::class, 'destroy_b_1']);
//delete banner-2
Route::get('/admin/delete-banner-2', [PreconstructPropertyController::class, 'destroy_b_2']);
//delete banner-3
Route::get('/admin/delete-banner-3', [PreconstructPropertyController::class, 'destroy_b_3']);
//delete banner-4
Route::get('/admin/delete-banner-4', [PreconstructPropertyController::class, 'destroy_b_4']);
Route::get('/admin/delete-banner-5', [PreconstructPropertyController::class, 'destroy_b_5']);
Route::get('/admin/delete-banner-6', [PreconstructPropertyController::class, 'destroy_b_6']);
Route::get('/admin/delete-banner-7', [PreconstructPropertyController::class, 'destroy_b_7']);

//add-banner-1-using-ajax
Route::post('admin/add-banner-1', [PreconstructPropertyController::class, 'add_banner_1']);
//delete-banner-1-using-ajax
Route::post('admin/delete-banner-1', [PreconstructPropertyController::class, 'del_banner_1']);
//add-banner-2-using-ajax
Route::post('admin/add-banner-2', [PreconstructPropertyController::class, 'add_banner_2']);
//delete-banner-2-using-ajax
Route::post('admin/delete-banner-2', [PreconstructPropertyController::class, 'del_banner_2']);
//add-banner-3-using-ajax
Route::post('admin/add-banner-3', [PreconstructPropertyController::class, 'add_banner_3']);
//delete-banner-3-using-ajaxsale-search
Route::post('admin/delete-banner-3', [PreconstructPropertyController::class, 'del_banner_3']);
//add-banner-4-using-ajax
Route::post('admin/add-banner-4', [PreconstructPropertyController::class, 'add_banner_4']);
//delete-banner-4-using-ajax
Route::post('admin/delete-banner-4', [PreconstructPropertyController::class, 'del_banner_4']);

// new banners 5, 6, 7
//delete banner-5
Route::post('admin/add-banner-5', [PreconstructPropertyController::class, 'add_banner_5']);
Route::post('admin/delete-banner-5', [PreconstructPropertyController::class, 'del_banner_5']);
//delete banner-6
Route::post('admin/add-banner-6', [PreconstructPropertyController::class, 'add_banner_6']);
Route::post('admin/delete-banner-6', [PreconstructPropertyController::class, 'del_banner_6']);
//delete banner-7
Route::post('admin/add-banner-7', [PreconstructPropertyController::class, 'add_banner_7']);
Route::post('admin/delete-banner-7', [PreconstructPropertyController::class, 'del_banner_7']);

Route::get('/send-mail', [TestController::class, 'sendWelcomeEmail']);

Route::get('/send-bulk-email', [TestController::class, 'testBulkEmails']);

Route::get('/send-multiple-email', [TestController::class, 'multipleMail']);
//Route::get('/send-multiple-email-example-2',[TestController::class,'multiple_email_example_2']);
