<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Prop\HomeType;
use App\Models\Prop\Props;
use App\Models\Admin\Admin;
use App\Models\Prop\AllRequest;
use App\Models\Prop\PropImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use File;

class AdminController extends Controller
{
    public function viewLogin() {

        return view('admins.login');
    }

    public function createHomeTypes() {

        return view('admins.createhometypes');
    }
    
    
    public function index() {

        $adminsCount = Admin::select()->count();
        $propsCount = Props::select()->count();
        $hometypesCount = HomeType::select()->count();

        return view('admins.index', compact('adminsCount', 'hometypesCount', 'propsCount'));
    }

    public function allHomeTypes() {


        $allhometypes = HomeType::select()->get();

        return view('admins.hometypes', compact('allhometypes'));
    }

    public function allAdmins() {

        $allAdmins = Admin::select()->get();


        return view('admins.alladmins', compact('allAdmins'));
    }

    public function createAdmin() {

        return view('admins.createadmins');
    }

    public function storeAdmin(Request $request)
    {
        $storeAdmins = Admin::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
        ]);

        if($storeAdmins){
            return redirect('/admin/all-admins')->with('success', 'Admin created successfully');
        }
    }
    public function storeHomeTypes(Request $request)
    {
        $request->validate([
            'name' => 'required | max:40'
        ]);

        $storeHomeTypes = HomeType::create([
                    'home_type' => $request->name,
    
        ]);

        if($storeHomeTypes){
            return redirect('/admin/all-hometypes')->with('success', 'Home Type created successfully');
        }
    }

    public function updateHomeType(Request $request, $id)
    {
        $request->validate([
            'name' => 'required | max:40'
        ]);

        $homeType = HomeType::find($id);
        
        $homeType->update([
            'home_type' => $request->name
        ]);

        if($homeType){
            return redirect('/admin/all-hometypes')->with('update', 'Home Type Updated successfully');
        }
    }

    

    public function editHomeType($id){

        $homeType = HomeType::find($id);

        if($homeType){
            return view('admins.updatehometype', compact('homeType'));
        }
    }

    
    public function checkLogin(Request $request) {

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) 
        {
            
            return redirect() -> route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);

        return view('admins.login');
    }

    public function deleteHomeType($id){

        $homeType = HomeType::find($id);
        $homeType->delete();

        return redirect('/admin/all-hometypes')->with('delete', 'Home Type Deleted successfully');
    }

    public function Requests(){

        $requests = AllRequest::all();

        if($requests){
            return view('admins.requests', compact('requests'));
        }
    }

    
    public function allProps(){

        $allProps = Props::all();

        if($allProps){
            return view('admins.allprops', compact('allProps'));
        }
    }

    public function createProps(){
 
        return view('admins.createprops');
        
    }

    public function storeProps(Request $request)
    {

        $destinationPath = 'assets/images/';
        $myimage = time().'.'.$request['image']->getClientOriginalExtension();
        $request->image->move(public_path($destinationPath), $myimage);

        // echo $myimage;die;


        $Prop = new Props;

        $Prop->title        =   $request['title'];
        $Prop->price        =   $request['price'];
        $Prop->beds         =   $request['beds'];
        $Prop->baths        =   $request['baths'];
        $Prop->sq_ft        =   $request['sq_ft'];
        $Prop->home_type    =   $request['home_type'];
        $Prop->year_built   =   $request['year_built'];
        $Prop->price_sqft   =   $request['price_sqft'];
        $Prop->more_info    =   $request['more_info'];
        $Prop->location     =   $request['location'];
        $Prop->agent_name   =   $request['agent_name'];
        $Prop->type         =   $request['type'];
        
        $Prop->image        =   $myimage;

        $Prop->save();
        
        return redirect('/admin/all-props')->with('success', 'Property added successfully');
        
    }

    public function createGallery(){
        return view('admins.creategallery');
    }

    public function storeGallery(Request $request){
        
        $files=[];
        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $file)
            {
                $name=time().rand(1,50).'.'.$file->extension();
                $path="assets/images_gallery";
                $file->move(public_path($path), $name);
                $files[]=$name;

                $img = new PropImage();
                $img->image = $name;
                $img->prop_id = $request->prop_id;

                $img->save();
            }
        }

        return redirect('/admin/all-props')->with('success', 'Gallery added successfully');
    }

    public function deleteProps($id){
        
        $deleteProps = Props::find($id);

        if(File::exists(public_path('assets/images/' . $deleteProps->image))){
            File::delete(public_path('assets/images/' . $deleteProps->image));
        }else{
            //dd('File does not exists.');
        }

        $deleteProps->delete();

        // Delete Gallery
        $deleteGallery = PropImage::where('prop_id', $id)->get();

        foreach($deleteGallery as $delete)
        {
            if(File::exists(public_path('assets/images_gallery/' . $delete->image))){
                File::delete(public_path('assets/images_gallery/' . $delete->image));
            }else{
                //dd('File does not exists.');
            }

            $delete->delete();
            
        }

        return redirect('/admin/all-props')->with('delete', 'Property deleted successfully');
        
    }
    
}
