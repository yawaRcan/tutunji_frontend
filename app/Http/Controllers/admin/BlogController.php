<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    //add-blog form
    public function add_blog(){
//        $getCategory = BlogCategory::all();
        return view('admin.pages.blog.add-blog');
    }
    //save-blog form
    public function store_blog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'category' => 'required',
            'body' => 'required',
            'middleBanner' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/admin/add-blog')->withErrors($validator)->withInput();
        }else{
           //upload image code
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('admin-panel/assets/blog-image/'), $imageName);
                $dataDescription = strip_tags($request->get('body'));
                //$b = htmlentities($request->get('description'));
                $description = html_entity_decode($dataDescription);
                $blogData = new Blog(array(
                    'title' => $request->get('title'),
//                    'category' => $request->get('category'),
                    'image' => $imageName,
                    'body' => $description,
                    'middleBanner' => $request->get('middleBanner'),
                    'status' => '1'
//                    'description' => htmlentities($request->get('description')),
                ));
                $blogData->save();

            }
            return redirect('/admin/view-blog')->with('success','Success blog created!');
        }
    }
    //view-blog
    public function view_blog(){
        $allBlogData = Blog::query()->orderBy('id', 'desc')->get();
        return view('admin.pages.blog.view-blog',compact('allBlogData'));
    }
    //edit-blog
    public function edit_blog($blogId){
//        $getCategory = BlogCategory::all();
        $blogData = Blog::query()->where('id','=',$blogId)->get();
        return view('admin.pages.blog.edit-blog',compact('blogData'));
    }
    //edit-blog
    public function update_blog(Request $request,$blogId){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:50',
//            'category' => 'required',
            'body' => 'required',
            'middleBanner' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/admin/edit-blog/'.$blogId)->withErrors($validator)->withInput();
        }else{
//            if($request->hasFile('image')) {
                //return 'file is not empty';
                if ($request->hasFile('image')) {
//                return "true";
                    $floor2dPrevImage = DB::table('blogs')->where('id', '=', $blogId)->get();
                    $oldImage = $floor2dPrevImage[0]->image;
                    if (File::exists(public_path('admin-panel/assets/blog-image/' . $oldImage))) {
                        File::delete(public_path('admin-panel/assets/blog-image/' . $oldImage));

                        $imageName =  time() . '.' .$request->image->extension();
                        $request->image->move(public_path('admin-panel/assets/blog-image/'), $imageName);

                        DB::table('blogs')->where('id', $blogId)
                            ->update(['image' => $imageName]);
                    }
                    else {
                       $imageName = null;
                    }
                }
            $dataDescription = strip_tags($request->get('body'));
            //$b = htmlentities($request->get('description'));
            $description = html_entity_decode($dataDescription);
                    DB::table('blogs')->where('id', '=', $blogId)->update([
                        'title' => $request->get('title'),
//                        'category' => $request->get('category'),
                        'body' => $description,
                        'middleBanner' => $request->get('middleBanner')
                    ]);


                return redirect('/admin/view-blog')->with('success','Success! Blog updated');
        }
    }
    //ALL PRE-CONSTRUCT-PROPERTY
    public function all_blog(){
        $all_blog = Blog::query()->orderBy('id','desc')->get();
        return view('admin.pages.blog.all-blog',compact('all_blog'));
    }
    //ALL Active PRE-CONSTRUCT-PROPERTY
    public function all_active_blog(){
        $active_blog = Blog::query()->where('status','=','1')->orderBy('id','desc')->get();
        return view('admin.pages.blog.existing-blog',compact('active_blog'));
    }
    //ALL Deleted PRE-CONSTRUCT-PROPERTY
    public function all_deleted_blog(){
        $deleted_blog = Blog::query()->where('status','=','0')->orderBy('id','desc')->get();
        return view('admin.pages.blog.deleted-blog',compact('deleted_blog'));
    }
    //delete agent
    public function destroy_blog($blogId){
//       $blogData = Blog::query()->where('id',$blogId)->first();
//       //return $blogData->image;
//
////            $getImage = $blogData[0]->image;
//            if(File::exists(public_path('admin-panel/assets/blog-image/'.$blogData->image))){
//                File::delete(public_path('admin-panel/assets/blog-image/' . $blogData->image));
//            }
////        $blogDetail = Blog::query()->where('id',$blogId);
//            $blogData->delete();
//        return redirect('/admin/view-blog')->with('success', 'Success! Agent Deleted.');
        $blogStatus = Blog::query()->where('id',$blogId)->pluck('status');
        if($blogStatus[0] == 1)
        {
            $update = array('status' => 0);
            DB::table('blogs')->where('id', $blogId)->update($update);
            return redirect('/admin/view-blog')->with('success','Success! Blog Deleted.');
        }else{
            $update = array('internal_status' => 0);
            DB::table('blogs')->where('id', $blogId)->update($update);
            return redirect('/admin/view-blog')->with('success','Success! Blog Approved.');
        }
        return redirect()->back();
    }
    //add-category
    public function add_category(){
        return view('admin.pages.blog-category.add-category');
    }
    //save-category
    public function store_category(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:blog_categories,name',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/add-category')->withErrors($validator)->withInput();
        }else{
            $blogData = new BlogCategory(array(
                'name' => $request->get('name'),
            ));
            $blogData->save();
            return redirect('/admin/view-category')->with('success','Success category created!');
        }
    }
    //view-category
    public function show_category(){
        $allCategory = BlogCategory::query()->orderBy('id', 'desc')->get();
        return view('admin.pages.blog-category.view-category',compact('allCategory'));
    }
}
