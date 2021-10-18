<?php

namespace App\Http\Controllers\Admin;

use App\Discount;
use App\Document;
use App\Location;
use App\Notifications\MorayLimousineNotifications;
use App\UploadedDocument;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehicle;
use App\VehicleCategory;
use App\VehicleMake;
use App\VehicleModel;
use App\VehicleType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class VehicleController extends Controller
{
    private $vehicle;
    private $uploadedDocument;

    public function __construct(Vehicle $vehicle,  UploadedDocument $uploadedDocument)
    {
        $this->vehicle = $vehicle;
        $this->uploadedDocument = $uploadedDocument;
    }


    /** Rules for validate Vehicle Before Saving
     * @var array
     */
    protected $VehicleValidationRules = [
        'title' => 'required|max:50|string',
        'vehicleCategory_id' => 'required|integer',
        'engine_capacity' => 'required|string',
        'transmission' => 'required|string',
        'fuel_type' => 'required|string|max:20',
        'plate' => 'required|string|max:40',
        'model_no' => 'required|string|max:40',
    ];

    public function addVehicle()
    {
        $data['category'] = VehicleCategory::all();
        $data['locations'] = Location::all();
        return view('admin.vehicle.add-vehicle', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vehicleList()
    {
        $data['vehicles'] = $this->vehicle->orderBy('id', 'desc')->get();
        return view('admin.vehicle.vehicle-list', $data);
    }

    /** Save Vehicle Information
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveVehicle(Request $request)
    {
        $image = $request['image_name'];
        $id = $request->ID;
        $locations = $request->locations;
        $this->validate($request, $this->VehicleValidationRules);
        $formData = $request->except('locations');

        //save Image to Directory
        if ($request->hasFile('image_name')) {
            $image = time() . $request->image_name->getClientOriginalName();
            $request->image_name->move(public_path('admin-vehicle-img'), $image);
            $formData['image_name'] = $image;
        }
        if (isset($id)) {
            $formData = $request->except('_token', 'locations');
            if ($image != null or '') {
                $formData['image_name'] = $image;
            }
            $this->vehicle->updateVehicle($formData, $id, $locations);
        } else {
            $new_vehicle = $this->vehicle->createNewVehicle($formData, $locations);


            //            Notifications and email content
            $vehicle_added_partner = [
                'greeting' => "New Vehicle is Added Successfully",
                'subject' => 'New Vehicle Added Successfully',
                'body'   => 'You Add a new Vehicle On Moray Limousines  Please Upload Vehicle Documents In order to get Approved By Admin ! Enjoy With Us.  ',
                'thanks_text' => 'Thanks For Using Moray Limousine',
                'action_text' => 'View My Site',
                'action_url' => 'partner/dashboard',
            ];
            $vehicle_admin = [
                'greeting' => 'A New Vehicle Successfully Added on Moray-Limousines',
                'subject' => 'New Vehicle is Added By a Partner.',
                'body'   => 'A New Vehicle Added on Moray-Limousines Please check the Details of vehicle by visiting the web site',
                'thanks_text' => 'Moray Limousine Site',
                'action_text' => 'View My Site',
                'action_url' => 'admin/vehicle/vehicleDetail/' . $new_vehicle->id,
            ];
            $user = auth()->user();
            $user->notify(new MorayLimousineNotifications($vehicle_added_partner));
            $users = User::where('user_type', 'admin')->get();
            Notification::send($users, new MorayLimousineNotifications($vehicle_admin));
        }
        return redirect(url('admin/vehicle-list'))->with('status', 'Vehicle has been added');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateVehicle($id)
    {
        $data['category'] = VehicleCategory::all();
        $data['vehicle'] =  $this->vehicle->find($id);
        $data['locations'] =  Location::all();
        $data['vehicle_documents'] = Document::where('applied_on', 'vehicle')->get();
        $data['uploaded_docs'] = $data['vehicle']->documents;
        return view('admin.vehicle.add-vehicle', $data);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|RedirectResponse|\Illuminate\View\View
     */
    public function approveVehicle($id)
    {
        $vehicle = $this->vehicle->find($id);
        if (!$vehicle) {
            return redirect(url('admin/vehicle-list'))->with('error', 'Vehicle Not Found!');
        }
        $vehicle->status = 'approved';
        $vehicle->update();
        $data['vehicles'] = $this->vehicle->orderBy('id', 'desc')->get();
        //send approve vehicle
        if ($vehicle->creator_id) {
            $user = User::find($vehicle->creator_id);
            $registered_msg = $this->notifyvehicleapprovedMsg;
            $user->notify(new MorayLimousineNotifications($registered_msg));
        }

        return view('parshall-views._vehicle-listing-table', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|RedirectResponse|\Illuminate\View\View
     */
    public function disapproveVehicle($id)
    {
        $vehicle =  $this->vehicle->find($id);
        if (!$vehicle) {
            return redirect(url('admin/vehicle-list'))->with('error', 'Vehicle Not Found!');
        }
        $vehicle->status = 'blocked';
        $vehicle->update();
        $data['vehicles'] = $this->vehicle->orderBy('id', 'desc')->get();
        //send approve vehicle
        if ($vehicle->creator_id) {
            $user = User::find($vehicle->creator_id);
            $registered_msg = $this->notifyvehicledisapprovedMsg;
            $user->notify(new MorayLimousineNotifications($registered_msg));
        }
        return view('parshall-views._vehicle-listing-table', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function deleteVehicle($id)
    {
        $vehicle =  $this->vehicle->find($id);
        if (!$vehicle) {
            return redirect(url('admin/vehicle-list'))->with('error', 'Vehicle Not Found!');
        }
        // Check is this vehicle have children relation
        // $vehicleCount = Vehicle::where('type_id',$id)->get()->count();
        // if($vehicleCount > 0){
        //     return redirect(url('admin/vehicle-list'))->with('error','Vehicle is in use you cannot delete it');
        // }
        $vehicle->delete();
        $data['vehicles'] = $this->vehicle->orderBy('id', 'desc')->get();
        return view('parshall-views._vehicle-listing-table', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vehicleDetails($id)
    {
        $vehicle = Vehicle::find($id);
        $data['vehicle'] = $vehicle;
        $data['vehicle_category'] = $vehicle->VehicleCategory()->first();
        $data['vehicle_locations'] = $vehicle->locations;
        $data['vehicle_documents'] = $vehicle->documents;
        return view('partner.vehicle-details', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeDocuments(Request $request)
    {
        $imageName = null;
        if ($request->hasFile('document_img')) {
            $imageName = time() . $request->document_img->getClientOriginalName();
            $request->document_img->move(public_path('uploaded-user-images/partner-documents'), $imageName);
        }
        $documents_data = $request->only('document_title');
        $edit_id = $request->edit_id;
        $vehicle_id = $request->vehicle_id;
        if ($edit_id == null) {
            $documents = $this->vehicle->find($vehicle_id)->documents()->where('document_title', $documents_data)->get();
            if (count($documents) > 0) {
                return redirect(url('admin/update-vehicle/' . $vehicle_id))->with('error', 'Error ! This Document ( ' . $documents_data['document_title'] . ' )  Already Exist You Can Edit It If you Want.');
            }
            $documents_data['document_img'] = $imageName;
            $document = $this->uploadedDocument->saveVehicleDocuments($documents_data, $vehicle_id);
        } else {
            if (isset($imageName)) {
                $documents_data['document_img'] = $imageName;
            }
            $this->uploadedDocument->updateVehicleDocument($documents_data, $edit_id, $vehicle_id);
        }
        return redirect(url('admin/update-vehicle/' . $vehicle_id))->with('success', 'Success ! Document Is Saved Successfully');
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function deleteDocument($id)
    {
        $document = UploadedDocument::find($id);
        if ($document) {
            $document->delete();
        }
        return redirect()->back()->with('success', 'Document Is Deleted Successfully ');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allVehicles()
    {
        $user_type = auth()->user()->user_type;
        if ($user_type == 'admin' or $user_type == "Admin") {
            $data['vehicles'] = $this->vehicle->orderBy('id', 'desc')->get();
        } else {
            $data['vehicles'] = $this->vehicle
                ->where('creator_id', auth()->id())
                ->orderBy('id', 'desc')->get();
        }
        return view('parshall-views._vehicle-listing-table', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pendingVehicles()
    {
        $user_type = auth()->user()->user_type;
        if ($user_type == 'admin' or $user_type == "Admin") {
            $data['vehicles'] = $this->vehicle->where('status', 'pending')->orderBy('id', 'desc')->get();
        } else {
            $data['vehicles'] = $this->vehicle->where('status', 'pending')->where('creator_id', auth()->id())
                ->orderBy('id', 'desc')->get();
        }
        return view('parshall-views._vehicle-listing-table', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function approvedVehicles()
    {
        $user_type = auth()->user()->user_type;
        if ($user_type == 'admin' or $user_type == "Admin") {
            $data['vehicles'] = $this->vehicle->where('status', 'approved')->orderBy('id', 'desc')->get();
        } else {
            $data['vehicles'] = $this->vehicle->where('status', 'approved')->where('creator_id', auth()->id())
                ->orderBy('id', 'desc')->get();
        }
        return view('parshall-views._vehicle-listing-table', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function disapprovedVehicles()
    {
        $user_type = auth()->user()->user_type;
        if ($user_type == 'admin' or $user_type == "Admin") {
            $data['vehicles'] = $this->vehicle->where('status', 'disapproved')->orderBy('id', 'desc')->get();
        } else {
            $data['vehicles'] = $this->vehicle->where('status', 'disapproved')->where('creator_id', auth()->id())->orderBy('id', 'desc')->get();
        }
        return view('parshall-views._vehicle-listing-table', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blockedVehicles()
    {
        $user_type = auth()->user()->user_type;
        if ($user_type == 'admin' or $user_type == "Admin") {
            $data['vehicles'] = $this->vehicle->where('status', 'blocked')->orderBy('id', 'desc')->get();
        } else {
            $data['vehicles'] = $this->vehicle->where('status', 'blocked')->where('creator_id', auth()->id())
                ->orderBy('id', 'desc')->get();
        }
        return view('parshall-views._vehicle-listing-table', $data);
    }

    protected $notifyvehicleapprovedMsg = [
        'greeting' => 'A New vehicle On Moray Limousines is Approved',
        'subject' => 'New vehicle is Approved',
        'body'   => 'A New vehicle On Moray Limousines is Approved',
        'thanks_text' => 'Thanks For Using Moray Limousines',
        'action_text' => 'View My Site',
        'action_url' => '/partner/dashboard'
    ];
    protected $notifyvehicledisapprovedMsg = [
        'greeting' => 'A New vehicle On Moray Limousines is DisApproved',
        'subject' => 'New vehicle is DisApproved',
        'body'   => 'A New vehicle On Moray Limousines is DisApproved',
        'thanks_text' => 'Thanks For Using Moray Limousines',
        'action_text' => 'View My Site',
        'action_url' => '/partner/dashboard'
    ];
}
