<?php

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

//sites home pages roots

use App\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Vehicle;
use App\VehicleCategory;
use App\VehicleSubtype;

Auth::routes();
Route::get('register/verify', 'Auth\RegisterController@verify')->name('verifyEmailLink');
Route::get('register/verify/resend', 'Auth\RegisterController@showResendVerificationEmailForm')->name('showResendVerificationEmailForm');
Route::post('register/verify/resend', 'Auth\RegisterController@resendVerificationEmail')->name('resendVerificationEmail');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('index');
Route::get('/home/getLocations', 'BookingController@getAllowedCities');
Route::get('/booking-by-hours', 'BookingController@selectClassByHour')->name('select.booking.by.hour');

Route::get('/ariport-transfer', 'HomeController@ariporttransfer');
Route::get('/limousine-service', 'HomeController@limousineservice');
Route::get('home/free-waiting-time', 'HomeController@freewaitingtime');
Route::get('/our-feet', 'HomeController@ourfeet');
Route::get('/about-us', 'HomeController@contantus');
Route::get('/contact-us', 'HomeController@aboutus');
Route::get('/services-rates', 'HomeController@servicesrates');
Route::get('/our-services', 'HomeController@ourServices');
Route::get('service/details/{id}', 'HomeController@serviceDetail');
Route::get('/become-partner', 'PartnerController@becomePartner');
//new work for partner registration
Route::get('/partner-registration', function () {
    $locations = DB::table('locations')->get();
    return view('home.partner-registration', compact('locations'));
});
// Route::get('company-information', function () {
//     $data['category'] = VehicleCategory::all();
//     $documents = Document::orderBy('applied_on', 'asc')->get();
//     $VehicleSubtype = VehicleSubtype::get();
//     return view('home.company-information', compact('data', 'documents', 'VehicleSubtype'));
// });

Route::get('/get-city-vehicle', 'PartnerController@get_city_vehicle')->name('get-city-vehicle');
Route::get('/get-city-document', 'PartnerController@get_city_document')->name('get-city-document');
Route::get('/become-driver', 'DriverController@becomeDriver')->name('driver.becomeDriver');
Route::get('/Faq', 'HomeController@faq');
Route::get('/mpressum', 'HomeController@footerPageOne');
Route::get('/datenschutz', 'HomeController@footerPageTwo');


Route::get('/booking', 'BookingController@selectClassByDistance')->name('get.booking');



Route::group(['middleware' => ['web', 'auth', 'isEmailVerified']], function () {
    Route::get('user/invoice/{id}', 'UserController@getInvoice');
    Route::get('/checknotify', 'BookingController@sendnotify');
    Route::get('/booking/extra-options/{id}', 'BookingController@selectOptions');
    Route::get('/booking/selebooking-detailscted-class/{id}', 'BookingController@selectedClass');
    Route::get('/booking/extra-options-details', 'BookingController@extraOptionsDetails')->name('extra.option.details');
    Route::get('/booking/payment-form', 'BookingController@bookingPayment')->name('booking.payment');
    Route::post('/booking/store-booking', 'BookingController@storeBooking')->name('submit.booking');
    Route::get('/booking/approve/{id}', 'BookingController@bookingApprove');
    Route::get('/booking/disapprove/{id}', 'BookingController@bookingDisapprove');
    Route::post('paypal-transaction-complete', 'BookingController@paypaltransactioncomplete');
    Route::get('booking/thanks-page/{id?}', 'BookingController@thanksPage')->name('thanks.page');
    Route::get('/booking/driver/action/{booking_id}/{status}', 'BookingController@driverAction')->name('booking.driverAction');
    Route::get('/booking/driver/complete-booking/{booking_id}', 'BookingController@completeBooking')->name('booking.completeBooking');
    Route::get('/booking/booking-details', 'BookingController@saveBookingOnSelect')->name('booking.details');
    Route::get('/booking/details/{id}', 'BookingController@bookingDetailsPage');
    Route::get('/booking/complete/{id}', 'BookingController@completeBooking');
    Route::get('/booking/delete/{id}', 'BookingController@bookingDelete');

    Route::group(['middleware' => 'end_user'], function () {


        Route::get('user/build-profile', 'UserController@buildProfile')->name('build-user-profile');
        Route::post('user/store-profile', 'UserController@storeProfile')->name('store-profile');
        Route::get('user/update-profile/{id}', 'UserController@updateProfile')->name('update-user-profile');
        Route::get('user/update-profile/{id}', 'UserController@updateProfile')->name('update-user-profile');
        Route::get('user/dashboard', 'UserController@userReservation')->name('user.dashboard');
        Route::get('user/profile', 'UserController@userProfile')->name('user.profile');
        Route::get('user/reservation', 'UserController@userReservation')->name('user.reservation');
        Route::get('user/cancel-booking/{id}', 'UserController@cancelBooking');
        Route::get('user/extend-booking/{id}', 'UserController@extendBooking');

        Route::get('user/completed-bookings', 'UserController@completedBookings');
        Route::get('user/canceled-bookings', 'UserController@canceledBookings');
        Route::get('user/all-bookings', 'UserController@allBookings');
        Route::get('user/filter-by-date', 'UserController@filterByDate');

        Route::get('user/filter-by-status', 'UserController@filterByStatus');
        Route::get('user/booking-details/{id}', 'UserController@bookingDetail');
        Route::get('user/notifications', 'UserController@userNotifications');
        Route::get('booking/checkout/{id?}', 'BookingController@thanksHome');
        Route::post('user/booking-extend', 'UserController@saveExtendBooking')->name('extend_booking');
        Route::post('user/paypal-transaction-complete', 'UserController@paypaltransactioncomplete');

        Route::get('user/change-password-form', 'UserController@changePasswordForm');
        Route::post('user/change-password', 'UserController@changePassword')->name('user.change.password');
    });


    Route::get('admin/get-categories-title/{id}', 'VehicleSubtypeController@getSubCategories');


    Route::post('/booking/assign', 'BookingController@assignBooking')->name('assignBooking');
    Route::get('/booking/un-assign/{id}', 'BookingController@unAssignBooking')->name('unAssignBooking');
    Route::get('/booking-assign-to-form', 'BookingController@assignToForm')->name('booking.assignToForm');
    Route::get('/admin/get-all-bookings', 'BookingController@allBookings');
    Route::get('/admin/get-pending-bookings', 'BookingController@pendingBookings');
    Route::get('/admin/get-assigned-bookings', 'BookingController@assignedBookings');
    Route::get('/admin/get-canceled-bookings', 'BookingController@canceledBookings');
    Route::get('/admin/get-completed-bookings', 'BookingController@completedBookings');
    Route::get('/admin/get-approved-bookings', 'BookingController@approvedBookings');
    Route::get('/admin/get-paid-bookings', 'BookingController@paidBookings');
    Route::get('/admin/booking_by_id/{id}', 'BookingController@searchedIdBooking');
    Route::get('/admin/booking_by_date', 'BookingController@searchBookingByDate');

    Route::get('/admin/services-cms', 'CMSController@addServices');
    Route::get('/admin/services-list', 'CMSController@servicesList')->name('service.list');
    Route::post('/admin/store-services', 'CMSController@storeServices')->name('store.services');
    Route::get('/admin/service-edit/{id}', 'CMSController@editService');
    Route::get('/admin/service-delete/{id}', 'CMSController@deleteService');
    Route::post('/admin/update-services', 'CMSController@updateService')->name('update.services');
    //        CMS home page
    Route::get('admin/manage-home-page', 'CMSController@manageHomePage')->name('manageHomePage');
    Route::post('admin/update-home-pageCMS', 'CMSController@updateHomePageCMS')->name('updateHomePageCMS');


    Route::get('/admin/faq-cms', 'CMSController@addFaqs');
    Route::get('/admin/faq-list', 'CMSController@faqsList')->name('faq.list');
    Route::get('/admin/faq-edit/{id}', 'CMSController@editFaq');
    Route::get('/admin/faq-delete/{id}', 'CMSController@deleteFaq');
    Route::post('/admin/store-faq', 'CMSController@storeFaq')->name('store.faq');
    Route::post('/admin/update-faq', 'CMSController@updateFaq')->name('update.faq');


    Route::get('user/logout-user', 'HomeController@userLogout');



    // contact us from clients messages
    Route::post('home/contact-us-store', 'HomeController@contact_us_store')->name('contact.us');

    //Booking roots
    Route::get('admin/booking', 'Admin\booking@index');
    Route::get('admin/booking-options', 'Admin\booking@bookingoptions');
    Route::get('admin/booking-login', 'Admin\booking@bookinglogin');
    Route::get('admin/booking-creaditcard', 'Admin\booking@bookingcreaditcard');
    Route::get('admin/booking-checkout', 'Admin\booking@bookingcheckout');

    // Admin Routes




    Route::group(['middleware' => 'auth'], function () {

        Route::get('vehicle/vehicleDetail/{id}', 'Admin\VehicleController@vehicleDetails');
        Route::get('admin/approveVehicle/{id}', 'Admin\VehicleController@approveVehicle');
        Route::get('admin/disapproveVehicle/{id}', 'Admin\VehicleController@disapproveVehicle');
        Route::get('admin/deleteVehicle/{id}', 'Admin\VehicleController@deleteVehicle');

        Route::get('vehicle/all-vehicles', 'Admin\VehicleController@allVehicles');
        Route::get('vehicle/pending-vehicles', 'Admin\VehicleController@pendingVehicles');
        Route::get('vehicle/approved-vehicles', 'Admin\VehicleController@approvedVehicles');
        Route::get('vehicle/disapproved-vehicles', 'Admin\VehicleController@disapprovedVehicles');
        Route::get('vehicle/blocked-vehicles', 'Admin\VehicleController@blockedVehicles');


        Route::post('vehicle/save-documents', 'Admin\VehicleController@storeDocuments')->name('vehicle.store.docs');
        Route::get('vehicle/manage-documents', 'Admin\VehicleController@manageDocs')->name('vehicle.manage.docs');
        Route::get('vehicle/delete-docs/{id}', 'Admin\VehicleController@deleteDocument');

        Route::group(['middleware' => 'partner'], function () {
            Route::get('partner/profile', 'PartnerController@profileView')->name('partner.profile');
            Route::get('partner/add-new-vehicle', 'PartnerController@addNewVehicle');
            Route::get('partner/update-vehicle/{id}', 'PartnerController@updateVehicle');
            Route::get('partner/vehicles-list', 'PartnerController@vehiclesList')->name('partner.vehicle.list');
            Route::post('partner/save-vehicle', 'PartnerController@saveVehicle')->name('partner.saveVehicle');
            Route::get('partner/profile', 'PartnerController@profileView')->name('partner.profile');
            Route::get('partner/dashboard', 'PartnerController@partnerReservations');
            Route::get('partner/reservations', 'PartnerController@partnerReservations');
            Route::get('partner/completed-bookings', 'PartnerController@partnerCompletedBookings');
            Route::get('partner/canceled-bookings', 'PartnerController@partnerCanceledBookings');
            Route::get('partner/pending-bookings', 'PartnerController@partnerPendingBookings');
            Route::get('partner/all-bookings', 'PartnerController@partnerAllBookings');
            Route::get('partner/bookings-by-date', 'PartnerController@bookingsByDate');
            Route::get('partner/build-profile', 'PartnerController@buildProfile');
            Route::get('partner/notifications', 'PartnerController@partnerNotifications');
            Route::get('partner/add-new-driver', 'PartnerController@addNewDriver')->name('partner.driver.list');
            Route::get('partner/approve-driver', 'PartnerController@approveDriver');
            Route::get('partner/disapprove-driver', 'PartnerController@disapproveDriver');
            Route::get('partner/driver-details/{id}', 'PartnerController@driverDetails');
            Route::get('partner/block-driver', 'PartnerController@blockDriver');
            Route::post('partner/save-new-driver', 'PartnerController@saveNewDriver')->name('partner.save.driver');
            Route::post('partner/store-profile', 'PartnerController@storePartner')->name('store-partner');
            Route::get('partner/update-profile/{id}', 'PartnerController@updateProfile')->name('update-partner-profile');
            Route::post('partner/change-password', 'PartnerController@changePassword')->name('partner.change.password');
            Route::get('partner/change-password-form', 'PartnerController@changePasswordForm')->name('partner.edit.password');
            Route::get('partner/manage-documents', 'PartnerController@uploadDocuments');
            Route::post('partner/store-documents', 'PartnerController@storeDocuments')->name('store.documents');
            Route::get('partner/delete-document/{id}', 'PartnerController@deleteDocument');
            Route::get('partner/search-driver', 'PartnerController@addDriver');
            Route::get('partner/add-new-driver/{id}', 'PartnerController@addNewDriverByEmail');
            Route::post('partner/store-vehicle-docs', 'PartnerController@storeVehicleDocs')->name('partner.vehicle.docs');
            Route::get('info/company', function () {
                return view('information.company');
            });
            Route::get('info/driver', function () {
                $driver = User::where(['user_type' => 'driver', 'creator_id' => Auth::user()->id])->first();
                return view('information.driver', compact('driver'));
            });
            Route::get('info/vehicle', function () {
                $vehicle = Vehicle::where(['creator_id' => Auth::user()->id])->first();
                $data['category'] = VehicleCategory::all();
                $VehicleSubtype = VehicleSubtype::get();
                return view('information.vehicle', compact('vehicle', 'data', 'VehicleSubtype'));
            });
            Route::get('info/payment', function () {
                return view('information.payment');
            });
            Route::get('info/documents', 'PartnerController@info_documents')->name('info-documents');
            Route::get('info/session', 'PartnerController@info_session')->name('info-session');
            Route::get('info/upload', 'PartnerController@info_upload')->name('info-upload');
            Route::post('info/upload-document', 'PartnerController@info_upload_document')->name('info-upload-document');
            Route::post('/save-company', 'PartnerController@save_company')->name('save-company');
            Route::post('/save-driver', 'PartnerController@save_driver')->name('save-driver');
            Route::post('/save-vehicle', 'PartnerController@save_vehicle')->name('save-vehicle');
            Route::post('/save-payment', 'PartnerController@save_payment')->name('save-payment');
            // Route::post('/save-company-info', 'PartnerController@save_company_info')->name('save-company-info');
        });
        Route::group(['middleware' => 'driver'], function () {

            Route::get('driver/login', 'AdminController@login')->name('driver.login');

            Route::get('driver/profile', 'DriverController@driverProfile')->name('driver.profile');
            Route::post('driver/build-profile/{id?}', 'DriverController@storeDriverProfile')->name('build-profile');
            Route::get('driver/profile-view', 'DriverController@profileView')->name('profile-view');
            Route::get('driver/update-profile/{id}', 'DriverController@updateProfile')->name('update-profile');
            Route::get('driver/dashboard', 'DriverController@reservations')->name('driver.dashboard');
            Route::get('driver/add-new-vehicle', 'DriverController@addNewVehicle');
            Route::post('driver/save-new-vehicle', 'DriverController@saveNewVehicle')->name('driver.saveVehicle');
            Route::get('driver/update-vehicle/{id}', 'DriverController@updateVehicle');
            Route::get('driver/vehicles-list', 'DriverController@vehiclesList');
            Route::get('driver/notifications', 'DriverController@driverNotifications');
            Route::get('driver/reservations', 'DriverController@reservations')->name('driver.reservations');
            Route::get('driver/reservation/detail/{id}', 'DriverController@reservationDetail')->name('driver.reservation.detail');

            Route::get('driver/upload-docs', 'DriverController@uploadDocuments')->name('driver.upload.documents');
            Route::post('driver/store-docs', 'DriverController@storeDocuments')->name('driver.store.documents');
            Route::get('driver/delete-docs/{id}', 'DriverController@deleteDocument');

            Route::post('driver/manage-docs', 'DriverController@storeVehicleDocs')->name('driver.vehicle.docs');
            Route::get('driver/change-password-form', 'DriverController@changePasswordForm');
            Route::post('driver/change-password', 'DriverController@changePassword')->name('driver.change.password');
            Route::get('driver/my-partners', 'DriverController@myPartners');
        });
    });

    // booking

    Route::group(['middleware' => 'admin'], function () {

        Route::get('driver/pending-drivers', 'DriverController@pendingDrivers');
        Route::get('driver/approved-drivers', 'DriverController@approvedDrivers');
        Route::get('driver/disapproved-drivers', 'DriverController@disapprovedDrivers');
        Route::get('driver/blocked-drivers', 'DriverController@blockedDrivers');
        Route::get('driver/all-drivers', 'DriverController@allDrivers');
        Route::get('/booking/pay-out/{id}', 'Admin\AdminController@payOut');
        Route::get('admin/home', 'Admin\AdminController@home')->name('admin.home');
        // Vehicle Type
        Route::get('admin/vehicleType', 'Admin\VehicleTypeController@index')->name('admin.vehicleType');
        Route::get('admin/vehicleType/add', 'Admin\VehicleTypeController@add')->name('admin.vehicleType.add');
        Route::post('admin/vehicleType/save', 'Admin\VehicleTypeController@save')->name('admin.vehicleType.save');
        Route::get('admin/vehicleType/edit/{id}', 'Admin\VehicleTypeController@edit')->name('admin.vehicleType.edit');
        Route::post('admin/vehicleType/update', 'Admin\VehicleTypeController@update')->name('admin.vehicleType.update');
        Route::get('admin/vehicleType/delete/{id}', 'Admin\VehicleTypeController@delete')->name('admin.vehicleType.delete');

        // Vehicle Make
        Route::get('admin/vehicleMake', 'Admin\VehicleMakeController@index')->name('admin.vehicleMake');
        Route::get('admin/vehicleMake/add', 'Admin\VehicleMakeController@add')->name('admin.vehicleMake.add');
        Route::post('admin/vehicleMake/save', 'Admin\VehicleMakeController@save')->name('admin.vehicleMake.save');
        Route::get('admin/vehicleMake/edit/{id}', 'Admin\VehicleMakeController@edit')->name('admin.vehicleMake.edit');
        Route::post('admin/vehicleMake/update', 'Admin\VehicleMakeController@update')->name('admin.vehicleMake.update');
        Route::get('admin/vehicleMake/delete/{id}', 'Admin\VehicleMakeController@delete')->name('admin.vehicleMake.delete');
        // Vehicle Model
        Route::get('admin/vehicleModel', 'Admin\VehicleModelController@index')->name('admin.vehicleModel');
        Route::get('admin/vehicleModel/add', 'Admin\VehicleModelController@add')->name('admin.vehicleModel.add');
        Route::post('admin/vehicleModel/save', 'Admin\VehicleModelController@save')->name('admin.vehicleModel.save');
        Route::get('admin/vehicleModel/edit/{id}', 'Admin\VehicleModelController@edit')->name('admin.vehicleModel.edit');
        Route::post('admin/vehicleModel/update', 'Admin\VehicleModelController@update')->name('admin.vehicleModel.update');
        Route::get('admin/vehicleModel/delete/{id}', 'Admin\VehicleModelController@delete')->name('admin.vehicleModel.delete');
        // Vehicle Category
        Route::get('admin/vehicleCategory', 'Admin\VehicleCategoryController@index')->name('admin.vehicleCategory');
        Route::get('admin/add-category', 'Admin\VehicleCategoryController@addCategoty')->name('add.category');
        Route::post('admin/save-new-category', 'Admin\VehicleCategoryController@saveNewCategory')->name('save.category');
        Route::get('admin/delete-category/{id}', 'Admin\VehicleCategoryController@categoryDelete');
        Route::get('admin/vehicleCategory/add', 'Admin\VehicleCategoryController@add')->name('admin.vehicleCategory.add');
        Route::post('admin/vehicleCategory/save', 'Admin\VehicleCategoryController@save')->name('admin.vehicleCategory.save');
        Route::get('admin/vehicleCategory/edit/{id}', 'Admin\VehicleCategoryController@edit')->name('admin.vehicleCategory.edit');
        Route::post('admin/vehicleCategory/update', 'Admin\VehicleCategoryController@update')->name('admin.vehicleCategory.update');
        Route::get('admin/vehicleCategory/delete/{id}', 'Admin\VehicleCategoryController@delete')->name('admin.vehicleCategory.delete');
        Route::get('admin/vehicleCategory/update/{id}', 'Admin\VehicleCategoryController@updateCategory');
        // Pricing By Location
        Route::get('admin/pricingByLocation', 'Admin\PricingByLocationController@index')->name('admin.pricingByLocation');
        Route::get('admin/pricingByLocation/add', 'Admin\PricingByLocationController@add')->name('admin.pricingByLocation.add');
        Route::post('admin/pricingByLocation/save', 'Admin\PricingByLocationController@save')->name('admin.pricingByLocation.save');
        Route::get('admin/pricingByLocation/edit/{id}', 'Admin\PricingByLocationController@edit')->name('admin.pricingByLocation.edit');
        Route::post('admin/pricingByLocation/update', 'Admin\PricingByLocationController@update')->name('admin.pricingByLocation.update');
        Route::get('admin/pricingByLocation/delete/{id}', 'Admin\PricingByLocationController@delete')->name('admin.pricingByLocation.delete');
        // Pricing By Distance
        Route::get('admin/pricingByDistance', 'Admin\PricingByDistanceController@index')->name('admin.pricingByDistance');
        Route::get('admin/pricingByDistance/add', 'Admin\PricingByDistanceController@add')->name('admin.pricingByDistance.add');
        Route::post('admin/pricingByDistance/save', 'Admin\PricingByDistanceController@save')->name('admin.pricingByDistance.save');
        Route::get('admin/pricingByDistance/edit/{id}', 'Admin\PricingByDistanceController@edit')->name('admin.pricingByDistance.edit');
        Route::post('admin/pricingByDistance/update', 'Admin\PricingByDistanceController@update')->name('admin.pricingByDistance.update');
        Route::get('admin/pricingByDistance/delete/{id}', 'Admin\PricingByDistanceController@delete')->name('admin.pricingByDistance.delete');
        // Vehicle Pricing
        Route::get('admin/vehiclePricing', 'Admin\VehiclePricingController@index')->name('admin.vehiclePricing');
        Route::get('admin/vehiclePricing/add/{id}', 'Admin\VehiclePricingController@addPricing')->name('admin.vehiclePricing.add');
        Route::post('admin/vehiclePricing/save', 'Admin\VehiclePricingController@savePricing')->name('admin.vehiclePricing.save');
        Route::get('admin/vehiclePricing/edit/{id}', 'Admin\VehiclePricingController@editPricing')->name('admin.vehiclePricing.edit');
        Route::get('admin/vehiclePricing/detail/{id}', 'Admin\VehiclePricingController@detailPricing')->name('admin.vehiclePricing.detail');
        Route::post('admin/vehiclePricing/update', 'Admin\VehiclePricingController@update')->name('admin.vehiclePricing.update');
        Route::get('admin/vehiclePricing/delete/{id}', 'Admin\VehiclePricingController@delete')->name('admin.vehiclePricing.delete');
        Route::get('admin/vehiclePricing/details/{id}', 'Admin\VehiclePricingController@pricingDetails');
        Route::get('admin/vehiclePricing/price-fields', 'Admin\VehiclePricingController@priceFields')->name('admin.vehiclePricing.priceFields');

        //vehicle subtype
        Route::get('admin/vehicle-subtype/list', 'VehicleSubtypeController@list')->name('admin.vehicleSubtype.list');
        Route::post('admin/vehicle-subtype/add', 'VehicleSubtypeController@add')->name('admin.vehicleSubtype.add');
        Route::get('admin/vehicle-subtype/delete/{id}', 'VehicleSubtypeController@delete')->name('admin.vehicleSubtype.delete');
        Route::post('admin/vehicle-subtype/edit/{id}', 'VehicleSubtypeController@edit')->name('admin.vehicleSubtype.edit');


        // Vehicle Listing
        Route::get('admin/add-vehicle', 'Admin\VehicleController@addVehicle');
        Route::get('admin/vehicle-list', 'Admin\VehicleController@vehicleList');
        Route::post('admin/vehicle-save', 'Admin\VehicleController@saveVehicle')->name('vehicle.save');
        Route::get('admin/editVehicle/{id}', 'Admin\VehicleController@editVehicle');
        Route::post('admin/updateVehicle', 'Admin\VehicleController@update');
        Route::get('admin/update-vehicle/{id}', 'Admin\VehicleController@updateVehicle');
        Route::get('admin/home', 'Admin\AdminController@home')->name('admin.home');
        Route::post('admin/send-email', 'Admin\AdminController@sendEmailToUser')->name('admin.send.notification');
        Route::post('admin/drivers-notify', 'Admin\AdminController@notifyDriver')->name('driver.send.notification');
        Route::get('admin/all-driver-list', 'Admin\AdminController@allDriverList');
        Route::get('admin/admin-drivers-list', 'Admin\AdminController@adminDrivers');
        Route::get('admin/drivers-list', 'Admin\AdminController@registeredDrivers');
        Route::get('admin/change-status', 'Admin\AdminController@changeStatus');
        Route::get('admin/disapprove-status', 'Admin\AdminController@disapproveStatus');
        Route::get('admin/block-status', 'Admin\AdminController@blockStatus');
        Route::post('admin/register-driver', 'Admin\AdminController@registerDriver')->name('admin.registerDriver');
        Route::post('admin/register-partner', 'Admin\AdminController@registerPartner')->name('admin.registerPartner');
        Route::get('admin/menage-drivers', 'Admin\AdminController@menageDrivers')->name('drivers.list');
        Route::get('admin/menage-partners', 'Admin\AdminController@partnersList')->name('partners.list');
        Route::get('admin/partner-details/{id}', 'UserController@PartnerDetails');
        Route::get('admin/approve-partner/{id}', 'Admin\AdminController@approvePartner');
        Route::get('admin/disapprove-partner/{id}', 'Admin\AdminController@disapprovePartner');
        Route::get('admin/delete-partner/{id}', 'Admin\AdminController@deletePartner');
        Route::get('admin/block-partner/{id}', 'Admin\AdminController@blockPartner');
        Route::get('admin/driver-details/{id}', 'Admin\AdminController@driverDetails')->name('admin.driverDetail');
        Route::get('admin/manage-bookings', 'Admin\AdminController@manageBookings')->name('manage.bookings');
        Route::get('admin/payout-bookings', 'BookingController@payOutBookings')->name('manage.bookings');
        Route::get('admin/index', 'Admin\AdminController@manageBookings')->name('admin.index');

        Route::get('admin/notifications', 'Admin\AdminController@adminNotifications')->name('admin.notifications');

        Route::get('admin/vehicle/vehicleDetail/{id}', 'Admin\AdminController@vehicleDetails');

        Route::get('admin/manage-discount', 'Admin\AdminController@manageDiscounts')->name('discount.list');
        Route::post('admin/save-discount', 'DiscountController@saveDiscount')->name('save.discount');
        Route::get('admin/edit-discount/{id}', 'DiscountController@editDiscount');
        Route::get('admin/discount-disactive/{id}', 'DiscountController@discountDisActive');
        Route::get('admin/discount-active/{id}', 'DiscountController@discountActive');
        Route::get('admin/discount-delete/{id}', 'DiscountController@discountDelete');
        //        Documents Routes
        Route::get('admin/add-documents', 'DocumentsController@addDocuments');
        Route::get('admin/document-delete/{id}', 'DocumentsController@deleteDocument');
        Route::get('admin/edit-document/{id}', 'DocumentsController@editDocument');
        Route::post('admin/save-documents', 'DocumentsController@saveDocuments')->name('admin.documents.save');

        Route::get('admin/approve-doc/{id}', 'UploadedDocumentController@approveDocument');
        Route::get('admin/disapprove-doc/{id}', 'UploadedDocumentController@disapproveDocument');

        //          Manage Locations Routes
        Route::get('admin/add-locations', 'LocationController@addLocations');
        Route::get('admin/delete-location/{id}', 'LocationController@deleteLocation');
        Route::get('admin/edit-location/{id}', 'LocationController@editLocation');
        Route::get('admin/make-top-city/{id}', 'LocationController@makeTopCity');
        Route::get('admin/remove-top-city/{id}', 'LocationController@removeTopCity');
        Route::post('admin/save-location', 'LocationController@saveLocation')->name('admin.save.location');

        //        Manage tax
        Route::post('admin/change-tax', 'Admin\AdminController@changeTax')->name('changeTax');

        Route::get('admin/add-extra-options', 'Admin\AdminController@addOptions')->name('add.extra.options');
        Route::post('admin/save-option', 'Admin\AdminController@saveOption')->name('save.option');
        Route::get('admin/option/update/{id}', 'Admin\AdminController@optionUpdate');
        Route::get('admin/option/details/{id}', 'Admin\AdminController@optionDetails');
        Route::get('admin/option/delete/{id}', 'Admin\AdminController@optionDelete');

        Route::get('admin/happy-clients', 'Admin\AdminController@happyClients');
        Route::post('admin/create-clients', 'Admin\AdminController@createClient')->name('save.client');
        Route::get('admin/delete-client/{id}', 'Admin\AdminController@deleteClient');

        Route::get('admin/all-partners', 'PartnerController@allPartners');
        Route::get('admin/pending-partners', 'PartnerController@pendingPartners');
        Route::get('admin/approved-partners', 'PartnerController@approvedPartners');
        Route::get('admin/disapproved-partners', 'PartnerController@disapprovedPartners');
        Route::get('admin/blocked-partners', 'PartnerController@blockedPartners');
        Route::get('admin/search-partners', 'PartnerController@searchByEmail');

        Route::get('admin/web-configuration', 'Admin\AdminController@configuration');
        Route::post('admin/save-configuration', 'Admin\AdminController@saveConfiguration')->name('save.configuration');

        // inquiries
        Route::get('admin/inquiries', 'Admin\AdminController@inquiries');
        Route::get('admin/inquiries/detail/{id}', 'Admin\AdminController@inquiryDetail');
        Route::delete('admin/delete/inquiry/{id}', 'Admin\AdminController@inquiryDelete')->name('delete.inquiry');
        Route::get('admin/change-password', 'Admin\AdminController@changePasswordForm')->name('admin.change.password');
        Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

        //partner registration requirements
        Route::get('/partner-registration-req', 'Admin\AdminController@partner_req')->name('partner-req');
        Route::post('/partner-reg-req-save', 'Admin\AdminController@partner_req_save');
        Route::post('/partner-reg-req-update', 'Admin\AdminController@partner_req_update');
        Route::post('/partner-reg-req-delete', 'Admin\AdminController@partner_req_delete');
    });
});
