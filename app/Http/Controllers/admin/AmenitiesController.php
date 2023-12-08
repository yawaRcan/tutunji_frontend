<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
class AmenitiesController extends Controller
{
    //LIST AMENITIES DATA
    public function index()
    {
        $amenity = Amenities::query()->orderBy('id','desc')->get();
        return view('admin.pages.amenities.list-amenities', compact('amenity'));
    }
//    //STORE AMENITIES DATA
//    public function store(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required',
//            'file_icon' => 'required|mimes:svg|max:2000',
//        ]);
//        if ($validator->fails()) {
//            return redirect('/add_amenity')->withErrors($validator)->withInput();
//        }else{
//            $file_icon = $request->hasFile('file_icon');
//            return $file_icon;exit();
////            $res = new Amenities;
////            $res->name = $request->input('name');
////            $res->save();
////            return redirect('amenities_list')->with('success','Success! Amenities has been added successfully!');
//        }
//    }
    //EDIT AMENITIES DATA
    public function edit_amenity($amenity_id)
    {
        //return $amenity_id;
        $amenityData = Amenities::find($amenity_id);
        return view('admin.pages.amenities.edit-amenity',compact('amenityData'));

    }
    //UPDATE AMENITIES DATA
    public function update_amenity(Request $request,$amenity_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'file_icon' => 'image|mimes:svg|max:2000',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/edit-amenity/'.$amenity_id)->withErrors($validator)->withInput();
        }else{
            if ($request->hasFile('file_icon')) {
                $getOldamenity = DB::table('amenities')->where('id', '=', $amenity_id)->get();
                $oldIcon = $getOldamenity[0]->icon;
                if (File::exists(public_path('admin-panel/assets/property-images/amenities/icons/' . $oldIcon))) {
                    File::delete(public_path('admin-panel/assets/property-images/amenities/icons/' . $oldIcon));

                    $imageName =  time() . '.' .$request->file_icon->extension();
                    $request->file_icon->move(public_path('admin-panel/assets/property-images/amenities/icons/'), $imageName);

                    DB::table('amenities')->where('id', $amenity_id)
                        ->update(['icon' => $imageName]);
                }
                else {
                    $imageName = null;
                }
            }

            DB::table('amenities')->where('id',$amenity_id)->update([
                'name' => $request->get('name'),
            ]);
            return redirect('amenities_list')->with('success','Amenity has ben updated successfully.');
        }
    }
    //DELETE AMENITIES DATA
    public function destroy_amenity($id)
    {
        if($id){
            $getOldData = Amenities::query()->where('id',$id)->get();
            $getOldIcon = $getOldData[0]->icon;
            $path = public_path('admin-panel/assets/property-images/amenities/icons/'.$getOldIcon);
            if (File::exists($path)){
                File::delete($path);
            }
            Amenities::query()->where('id',$id)->delete();
            return redirect('amenities_list')->with('success','Amenity has been deleted successfully');
        }else{
            return redirect('amenities_list')->with('error','Amenity id is not found!');
        }
    }


    //new code
    //add amenity
    public function add_amenity(){
        return view('admin.pages.amenities.add-amenities');
    }
    //store amenity
    public function store_amenity(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'file_icon' => 'required|image|mimes:svg|max:2000',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/add-amenity')->withErrors($validator)->withInput();
        }else {
            if($request->hasFile('file_icon')){
                $file= $request->file('file_icon');
                    $imageName = time() . '.' . $file->extension();
                    $file->move(public_path('admin-panel/assets/property-images/amenities/icons/'), $imageName);

                    $amenityData = new Amenities();
                    $amenityData->name = $request->name;
                    $amenityData->icon = $imageName;
                    $amenityData->save();
                    return redirect('amenities_list')->with('success','Amenity has been saved successfully.');
                }
        }
    }

}
