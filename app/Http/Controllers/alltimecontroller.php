<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\cuisine;
use App\Models\status;
use App\Models\document;
use App\Models\availableday;
use App\Models\discounttype;
use App\Models\restauranttype;
use App\Models\menutype;
use App\Models\currentstate;
use App\Models\location;
use App\Models\restaurant;
class alltimecontroller extends Controller
{
    public function  addcuisine(request $request)
    {
       $cuisinename = $request->cuisinename;
       $cuisines = cuisine::where([['cuisinename', $cuisinename]])->exists();
      if($cuisines != null)
      {
         return back()->with('cuisine_added', 'Cuisine name already exists');
          
      }
      else
      {
      	$cuisine= new cuisine();
      	$cuisine->cuisinename = $cuisinename;
      	$cuisine->save();
      	return back()->with('cuisine_added','Cusine name has been recorded');
      }
    }
    public function  addstatus(request $request)
    {
       $statusname = $request->statusname;
       $statuses = status::where([['statusname', $statusname]])->exists();
      if($statuses != null)
      {
         return back()->with('status_added', 'Status name already exists');
          
      }
      else
      {
        $status= new status();
        $status->statusname = $statusname;
        $status->save();
        return back()->with('status_added','Status name has been recorded');
      }
    }
        public function  adddocument(request $request)
    {
       $documentname = $request->documentname;
       $statusid = $request->statusid;
       $documents = document::where([['documentname', $documentname]])->exists();
      if($documents != null)
      {
         return back()->with('document_added', 'Document name already exists');
          
      }
      else
      {
        $document= new document();
        $document->documentname = $documentname;
        $document->statusid = $statusid;
        $document->save();
        return back()->with('document_added','Document name has been recorded');
      }
    }
      public function  addavailableday(request $request)
    {
       $availabledayname= $request->availablename;
       $availabledays = availableday::where([['availabledayname', $availabledayname]])->exists();
      if($availabledays != null)
      {
         return back()->with('availableday_added', 'Availableday name already exists');
          
      }
      else
      {
        $availableday= new availableday();
        $availableday->availabledayname = $availabledayname;
        $availableday->save();
        return back()->with('availableday_added','Availableday name has been recorded');
      }
    }
    public function  adddiscounttype(request $request)
    {
       $discounttypename= $request->discounttypename;
       $discounttypes = discounttype::where([['discounttypename', $discounttypename]])->exists();
      if($discounttypes != null)
      {
         return back()->with('discounttype_added', 'Discount Type name already exists');
          
      }
      else
      {
        $discounttype= new discounttype();
        $discounttype->discounttypename = $discounttypename;
        $discounttype->save();
        return back()->with('discounttype_added','Discount Type name has been recorded');
      }
    }
      public function  addrestauranttype(request $request)
    {
       $restauranttypename= $request->restauranttypename;
       $restauranttypes = restauranttype::where([['restauranttypename', $restauranttypename]])->exists();
      if($restauranttypes != null)
      {
         return back()->with('restauranttype_added', 'Restaurant Type name already exists');
          
      }
      else
      {
        $restauranttype= new restauranttype();
        $restauranttype->restauranttypename = $restauranttypename;
        $restauranttype->save();
        return back()->with('restauranttype_added','Restaurant Type name has been recorded');
      }
    }
          public function  addmenutype(request $request)
    {
       $menutypename= $request->menutypename;
       $menutypes = menutype::where([['menutypename', $menutypename]])->exists();
      if($menutypes != null)
      {
         return back()->with('menutype_added', 'Menu Type name already exists');
          
      }
      else
      {
        $menutype= new menutype();
        $menutype->menutypename = $menutypename;
        $menutype->save();
        return back()->with('menutype_added','Menu Type name has been recorded');
      }
    }
    public function  addcurrentstate(request $request)
    {
       $currentstatename= $request->currentstatename;
       $currentstates = currentstate::where([['currentstatename', $currentstatename]])->exists();
      if($currentstates != null)
      {
         return back()->with('currentstate_added', 'Current State name already exists');
          
      }
      else
      {
        $currentstate= new currentstate();
        $currentstate->currentstatename = $currentstatename;
        $currentstate->save();
        return back()->with('currentstate_added','Current State name has been recorded');
      }
    }
    public function  addlocation(request $request)
    {
       $locationname= $request->locationname;
       $locations= location::where([['locationname', $locationname]])->exists();
      if($locations != null)
      {
         return back()->with('location_added', 'Location name already exists');
          
      }
      else
      {
        $location= new location();
        $location->locationname = $locationname;
        $location->save();
        return back()->with('location_added','Location name has been recorded');
      }
    }
      public function  addrestaurant(request $request)
    {
       $image=$request->file('file');
       $imageName= time().'.'.$image->extension();
       $image->move(public_path('alltimeimages/restaurantlogos/'),$imageName); 
       $restaurantname= $request->restaurantname;
       $restaurantemail = $request->restaurantemail;
       $restaurantcontactnumber = $request->restaurantcontactnumber;
       $personname=$request->personname;
       $personphnumber = $request->personphnumber;
       $restauranttypeid = $request->restauranttypeid;
       $restaurants= restaurant::where([['restaurantname', $restaurantname]])->exists();
      if($restaurants != null)
      {
         return back()->with('restaurant_added', 'Restaurant name already exists');
          
      }
      else
      {
        $restaurant= new restaurant();
        $restaurant->restaurantlogo= $imageName;
        $restaurant->restaurantname = $restaurantname;
        $restaurant->restaurantemail= $restaurantemail;
        $restaurant->restaurantcontactnumber=$restaurantcontactnumber;
        $restaurant->personname  = $personname;
        $restaurant->personphnumber = $request->personphnumber;
        $restaurant->restauranttypeid = $request->restauranttypeid;
        $restaurant->save();
        return back()->with('restaurant_added','Restaurant name has been recorded');
      }
    }
    public  function  showcuisine(request $request)
    {
    	$cuisines = cuisine::all();
      return view('admin/cuisine',compact('cuisines'));
    }
     public  function  showstatus(request $request)
    {
      $statuses = status::all();
      return view('admin/status',compact('statuses'));
    }
     public  function  showavailableday(request $request)
    {
      $availabledays = availableday::all();
      return view('admin/availableday',compact('availabledays'));
    }
    public  function  showdocument(request $request)
    {
      $statuses = status::all();
       $documents = DB::table('documents')
       ->join('statuses', 'statuses.statusid', '=', 'documents.statusid')
       ->select('*')
       ->get();
      return view('admin/document',compact('statuses','documents'));
    }
    public  function  showdiscounttype(request $request)
    {
      $discounttypes = discounttype::all();
      return view('admin/discounttype',compact('discounttypes'));
    }
    public  function  showrestauranttype(request $request)
    {
      $restauranttypes = restauranttype::all();
      return view('admin/restauranttype',compact('restauranttypes'));
    }
     public  function  showmenutype(request $request)
    {
      $menutypes = menutype::all();
      return view('admin/menutype',compact('menutypes'));
    }
     public  function  showcurrentstate(request $request)
    {
      $currentstates = currentstate::all();
      return view('admin/currentstate',compact('currentstates'));
    }
      public  function  showlocation(request $request)
    {
      $locations = location::all();
      return view('admin/location',compact('locations'));
    }
         public  function  showrestaurant(request $request)
    {
      
      $restauranttypes= restauranttype::all();
       $restaurants = DB::table('restaurants')
       ->join('restauranttypes', 'restauranttypes.restauranttypeid', '=', 'restaurants.restauranttypeid')
       ->select('*')
       ->get();
      return view('admin/restaurant',compact('restauranttypes','restaurants'));
    }
      public function editcuisine(Request $request)
    {
      $id = $request->get('id');
      $cuisine = cuisine::find($id);
      return $cuisine;
    }
    public function editstatus(Request $request)
    {
      $id = $request->get('id');
      $status = status::find($id);
      return $status;
    }
      public function editavailableday(Request $request)
    {
      $id = $request->get('id');
      $availableday = availableday::find($id);
      return $availableday;
    }
    public function editdocument(Request $request)
    {
      $id = $request->get('id');
      $document =document::find($id);
      return $document;
    }
    public function editdiscounttype(Request $request)
    {
      $id = $request->get('id');
      $discounttype= discounttype::find($id);
      return $discounttype;
    }
      public function editrestauranttype(Request $request)
    {
      $id = $request->get('id');
      $restauranttype= restauranttype::find($id);
      return $restauranttype;
    }
    public function editmenutype(Request $request)
    {
      $id = $request->get('id');
      $menutype= menutype::find($id);
      return $menutype;
    }
      public function editcurrentstate(Request $request)
    {
      $id = $request->get('id');
      $currentstate= currentstate::find($id);
      return $currentstate;
    }
      public function editlocation(Request $request)
    {
      $id = $request->get('id');
      $location= location::find($id);
      return $location;
    }
    public function editrestaurant(Request $request)
    {
      $id = $request->get('id');
      $restaurant= restaurant::find($id);
      return $restaurant;
    }
    public function updatecuisine(request $request)
    {
      $cuisine = cuisine::find($request->id);
      $cuisine->cuisinename=$request->cuisinename;
      $cuisine->save();
      return back()->with('cuisine_updated','Cuisine record has been edited');
    }
    public function updatestatus(request $request)
    {
      $status = status::find($request->id);
      $status->statusname=$request->statusname;
      $status->save();
      return back()->with('status_updated','Status record has been edited');
    }
      public function updateavailableday(request $request)
    {
      $availableday = availableday::find($request->id);
      $availableday->availabledayname=$request->editavailabledayname;
      $availableday->save();
      return back()->with('availableday_updated','Availableday record has been edited');
    }
     public function updatedocument(request $request)
    {
      $document =document::find($request->id);
      $document->documentname=$request->documentname;
      $document->statusid=$request->statusid;
      $document->save();
      return back()->with('document_updated','Document record has been edited');
    }
       public function updatediscounttype(request $request)
    {
      $discounttype = discounttype::find($request->id);
      $discounttype->discounttypename=$request->discounttypename;
      $discounttype->save();
      return back()->with('discounttype_updated','Discount Type record has been edited');
    }
    public function updaterestauranttype(request $request)
    {
      $restauranttype = restauranttype::find($request->id);
      $restauranttype->restauranttypename=$request->restauranttypename;
      $restauranttype->save();
      return back()->with('restauranttype_updated','Restaurant Type record has been edited');
    }
    public function updatemenutype(request $request)
    {
      $menutype = menutype::find($request->id);
      $menutype->menutypename=$request->menutypename;
      $menutype->save();
      return back()->with('menutype_updated','Menu Type record has been edited');
    }
    public function updatecurrentstate(request $request)
    {
      $currentstate = currentstate::find($request->id);
      $currentstate->currentstatename=$request->currentstatename;
      $currentstate->save();
      return back()->with('currentstate_updated','Current State record has been edited');
    }
        public function updatelocation(request $request)
    {
      $location = location::find($request->id);
      $location->locationname=$request->locationname;
      $location->save();
      return back()->with('location_updated','Location record has been edited');
    }
    public function updaterestaurant(request $request)
    {
       $restaurantname=$request->restaurantname;
       $restaurantemail= $request->restaurantemail;
       $restaurantcontactnumber=$request->restaurantcontactnumber;
       $personname = $request->personname;
       $personphnumber=$request->personphnumber;
       $restauranttypeid=$request->restauranttypeid;
       $restaurantid=$request->id;
        if ($request->hasFile('logofile'))
        { 
           $image=$request->file('logofile');
           $imageName= time().'.'.$image->extension();
           $image->move(public_path('alltimeimages/restaurantlogos/'),$imageName);
              $restaurants= restaurant::where([['restaurantlogo',"!=" ,$imageName], ['restaurantid', $restaurantid] ])->first();
       if($restaurants != null)
      {
         unlink(public_path('alltimeimages/restaurantlogos/'.$restaurants->restaurantlogo));
       
           
      }
            $restaurant = restaurant::find($request->id);
            $restaurant->restaurantname=$restaurantname;
           $restaurant->restaurantemail=$restaurantemail;
           $restaurant->restaurantlogo=$imageName;
           $restaurant->restaurantcontactnumber=$restaurantcontactnumber;
           $restaurant->personname=$personname;
           $restaurant->personphnumber=$personphnumber;
           $restaurant->restauranttypeid=$restauranttypeid;
           $restaurant->save();
           return back()->with('restaurant_updated','Restaurant record has been edited');
         

      }
      else
      {
           $restaurant = restaurant::find($request->id);
           $restaurant->restaurantname=$restaurantname;
           $restaurant->restaurantemail=$restaurantemail;
           $restaurant->restaurantlogo=$imageName;
           $restaurant->restaurantcontactnumber=$restaurantcontactnumber;
           $restaurant->personname=$personname;
           $restaurant->personphnumber=$personphnumber;
           $restaurant->restauranttypeid=$restauranttypeid;
           $restaurant->save();
           return back()->with('restaurant_updated','Restaurant record has been edited');
      }
  }
    public function deletecuisine(request $request)
    {
      $cuisine = cuisine::find($request->id);
      $cuisine->delete();
    }
     public function deletestatus(request $request)
    {
      $status = status::find($request->id);
      $status->delete();
    }
       public function deletedocument(request $request)
    {
      $document = document::find($request->id);
      $document->delete();
    }
      public function deleteavailableday(request $request)
    {
      $availableday = availableday::find($request->id);
      $availableday->
      delete();
    }
      public function deletediscounttype(request $request)
    {
      $discounttype = discounttype::find($request->id);
      $discounttype->delete();
    }
        public function deleterestauranttype(request $request)
    {
      $restauranttype = restauranttype::find($request->id);
      $restauranttype->delete();
    }
       public function deletemenutype(request $request)
    {
      $menutype = menutype::find($request->id);
      $menutype->delete();
    }
      public function deletecurrentstate(request $request)
    {
      $currentstate = currentstate::find($request->id);
      $currentstate->delete();
    }
        public function deletelocation(request $request)
    {
      $location= location::find($request->id);
      $location->delete();
    }
     public function deleterestaurant(request $request)
    {
      $restaurant= restaurant::find($request->id);
      unlink(public_path('alltimeimages/restaurantlogos/'.$restaurant->restaurantlogo));
      $restaurant->delete();
    }
}
