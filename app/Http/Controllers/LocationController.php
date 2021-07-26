<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    private $location;
    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addLocations(){
        $data['locations'] = Location::all();
        return view('admin.manage-locations.add-locations',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveLocation(Request $request){
        $edit_id = $request->edit_id;
        if ($edit_id == null){
            $location = Location::where('location_city',$request['location_city'])->get();
            if (count($location) > 0){
                return redirect('admin/add-locations')->with('error','Oops .. ! This City Already Added');

            }else{
                Location::create($request->all());
            }
        }else{
            Location::where('id',$edit_id)->update($request->except('_token','edit_id'));
        }

        return redirect('admin/add-locations')->with('success','Success .. !  City Location / City Saved Successfully .');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteLocation($id){
        $location = Location::find($id);
        $location->delete();
        return redirect('admin/add-locations');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editLocation($id){
        $location = Location::find($id);
        return response()->json($location);
    }

    public function makeTopCity($id){
        $location = $this->location->find($id);
        $location->is_top_city = true;
        $location->save();
        return redirect()->back();
    }

    public function removeTopCity($id){
        $location = $this->location->find($id);
        $location->is_top_city = false;
        $location->save();
        return redirect()->back();
    }

}
