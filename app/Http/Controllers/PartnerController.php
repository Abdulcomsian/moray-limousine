<?php

namespace App\Http\Controllers;

use App\CmsHomePage;
use App\Configuration;
use App\Document;
use App\Http\Controllers\Admin\Booking;
use App\Location;
use App\Model\Partner;
use App\Notifications\MorayLimousineNotifications;
use App\Rules\MatchOldPassword;
use App\UploadedDocument;
use App\User;
use App\UsersMedia;
use App\Vehicle;
use App\VehicleCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class PartnerController extends Controller
{
    private $partner;
    private $uploadedDocument;
    private $vehicle;
    private $user;


    public function __construct(User $user, Partner $partner, UploadedDocument $uploadedDocument , Vehicle $vehicle)
    {
        $this->partner = $partner;
        $this->uploadedDocument = $uploadedDocument;
        $this->vehicle = $vehicle;
        $this->user = $user;
    }

    protected $validationRules =   [
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'email' => 'required|string|email|max:255|unique:users',
        'phone_number' => 'required|max:25',
        'password' => 'required|string|min:6|confirmed',
        'user_type' => 'required|string|max:15',
    ];
    /**
     * @var array
     */
    protected $VehicleValidationRules = [
        'title' => 'required|max:50|string',
        'vehicleCategory_id' => 'required',
        'engine_capacity' => 'required|string',
        'transmission' => 'required|string',
        'fuel_type' => 'required|string|max:20',
        'plate' => 'required|string|max:40',
        'model_no' => 'required|string|max:40'
    ];

    /**
     * @var array
     */
    public $partnerRules = [
        'user_id' => 'required',
    ];

    public function profileView(){
        $documents = auth()->user()->uploadedDocuments;
        return view('partner.profile-view')->with('documents', $documents);
    }

    /** Form view to user enter profile details
     * @return Factory|View
     */
    public function buildProfile(){
        $data['locations'] = Location::all();
        $data['config'] = Configuration::first();
        return view('partner.build-profile',$data);
    }

    /**
     * Save and Update Driver Profile
     * @param Request $request
     * @return string
     */
    public function storePartner(Request $request){
        $locations = $request->locations;
        $id = null;
        $id = $request['id'];
        $imageName = null;
        $media = new UsersMedia();
        if($request->hasFile('image_name')){
            $imageName = time().$request->image_name->getClientOriginalName();
            $request->image_name->move(public_path('uploaded-user-images/endusers-images'),$imageName);
        }

        if ($id == null){
            $this->validate($request, $this->partnerRules);
            $formdata = $request->except(['image_name','document_img','document_title','locations']);
           $user = $this->partner->createProfile($formdata,$locations);
            if (isset($imageName)){
                $media->saveUserImage($imageName,Auth()->id());
            }
        }
//        Update Partner profile
        else{
            $formdata = $request->except(['_token','image_name','document_img','document_title','locations']);
            $this->validate($request, $this->partnerRules);
            $locations = $request->locations;
            $this->partner->updateProfile($formdata,$id,$locations);
            if (isset($imageName)){
                if (Auth()->user()->userMedia()->first()){
                    $media->updateUserImage($imageName,Auth()->id());
                }else{$media->saveUserImage($imageName,Auth()->id());}
            }
        }

        return redirect(route('partner.profile'));
    }


    /**
     * @param $id
     * @return Factory|View
     */
    public function updateProfile($id){

        $data['user'] = Partner::find($id);
        $data['documents'] = Document::all();
        $data['locations'] = Location::all();
        $data['config'] = Configuration::first();
        return view('partner.build-profile',$data);
    }

    /**
     * @return Factory|View
     */
    public function becomePartner(){
        return view('home.become-partner');
    }

    /**
     * @return Factory|View
     */
    public function partnerDashboard(){
        $data['bookings'] = auth()->user()->booking()->get();
        $data['canceled_bookings'] = auth()->user()->booking->where('booking_status','canceled');
        $data['pending_bookings'] = auth()->user()->booking->where('booking_status','pending');
        $data['completed_bookings'] = auth()->user()->booking->where('booking_status','completed');
        return view('partner.partner-dashboard', $data);
    }

    /**
     * @return Factory|View
     */
    public function addNewDriver(){
        $drivers = auth()->user()->users;
        return view('partner.partner-drivers-list')->with('drivers',$drivers);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function approveDriver(Request $request){
        $id = $request->id;
        $user =  auth()->user()->users()->find($id);
        $user->pivot->status = "active";
        $user->pivot->update();
        $data['drivers'] = auth()->user()->users;
        return view('parshall-views._driver-list-table',$data);
    }


    /**
     * @param Request $request
     * @return Factory|View
     */
    public function disapproveDriver(Request $request){
        $id = $request->id;
        $user =  auth()->user()->users()->find($id);
        $user->pivot->status = "blocked";
        $user->pivot->update();
        $data['drivers'] = auth()->user()->users;
        return view('parshall-views._driver-list-table',$data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function blockDriver(Request $request){
        $id = $request->id;
        $user =  User::find($id);
        $user->status = 'blocked';
        $user->save();
        $drivers = User::where('user_type', 'driver')
            ->where('creator_id',Auth()->id())->orderBy('id','desc')->get();
        $data['drivers'] = $drivers;
        return view('parshall-views._driver-list-table',$data);
    }

    /**
     * @param $id
     * @return Factory|View
     * Driver Details View
     */
    public function driverDetails($id){
        $data['user'] = User::find($id);
        return view('partner.driver-details',$data);
    }

    /** Return view of add driver Form
     * @return Factory|View
     */
    public function addNewVehicle(){
        $data['category'] = VehicleCategory::all();
        $data['locations'] = Location::all();
        return view('partner.add-vehicle',$data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveVehicle(Request $request){
        $image = $request['image_name'];
        $id = $request->ID;
        $this->validate($request,$this->VehicleValidationRules);
        $formData = $request->all();
        $locations = $request->locations;

        //save Image to Directory
        if($request->hasFile('image_name')){
            $image = time().$request->image_name->getClientOriginalName();
            $request->image_name->move(public_path('admin-vehicle-img'),$image);
            $formData['image_name'] = $image;
        }
        if(isset($id)){
            $formData = $request->except('_token','locations');
            if($image != null or ''){ $formData['image_name'] = $image;}
            $formData['status'] = 'pending';
            $vehicle = $this->vehicle->updateVehicle($formData , $id, $locations);
            return redirect(url('partner/update-vehicle/'.$id))->with('success','Vehicle has been Updated added');
        }
        else{
            $new_vehicle =  $this->vehicle->createNewVehicle($formData , $locations);
            $user = auth()->user();
            $user->notify(new MorayLimousineNotifications($this->vehicle_added_partner));
            $users = User::where('user_type','admin')->get();
            $msg = $this->notifyVehicleAdded($new_vehicle->id);
            Notification::send($users, new MorayLimousineNotifications($msg));
            return redirect(url('partner/update-vehicle/'.$new_vehicle->id))->with('success','Vehicle has been added');
        }
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function updateVehicle($id){
        $data['category'] = VehicleCategory::all();
        $data['vehicle'] =  Vehicle::find($id);
        $data['locations'] =  Location::all();
        $data['vehicle_documents'] =  Document::where('applied_on', 'vehicle')->get();
        $data['uploaded_docs'] = $data['vehicle']->documents;
//        if(!$data['vehicle']){
//            return redirect(url('admin/vehicle-list'))->with('error','Vehicle not found!');
//        }
        return view('partner.add-vehicle',$data);
    }

    /** Return Vehicle Listings View
     * @return Factory|View
     */
    public function vehiclesList(){
        $data['vehicles'] = Vehicle::where('creator_id', Auth()->id())->get();
        return view('partner.partner-vehicles-list',$data);
    }



    public function partnerNotifications(){
        $notifications = auth()->user()->notifications()->where('read_at','!=' , null)->orderBy('id','desc')->get();
        return view('partner.partner-notifications')->with('notifications',$notifications);

    }

    /**
     * Retrun Partners All Bookings Page
     * @return Factory|View
     */
    public function partnerReservations(){
        $data['canceled_bookings'] = auth()->user()->booking->where('booking_status','canceled');
        $data['pending_bookings'] = auth()->user()->booking->where('booking_status','pending');
        $data['completed_bookings'] = auth()->user()->booking->where('booking_status','completed');
        $data['bookings'] = auth()->user()->booking->sortByDesc('created_at');
        return view('partner.partner-reservations', $data);
    }

    /**
     * @return Factory|View
     */
     public function partnerAllBookings(){
        $data['bookings'] = auth()->user()->booking->sortByDesc('created_at');
      return view('parshall-views._partner-bookings-table', $data);
    }

    /**
     * @return Factory|View
     */
    public function partnerCanceledBookings(){
        $data['bookings'] = auth()->user()->booking->where('booking_status','canceled');
        return view('parshall-views._partner-bookings-table', $data);
    }

    /**Bookings By date
     * @param Request $request
     * @return Factory|View
     */
    public function bookingsByDate(Request $request){
        $data['bookings'] = auth()->user()->booking
            ->where('pick_date','>=',  $request['from_date'])
            ->where('pick_date' ,'<=', $request['to_date']);
        return view('parshall-views._partner-bookings-table', $data);
    }


    /**
     * @return Factory|View
     */
    public function partnerPendingBookings(){
        $data['bookings'] = auth()->user()->booking->where('booking_status','pending');
        return view('parshall-views._partner-bookings-table', $data);
    }

    /**
     * @return Factory|View
     */
    public function partnerCompletedBookings(){
        $data['bookings'] = auth()->user()->booking->where('booking_status','completed');
        return view('parshall-views._partner-bookings-table', $data);
    }

    /**
     * @return Factory|View
     */
    public function changePasswordForm(){
        return view('partner.partner-change-password');
    }

    /**
     * @return Factory|View
     */
    public function uploadDocuments(){
        $data['documents'] = Document::where('applied_on','partner')->get();
        $data['userDocuments'] = auth()->user()->uploadedDocuments;
        return view('partner.documents',$data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeDocuments(Request $request){
        $imageName = null;
        if($request->hasFile('document_img')){
            $imageName = time().$request->document_img->getClientOriginalName();
            $request->document_img->move(public_path('uploaded-user-images/partner-documents'),$imageName);
        }
        $documents_data = $request->only('document_title');
        $edit_id = $request->edit_id;
        if ($edit_id == null){
            $documents = auth()->user()->uploadedDocuments()->where('document_title',$documents_data)->get();
            if (count($documents)>0){
                return redirect(url('partner/manage-documents'))->with('error','Error ! This Document ( '.$documents_data['document_title'].' )  Already Exist You Can Edit It If you Want.');
            }
            $documents_data['document_img'] = $imageName;
            $document = $this->uploadedDocument->saveDocuments($documents_data);
        }else{
            if (isset($imageName)){
                $documents_data['document_img'] = $imageName;
            }

            $this->uploadedDocument->updateDocument($documents_data,$edit_id);
        }
            return redirect(url('partner/manage-documents'))->with('success','Success ! Document Is Saved Successfully');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function deleteDocument($id){
        $document = UploadedDocument::find($id);
        if ($document){
            $document->delete();
        }
        return redirect(url('partner/manage-documents'))->with('success','Document Is Deleted Successfully ');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeVehicleDocs(Request $request){
        $imageName = null;
        if($request->hasFile('document_img')){
            $imageName = time().$request->document_img->getClientOriginalName();
            $request->document_img->move(public_path('uploaded-user-images/partner-documents'),$imageName);
        }
        $documents_data = $request->only('document_title');
        $edit_id = $request->edit_id;
        $vehicle_id = $request->vehicle_id;
        if ($edit_id == null){
            $documents = $this->vehicle->find($vehicle_id)->documents()->where('document_title',$documents_data)->get();
            if (count($documents)>0){
                return redirect(url('partner/update-vehicle/'.$vehicle_id))->with('error','Error ! This Document ( '.$documents_data['document_title'].' )  Already Exist You Can Edit It If you Want.');
            }
            $documents_data['document_img'] = $imageName;
            $document = $this->uploadedDocument->saveVehicleDocuments($documents_data,$vehicle_id);
        }else{
            if (isset($imageName)){
                $documents_data['document_img'] = $imageName;
            }
            $this->uploadedDocument->updateVehicleDocument($documents_data,$edit_id,$vehicle_id);
        }
        return redirect(url('partner/update-vehicle/'.$vehicle_id))->with('success','Success ! Document Is Saved Successfully');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function changePassword(Request $request){
        {
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);
            User::find(auth()->id())->update(['password'=> Hash::make($request->new_password)]);
            return redirect()->route('partner.edit.password')->with('success','Success ..! Password Is Changed Successfully !');
        }
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function saveNewDriver(Request $request){
        $this->validate($request,$this->validationRules);
        $user = $this->user->registerDriver($request->all());
        $driver_id =  $user->id;
        auth()->user()->users()->attach($driver_id,['status' => 'active']);
        //notify admin
        $admin=User::where('user_type','admin')->first();
        $registered_msg = array_merge($this->notifyDriverMsg,['body'=> 'A New Partner On Moray Limousines Added You As Driver For More Details visit web']);
        $user->notify(new MorayLimousineNotifications($registered_msg));
        $registered_msg = array_merge($this->adminnotifyDriverMsg,['body'=> 'A New Driver On Moray Limousines is Added']);
        $admin->notify(new MorayLimousineNotifications($registered_msg));
        return redirect(route('partner.driver.list'))->with('success','"Success... !" New Driver Created Successfully ');
    }

    /** Search Drivers and add by Partner
     *
     *
     * @param Request $request
     * @return mixed
     */
    public function addDriver(Request $request){
        $search_qry = $request->search_qry;
        $data['drivers'] = User::where('user_type' , 'driver')
            ->where('email',$search_qry)->get();
        return  view('parshall-views._searched_driver',$data);
    }

    /**
     * @return Factory|View
     */
    public function searchByEmail(){
        $partners = $this->user->where('user_type','partner')->
        where('status','disapproved')->orderBy('id','desc')->get();
        return view('parshall-views._partner-list-table')->with('partners' , $partners);
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function addNewDriverByEmail($id){
        $check_driver = auth()->user()->users()->find($id);
//        if driver already in list
        if($check_driver != null or isset($check_driver)){
            return redirect()->back()->with('error','"Error .. !  " This Driver Is Already In Your Drivers List.');
        }
//        Add Driver In list
        else{
            auth()->user()->users()->attach($id);
//            Notifications and email Text
            $driver = $this->user->findPartner($id);
            $driver->notify(new MorayLimousineNotifications($this->notifyDriverMsg));
            return redirect()->back()->with('success','"Success .. !  "A New Driver Is Added In Your Drivers List');
        }
    }


    /**
     * @return Factory|View
     */
    public function allPartners(){
        $partners = $this->user->where('user_type','partner')->orderBy('id','desc')->get();
        return view('parshall-views._partner-list-table')->with('partners' , $partners);
    }
    /**
     * @return Factory|View
     */
    public function pendingPartners(){
        $partners = $this->user->where('user_type','partner')->
              where('status','pending')->orderBy('id','desc')->get();
        return view('parshall-views._partner-list-table')->with('partners' , $partners);
    }
    /**
     * @return Factory|View
     */
    public function approvedPartners(){
        $partners = $this->user->where('user_type','partner')->
        where('status','approved')->orderBy('id','desc')->get();
        return view('parshall-views._partner-list-table')->with('partners' , $partners);
    }
    /**
     * @return Factory|View
     */
    public function disapprovedPartners(){
        $partners = $this->user->where('user_type','partner')
            ->where('status','disapproved')->orderBy('id','desc')->get();
        return view('parshall-views._partner-list-table')->with('partners' , $partners);
    }
    /**
     * @return Factory|View
     */
    public function blockedPartners(){
        $partners = $this->user->where('user_type','partner')->
        where('status','blocked')->orderBy('id','desc')->get();;
        return view('parshall-views._partner-list-table')->with('partners' , $partners);
    }





    private  $vehicle_added_partner = [
        'greeting' => "New Vehicle is Added Successfully",
        'subject' => 'New Vehicle Added Successfully',
        'body'   => 'You Add a new Vehicle On Moray Limousines  Please Upload Vehicle Documents In order to get Approved By Admin ! Enjoy With Us.  ',
        'thanks_text' => 'Thanks For Using Moray Limousine',
        'action_text' => 'View My Site',
        'action_url' => 'partner/dashboard',
    ];

    /**
     * @param $id
     * @return array
     */
    public function notifyVehicleAdded($id){
        return  [
            'greeting' => 'A New Vehicle Successfully Added on Moray-Limousines',
            'subject' => 'New Vehicle is Added By a Partner.',
            'body'   => 'A New Vehicle Added on Moray-Limousines Please check the Details of vehicle by visiting the web site',
            'thanks_text' => 'Moray Limousine Site',
            'action_text' => 'View My Site',
            'action_url' => 'admin/vehicle/vehicleDetail/'.$id,
        ];
    }

        protected $notifyDriverMsg = [   'greeting' => 'A New Partner On Moray Limousines Added You As Driver',
        'subject' => 'New Partner Added You As Driver',
        'body'   => 'A New Partner On Moray Limousines Added You As Driver For More Details visit web',
        'thanks_text' => 'Thanks For Using Moray Limousines',
        'action_text' => 'View My Site',
        'action_url' => '/driver/dashboard'];
        protected $adminnotifyDriverMsg = [   'greeting' => 'A New Partner On Moray Limousines Added ',
        'subject' => 'New Driver is Added by Partner',
        'body'   => 'A New Partner On Moray Limousines is Added For More Details visit web',
        'thanks_text' => 'Thanks For Using Moray Limousines',
        'action_text' => 'View My Site',
        'action_url' => '/driver/dashboard'];

}
