<?php

namespace App\Http\Controllers\Prop;

use App\Http\Controllers\Controller;
use App\Models\Prop\PropImage;
use Illuminate\Http\Request;
use App\Models\Prop\Props; // Property Model
use App\Models\Prop\AllRequest;
use App\Models\Prop\SavedProp;
use Illuminate\Support\Facades\Auth;



class PropController extends Controller
{
    public function index() 
    {
        $prop = Props::select()->take(9)->orderByDesc('id' )->get();
        
        return view('home', compact('prop'));
    }

    public function single($id) 
    {
        $singleprop = Props::find($id);

        $propimages = PropImage::where('prop_id', $id)->get(); 

        // Related Props

        $relatedprops = Props::where('home_type', $singleprop->home_type)
                               ->where('id', '!=', $id)
                               ->take(3)
                               ->orderByDesc('id')
                               ->get();
        
        // Same Property Request Checking - only 1 request for same Property

        $SameProp = AllRequest::where('prop_id', $id)
                               ->where('user_id', Auth::user()->id)
                               ->count();

        // Same Property Save Checking - Same Property, No option for Saving

        $SavedProp = SavedProp::where('prop_id', $id)
                                    ->where('user_id', Auth::user()->id)
                                    ->count();

        return view('Prop.single', compact('singleprop', 'propimages', 'relatedprops', 'SameProp', 'SavedProp'));
    }

    public function insertRequests(Request $request) 
    {
        request()->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'phone' => 'required|max:50',
        ]);

        $insertRequest = AllRequest::create([

            "prop_id" => $request->prop_id,
            "user_id" => Auth::user()->id,
            "agent_name" => $request->agent_name,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
 
        ]);
        
        return redirect('/prop-details/'. $request->prop_id.'')->with('success', 'Request Sent Succussfully');
    }
    public function saveProps(Request $request) 
    {

        $insertRequest = SavedProp::create([

            "prop_id" => $request->prop_id,
            "user_id" => Auth::user()->id,
            "title" => $request->title,
            "image" => $request->image,
            "location" => $request->location,
            "price" => $request->price,
 
        ]);
        
        return redirect('/prop-details/'. $request->prop_id.'')->with('save', 'Property Saved Succussfully');
    }

    public function propsBuy() 
    {
        $type = "buy";

        $propsBuy = Props::select()->where('type', $type)->get();
        
        return view('Prop.propsbuy', compact('propsBuy'));
    }

    public function propsRent() 
    {
        $type = "rent";

        $propsRent = Props::select()->where('type', $type)->get();
        
        return view('Prop.propsrent', compact('propsRent'));
    }
    public function propsByHomeType($hometype) 
    {
        
        $propshometype = Props::select()->where('home_type', $hometype)->get();
        
        return view('Prop.propshometype', compact('propshometype', 'hometype'));
    }

    public function priceAsc() 
    {
        
        $prop_asc = Props::select()->orderBy('price', 'asc')->get();
        
        return view('Prop.propAsc', compact('prop_asc'));
    }

    public function priceDesc() 
    {
        
        $prop_desc = Props::select()->orderBy('price', 'desc')->get();
        
        return view('Prop.propDesc', compact('prop_desc'));
    }

    
    public function searchProps(Request $request) 
    {
        $list_types = $request->get('list_types');
        $offer_types = $request->get('offer_types');
        $select_city = $request->get('select_city');

        $prop_search = Props::select()->where('home_type', 'like', "%$list_types%")
                                      ->where('type', 'like', "%$offer_types%")
                                      ->where('city', 'like', "%$select_city%")
                                      ->get();
        
    
        
        return view('Prop.search', compact('prop_search'));
    }
    
}
