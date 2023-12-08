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
Route::get('/login',[AdminAuthController::class,'login']);
Route::post('/login',[AdminAuthController::class,'loginPost']);

//GROUP MIDDLEWARE ROUTES
Route::group(['middleware' => 'isAdminUser'],function (){
    //ADMIN DASHBOARD PAGE ROUTE
    Route::get('/admin/dashboard',[AdminController::class,'index']);
    //    Route::get('/admin/user-dashboard',[UserController::class,'userIndex']);
    //ADMIN-USERS REGISTER ROUTES
    Route::get('/register',[AdminAuthController::class,'registration']);
    Route::post('/register',[AdminAuthController::class,'registerPost']);
    //LIST PERMISSION PAGE ROUTE
    Route::get('/admin/list-permission',[RolePermissionController::class,'allPermission']);
    //LIST ROLES PAGE ROUTE
    Route::get('/admin/list-roles',[RolePermissionController::class,'allRoles']);
    //UPDATE ROLES PAGE ROUTE
    Route::get('/admin/edit-role/{roleId}',[RolePermissionController::class,'editRole']);
    Route::post('/admin/edit-role/{roleId}',[RolePermissionController::class,'editStoreRole']);
    //LIST DELETE ROUTE
    Route::get('/admin/delete-role/{roleId}',[RolePermissionController::class,'destroyRole']);
    //LIST ADMIN-USERS ROUTE
    Route::get('/admin/list-admin-users',[UserController::class,'listAdminUsers']);
    //ADD ROLE PAGE ROUTES
    Route::get('/admin/add-role',[RolePermissionController::class,'addRole']);
    Route::post('/admin/add-role',[RolePermissionController::class,'storeRole']);

    //PROPERTIES PAGE ALL ROUTES
    //LIST PRE-CONSTRUCT-PROPERTY PAGE ROUTE
    Route::get('/admin/list-pre-construct-property',[PreconstructPropertyController::class,'list_pre_construct_property']);
    //EDIT PRE-CONSTRUCT-PROPERTY PAGE ROUTES
    Route::get('/admin/edit-pre-construct-property/{id}',[PreconstructPropertyController::class,'edit_pre_construct_property']);
    Route::post('/admin/edit-pre-construct-property/{id}',[PreconstructPropertyController::class,'update_pre_construct_property']);
    //get state by country
    Route::post('get-states-by-country', [PreconstructPropertyController::class, 'getState']);
    //delete pre-construct-property
    Route::get('/admin/delete-pre-construct-property/{id}',[PreconstructPropertyController::class,'deletePreConstructProperty']);
    Route::get('/admin/delete-f-2d-plan-p-id',[PreconstructPropertyController::class,'del_f_2d_plan_p_id']);
    Route::post('/admin/edit-f-2d-plan-with-p-id',[PreconstructPropertyController::class,'edit_f_2d_plan_with_p_id']);
    Route::post('/admin/edit-f-3d-plan-with-p-id',[PreconstructPropertyController::class,'edit_f_3d_plan_with_p_id']);
    Route::get('/admin/delete-f-3d-plan-p-id',[PreconstructPropertyController::class,'del_f_3d_plan_with_p_id']);

    //UPDATE PRE-CONSTRUCT-PROPERTY MEDIA ROUTE
    Route::post('/admin/update-pre-construct-media',[PreconstructPropertyController::class,'update_pre_construct_media_file']);
    //DELETE PRE-CONSTRUCT-PROPERTY MEDIA ROUTE
    Route::post('/admin/destroy-pre-construct-media',[PreconstructPropertyController::class,'destroy_pre_construct_media_file']);
    //ADD PRE-CONSTRUCT-PROPERTY PAGE ROUTES
    Route::get('/admin/add-pre-construct-property',[PreconstructPropertyController::class,'add_pre_construct_property']);
    Route::post('/admin/add-pre-construct-property',[PreconstructPropertyController::class,'store_pre_construct_property']);
    //ADD PRE-CONSTRUCT-PROPERTY-MEDIA ROUTE
    Route::post('/admin/add-pre-construct-media',[PreconstructPropertyController::class,'save_pre_construct_media_file']);
    //ADD 2D FLOOR PLAN PRE-CONSTRUCT-PROPERTY ROUTE
    Route::post('/admin/add-2d-file',[PreconstructPropertyController::class,'save_2d_file']);
    Route::post('/admin/update-2d-section-on-session',[PreconstructPropertyController::class,'update_2d_section_on_session']);
    Route::post('/admin/update-2d-floor-image',[PreconstructPropertyController::class,'edit_2d_image']);
    //3D
    Route::post('admin/update-3d-section-on-session',[PreconstructPropertyController::class,'update_3d_section_on_session']);
    Route::post('/admin/update-3d-floor-image',[PreconstructPropertyController::class,'edit_3d_image']);


    //DELETE PRE-CONSTRUCT-PROPERTY-MEDIA ROUTE
    Route::post('/admin/destroy-pre-construct-media',[PreconstructPropertyController::class,'destroy_pre_construct_media_file']);
    //List All Pre-construct property
    Route::get('/admin/all-pre-construct-property',[PreconstructPropertyController::class,'all_property']);
    //List All Active Pre-construct property
    Route::get('/admin/active-pre-construct-property',[PreconstructPropertyController::class,'all_active_property']);
    //List All Active Pre-construct property
    Route::get('/admin/deleted-pre-construct-property',[PreconstructPropertyController::class,'all_deleted_property']);
    Route::post('admin/delete-2d-image',[PreconstructPropertyController::class,'destroy_2d_floor_plan']);
    Route::post('admin/delete-3d-image',[PreconstructPropertyController::class,'destroy_3d_floor_plan']);
    Route::post('admin/delete-sale-2d-image',[SalePropertyController::class,'destroy_2d_sale_floor_plan']);
    Route::post('admin/delete-sale-3d-image',[SalePropertyController::class,'destroy_3d_sale_floor_plan']);

    //update status
    Route::get('/admin/update-status/{id}',[PreconstructPropertyController::class,'propertyStatus']);
    //update status
    Route::get('/admin/update-sale-property-status/{id}',[SalePropertyController::class,'salepropertyStatus']);
    //ADD SALE-PROPERTY PAGE ROUTES
    Route::get('/admin/add-sale-property',[SalePropertyController::class,'addSaleProperty']);
    Route::post('/admin/add-sale-property',[SalePropertyController::class,'storeSaleProperty']);
    //all sale property route
    Route::get('/admin/all-sale-property',[SalePropertyController::class,'all_sale']);
    //all approve sale property route
    Route::get('/admin/approve-sale-property',[SalePropertyController::class,'all_approve_sale']);
    //all deleted sale property route
    Route::get('/admin/deleted-sale-property',[SalePropertyController::class,'all_deleted_sale']);
    //ADD SALE-PROPERTY-MEDIA ROUTE
    Route::post('/admin/add-media-file',[SalePropertyController::class,'save_media_file']);
    Route::post('admin/update-2d-section-on-sale-session',[SalePropertyController::class,'update_2d_section_on_sale_session']);
    Route::post('/admin/update-2d-floor-sale-image',[SalePropertyController::class,'edit_2d_sale_image']);
    Route::post('/admin/update-3d-section-on-sale-session',[SalePropertyController::class,'update_3d_section_on_sale_session']);
    Route::post('/admin/update-3d-floor-sale-image',[SalePropertyController::class,'edit_3d_sale_image']);
    Route::get('/admin/delete-f-2d-sale-plan-p-id/{id}',[SalePropertyController::class,'del_f_2d_sale_plan_p_id']);
    Route::post('/admin/edit-f-2d-sale-plan-with-p-id',[SalePropertyController::class,'edit_f_2d_sale_plan_with_p_id']);
    Route::post('/admin/edit-f-3d-sale-plan-with-p-id',[SalePropertyController::class,'edit_f_3d_sale_plan_with_p_id']);
    Route::get('/admin/delete-f-3d-sale-plan-p-id/{id}',[SalePropertyController::class,'del_f_3d_sale_plan_with_p_id']);
    Route::get('/testing-image',[PreconstructPropertyController::class,'testingImage']);


    //DELETE SALE-PROPERTY-MEDIA ROUTE
    Route::post('/admin/delete-media-file',[SalePropertyController::class,'delete_media_file']);
    //LIST SALE-PROPERTY PAGE ROUTE
    Route::get('/admin/list-sale-property',[SalePropertyController::class,'listSaleProperty']);
    //EDIT SALE-PROPERTY PAGE ROUTES
    Route::get('/admin/edit-sale-property/{id}',[SalePropertyController::class,'editSaleProperty']);
    Route::post('/admin/edit-sale-property/{id}',[SalePropertyController::class,'updateSaleProperty']);
    //delete sale-property page route
    Route::get('/admin/delete-sale-property/{id}',[SalePropertyController::class,'destroySaleProperty']);
    //get state by country
    Route::post('get-states-by-country', [SalePropertyController::class, 'getState']);
    //UPDATE SALE-PROPERTY-MEDIA ROUTE
    Route::post('/admin/update-sale-media',[SalePropertyController::class,'updateSaleMediaFile']);
    //DELETE SALE-PROPERTY-MEDIA ROUTE
    Route::post('/admin/destroy-sale-media',[SalePropertyController::class,'destroySaleMediaFile']);
//    //LIST PENDING PROPERTY PAGE ROUTE
//    Route::get('/admin/list-pending-property', [PendingPropertyController::class, 'pendingProperty']);
//    //LIST REJECTED PROPERTY PAGE ROUTE
//    Route::get('/admin/rejected-property', [PendingPropertyController::class, 'rejected_properties']);
//    //LIST ALL PENDING PROPERTY PAGE ROUTE
//    Route::get('/admin/all-pending-property', [PendingPropertyController::class, 'pending_properties']);
//    //VIEW PENDING PROPERTY PAGE ROUTE
//    Route::get('/admin/view-pending-property/{id}',[PendingPropertyController::class,'viewProperty']);
//    //REJECT PROPERTY WITH REASON USING AJAX ROUTE
//    Route::post('/admin/reject-property',[PendingPropertyController::class,'reject_reason']);
    //LIST WEBSITE MEMBER PAGE ROUTE
//    Route::get('/admin/list-website-member', [WebsiteMemberController::class, 'listWebsiteMember']);
//    //edit website member
//    Route::get('/admin/edit-website-member/{id}', [WebsiteMemberController::class, 'edit_website_member']);
//    Route::post('/admin/edit-website-member/{id}', [WebsiteMemberController::class, 'update_website_member']);
//   //delete-website member
//    Route::get('/admin/delete-website-member/{id}',[WebsiteMemberController::class, 'destroyWebsiteMember']);
//    //LIST NEW WEBSITE MEMBER ROUTE
//    Route::get('/admin/today-website-member', [WebsiteMemberController::class, 'todayWebsiteMember']);
    //LIST NEWSLETTER PAGE ROUTE
    Route::get('/admin/list-newsletter', [NewsletterController::class, 'listNewsletter']);
    //EDIT NEWSLETTER PAGE ROUTE
    Route::get('/admin/edit-newsletter/{id}',[NewsletterController::class,'editNewsletter']);
    Route::post('/admin/edit-newsletter/{id}',[NewsletterController::class,'updateNewsletter']);
    //destroy newsletter
    Route::get('/admin/delete-newsletter/{id}',[NewsletterController::class,'destroyNewsletter']);
    //LIST TODAY NEWSLETTER MEMBER PAGE ROUTE
    Route::get('/admin/today-newsletter', [NewsletterController::class, 'todayNewsletter']);
    //LIST TODAY UNIQUE VISITORS PAGE ROUTE
    Route::get('/admin/list-unique-visitors-today', [VisitorController::class, 'listVisitorsToday']);
    //LIST TOTAL UNIQUE VISITORS PAGE ROUTE
    Route::get('/admin/total-unique-visitors', [VisitorController::class, 'listTotalVisitors']);
    Route::post('/admin/total-unique-visitors', [VisitorController::class, 'get_list_of_visitors']);
    //LIST All VISITORS
    Route::get('/admin/all-visitors',[VisitorController::class,'allVisitors']);
    //List of today visitors
    Route::get('/admin/today-visitors',[VisitorController::class,'get_list_of_today_visitors']);
    //UPDATE PROPERTY STATUS
    Route::post('/admin/propertyStatus',[PendingPropertyController::class,'propertyStatus']);
    //LIST AMENITIES PAGE ROUTE
    Route::get('amenities_list', [AmenitiesController::class, 'index']);
    //ADD AMENITIES PAGE ROUTE
    Route::get('/admin/add-amenity', [AmenitiesController::class, 'add_amenity']);
    Route::post('/admin/add-amenity', [AmenitiesController::class, 'store_amenity']);
    //EDIT AMENITIES PAGE ROUTE
    Route::get('/admin/edit-amenity/{id}', [AmenitiesController::class, 'edit_amenity']);
    Route::post('/admin/edit-amenity/{id}', [AmenitiesController::class, 'update_amenity']);

    //DELETE AMENITIES ROUTE
    Route::get('/admin/del-amenity/{id}', [AmenitiesController::class, 'destroy_amenity']);
    //ADD AGENT ROUTE
    Route::get('/admin/add-agent', [AgentController::class, 'addAgent']);
    Route::post('/admin/add-agent', [AgentController::class, 'storeAgent']);
    //Show AGENT ROUTE
    Route::get('/admin/list-agent', [AgentController::class, 'show_agent']);
    //edit agent route
    Route::get('/admin/edit-agent/{id}',[AgentController::class,'edit_agent']);
    Route::post('/admin/edit-agent/{id}',[AgentController::class,'update_agent']);
    //delete agent route
    Route::get('/admin/delete-agent/{id}',[AgentController::class,'destroy_agent']);
    //view-offers(for sale property)
    Route::get('/admin/view-offers/{id}',[OffersController::class,'show_offer']);
    //edit-offers(for sale property)
    Route::get('/admin/edit-offers/{id}',[OffersController::class,'edit_offer']);
    Route::post('/admin/edit-offers/{id}',[OffersController::class,'update_offer']);
    //add-offers(for sale property)
    Route::get('/admin/add-offers/{id}',[OffersController::class,'add_offer']);
    Route::post('/admin/add-offers/{id}',[OffersController::class,'store_offer']);
    //delete offers(for sale property)
    Route::get('/admin/delete-offers/{id}',[OffersController::class,'destroy_offer']);
    //view-inquiry(for pre-construct property)
    Route::get('/admin/view-inquiry/{id}',[InquiryController::class,'show_inquiry']);
    //add-inquiry(for pre-construct property)
    Route::get('/admin/add-inquiry/{id}',[InquiryController::class,'add_inquiry']);
    Route::post('/admin/add-inquiry/{id}',[InquiryController::class,'store_inquiry']);
    //edit-inquiry(for pre-construct property)
    Route::get('/admin/edit-inquiry/{id}',[InquiryController::class,'edit_inquiry']);
    Route::post('/admin/edit-inquiry/{id}',[InquiryController::class,'update_inquiry']);
    //delete-inquiry(for pre-construct property)
    Route::get('/admin/delete-inquiry/{id}',[InquiryController::class,'destroy_inquiry']);
    //add-blog route
    Route::get('/admin/add-blog',[BlogController::class,'add_blog']);
    Route::post('/admin/add-blog',[BlogController::class,'store_blog']);
    //view-blog route
    Route::get('/admin/view-blog',[BlogController::class,'view_blog']);
    //edit-blog route
    Route::get('/admin/edit-blog/{id}',[BlogController::class,'edit_blog']);
    Route::post('/admin/edit-blog/{id}',[BlogController::class,'update_blog']);
    //delete-inquiry(for pre-construct property)
    Route::get('/admin/delete-blog/{id}',[BlogController::class,'destroy_blog']);
    //all Active blog route
    Route::get('/admin/all-active-blog',[BlogController::class,'all_active_blog']);
    //all blog route
    Route::get('/admin/all-blog',[BlogController::class,'all_blog']);
    //all deleted blog route
    Route::get('/admin/all-deleted-blog',[BlogController::class,'all_deleted_blog']);
    //add-blog-category
    Route::get('/admin/add-category',[BlogController::class,'add_category']);
    Route::post('/admin/add-category',[BlogController::class,'store_category']);
    //view-blog-category
    Route::get('/admin/view-category',[BlogController::class,'show_category']);
    //Edit-status
    Route::get('/admin/update-category-status/{id}',[PreconstructPropertyController::class,'cat_status']);
    //Add-2d-floor-plan
    Route::get('/admin/add-2d-floor-plan',[PreconstructPropertyController::class,'add_2d_floor_plan']);
    //LOGOUT ROUTE
    Route::get('/auth/logout',[AdminAuthController::class,'logout']);
});

//CLIENT-SIDE(CUSTOMER) ALL ROUTES
//HOME PAGE ROUTE
Route::group(['middleware' => 'count_visitors'],function (){
    //NEW-DESIGN FRONT PAGE ROUTES
    Route::get('/',[FrontController::class,'home']);
    Route::get('/home-new',[FrontController::class,'new_home']);

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
Route::get('/about',[FrontController::class,'aboutUs']);
//TESTIMONIALS PAGE ROUTE
Route::get('/testimonial',[FrontController::class,'testimonial']);
//ContactUs PAGE ROUTE
Route::get('/contact-us',[FrontController::class,'contact_us']);
//AGENT PAGE ROUTE
Route::get('/agent',[FrontController::class,'agent']);
//AGENT PAGE ROUTE
Route::get('/about-cityScape',[FrontController::class,'aboutCityScape']);
////SUBMIT-PROPERTY PAGE ROUTES
//Route::get('/submit-property', [PropertyController::class,'addPropertyData']);
//Route::post('/submit-property', [PropertyController::class,'storePropertyData']);
//ADD PROPERTY-MEDIA ROUTE
Route::post('/add-property-media',[PropertyController::class, 'savePropertyMediaFile']);
//DELETE PROPERTY-MEDIA ROUTE
Route::post('/destroy-property-media',[PropertyController::class, 'destroyPropertyMedia']);
//EDIT-PROPERTY PAGE ROUTE
Route::get('/edit-property/{id}',[PropertyController::class, 'edit_property']);
Route::post('/edit-property/{id}',[PropertyController::class, 'update_property']);
//UPDATE-MEDIA-FILE
Route::post('/update-property-media',[PropertyController::class, 'updateMediaFile']);


//PRE-CONSTRUCT-PROPERTY SEARCH PAGE ROUTE
Route::get('/pre-construct-search',[PropertyController::class,'pre_construct_search'])->name('pre-construct-search');
//Route::get('/pre-construct-search-new',[PropertyController::class,'pre_construct_search_new']);
//BLOG ROUTE
Route::get('/blog-page',[FrontController::class,'blog_pages']);
Route::get('/blog-detail/{id}',[FrontController::class,'blog_detail']);

Route::get('/sale-search', [PropertyController::class, 'sale_search']);

Route::post('/save-agent-inquiry', [PropertyController::class, 'saveAgentInquiry']);
//sale-property agent form
Route::post('/save-sale-agent-form/{id}',[PropertyController::class,'store_agent_form']);
//pre-construct-popup-inquiry-form
Route::post('/info-inquiry/{id}',[PropertyController::class,'inquiry_popup']);
Route::post('/check-inquiry',[PropertyController::class,'check_inquiry']);

//pre-construct-inquiry-form
Route::post('/save-inquiry/{id}', [PropertyController::class, 'save_inquiry_form']);

//PRE-CONSTRUCT-PROPERTY POPUP PAGE ROUTE
Route::post('/pre-construct-property/{id}',[PropertyController::class,'storeAgent']);

Route::group(['middleware' => 'total_viewer'],function () {
//SALE-PROPERTY SEARCH PAGE ROUTE
    Route::get('/sale-property/{id}',[PropertyController::class,'sale_single']);
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
Route::get('/my-properties',[DashboardController::class,'my_properties']);
Route::post('/my-profile',[DashboardController::class, 'updateProfile']);
Route::get('/my-profile',[DashboardController::class,'my_profile']);
Route::get('/my-favourite',[DashboardController::class, 'my_favourite']);
//favourite property
Route::get('/like/{id}',[AuthController::class,'like']);
Route::get('/unlike/{id}',[AuthController::class,'unlike']);

//ADD PROFILE-IMAGE ROUTE
Route::post('/add-profile-image',[DashboardController::class, 'saveProfileImage']);
//RESET PASSWORD ROUTE
Route::post('/change-password',[DashboardController::class, 'changePassword']);
//CHANGE EMAIL ROUTE
Route::post('/change-email',[DashboardController::class, 'changeEmail']);
//SUBSCRIBER NEWSLETTER ROUTE
Route::post('/subscribe-email', [FrontController::class,'newsletterPost']);
//get state by country
Route::post('get-states-by-country', [PropertyController::class, 'getState']);
//Route::post('get-selected-state',[PropertyController::class,'get_selected_state']);

//social share
Route::get('/social-share',[SocialShareController::class,'index']);

//LOGOUT ROUTE
Route::get('/logout',[AuthController::class, 'auth_logout']);

//search-route
Route::get('/search-property',[PropertyController::class,'search_data']);

//filter-property-result
Route::get('/filter-search-result',[PropertyController::class,'filter_search']);
//search-city
Route::get('/search-city',[PropertyController::class,'search_city']);
Route::post('/register-inquiry/{id}',[DashboardController::class,'register_inquiry_popup']);
//del-plan-2d-images(front-side for sale property)
Route::post('delete_floor_2d_image',[PropertyController::class,'destroy_plan_2d_image']);
//del-plan-3d-images(front-side for sale-property)
Route::post('delete_floor_3d_image',[PropertyController::class,'destroy_plan_3d_image']);
//del-plan-2d-images(admin-side for pre-construct property)
Route::post('/delete-pre-construct-floor-2d-image',[PreconstructPropertyController::class,'destroy_pre_construct_plan_2d_image']);
//del-plan-3d-images(admin-side for pre-construct property)
Route::post('/delete-pre-construct-floor-3d-image',[PreconstructPropertyController::class,'destroy_pre_construct_plan_3d_image']);
//del-plan-2d-images(admin-side for sale property)
Route::get('/delete-sale-floor-2d-image',[SalePropertyController::class,'destroy_sale_plan_2d_image']);
//del-plan-3d-images(admin-side for sale property)
Route::get('/delete-sale-floor-3d-image',[SalePropertyController::class,'destroy_sale_plan_3d_image']);

Route::get('multiple-image-preview', [PropertyController::class, 'index']);

Route::post('upload-multiple-image-ajax', [PropertyController::class, 'saveUpload']);
//coming-soon route
Route::get('/coming-soon', [FrontController::class,'coming_soon']);

//search filter property-status
Route::get('/property-data',[FrontController::class,'search_property_value']);
//search filter property-type
Route::get('/property-type-search',[FrontController::class,'search_property_type']);
//search property data
Route::get('/property-data-search',[FrontController::class,'search_property_data']);


//map all property
Route::get('/map-data',[FrontController::class,'location_data']);
//Route::get('/zip-code-data',[FrontController::class,'zip_code']);
//filter pre-construction property search
//Route::get('/prearch-filter',[PropertyController::class,'filter_data']);
//Route::post('/property-search-filter',[PropertyController::class,'filter_data']);
Route::get('/property-search-filter',[PropertyController::class,'filter_data'])->name('property-search-filter');

//Route::post('/property-sale-search-filter',[PropertyController::class,'filter_sale_data']);
Route::get('/property-sale-search-filter',[PropertyController::class,'filter_sale_data'])->name('property-sale-search-filter');
//add property category
Route::get('/admin/add-category',[PreconstructPropertyController::class,'addCategory']);
Route::post('/admin/add-category',[PreconstructPropertyController::class,'storeCategory']);
//view property category
Route::get('/admin/view-category',[PreconstructPropertyController::class,'showCategory']);
//edit-category
Route::get('/admin/edit-category/{id}',[PreconstructPropertyController::class,'EditCategory']);
Route::post('/admin/edit-category/{id}',[PreconstructPropertyController::class,'UpdateCategory']);
Route::get('/admin/delete-category/{id}',[PreconstructPropertyController::class,'DeleteCategory']);

Route::get('/property-map-filter',[FrontController::class,'property_click_filter']);

//Route::get('/property-search-filter',[PropertyController::class,'filter_data']);

Route::post('filter-property',[FrontController::class,'filterProperty']);

Route::get('/new-pre-construction',[PropertyController::class,'new_pre_construction_pro']);
//Route::get('/header-1',[PreconstructPropertyController::class,'header_1']);

//delete banner-1
Route::get('/admin/delete-banner-1',[PreconstructPropertyController::class,'destroy_b_1']);
//delete banner-2
Route::get('/admin/delete-banner-2',[PreconstructPropertyController::class,'destroy_b_2']);
//delete banner-3
Route::get('/admin/delete-banner-3',[PreconstructPropertyController::class,'destroy_b_3']);
//delete banner-4
Route::get('/admin/delete-banner-4',[PreconstructPropertyController::class,'destroy_b_4']);
Route::get('/admin/delete-banner-5',[PreconstructPropertyController::class,'destroy_b_5']);
Route::get('/admin/delete-banner-6',[PreconstructPropertyController::class,'destroy_b_6']);
Route::get('/admin/delete-banner-7',[PreconstructPropertyController::class,'destroy_b_7']);

//add-banner-1-using-ajax
Route::post('admin/add-banner-1',[PreconstructPropertyController::class,'add_banner_1']);
//delete-banner-1-using-ajax
Route::post('admin/delete-banner-1',[PreconstructPropertyController::class,'del_banner_1']);
//add-banner-2-using-ajax
Route::post('admin/add-banner-2',[PreconstructPropertyController::class,'add_banner_2']);
//delete-banner-2-using-ajax
Route::post('admin/delete-banner-2',[PreconstructPropertyController::class,'del_banner_2']);
//add-banner-3-using-ajax
Route::post('admin/add-banner-3',[PreconstructPropertyController::class,'add_banner_3']);
//delete-banner-3-using-ajaxsale-search
Route::post('admin/delete-banner-3',[PreconstructPropertyController::class,'del_banner_3']);
//add-banner-4-using-ajax
Route::post('admin/add-banner-4',[PreconstructPropertyController::class,'add_banner_4']);
//delete-banner-4-using-ajax
Route::post('admin/delete-banner-4',[PreconstructPropertyController::class,'del_banner_4']);

// new banners 5, 6, 7
//delete banner-5
Route::post('admin/add-banner-5',[PreconstructPropertyController::class,'add_banner_5']);
Route::post('admin/delete-banner-5',[PreconstructPropertyController::class,'del_banner_5']);
//delete banner-6
Route::post('admin/add-banner-6',[PreconstructPropertyController::class,'add_banner_6']);
Route::post('admin/delete-banner-6',[PreconstructPropertyController::class,'del_banner_6']);
//delete banner-7
Route::post('admin/add-banner-7',[PreconstructPropertyController::class,'add_banner_7']);
Route::post('admin/delete-banner-7',[PreconstructPropertyController::class,'del_banner_7']);

Route::get('/send-mail',[TestController::class,'sendWelcomeEmail']);

Route::get('/send-bulk-email',[TestController::class,'testBulkEmails']);

Route::get('/send-multiple-email',[TestController::class,'multipleMail']);
//Route::get('/send-multiple-email-example-2',[TestController::class,'multiple_email_example_2']);
