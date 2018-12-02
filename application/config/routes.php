<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home/Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
>> admin routes start here
*/
$route['admin']='admin/Welcome';
$route['admin/login']='admin/Welcome/login';
$route['admin/logout']='admin/Welcome/logout';
$route['view-order/(:any)']='admin/Orders/viewOrder/$1';
/*
<< admin routes end here
*/

$route['api/insert_quickenquiry']='home/Welcome/insertQuickEnquiry';
$route['api/signup']='user/Userapi/signup';
$route['api/accountverification']='user/Userapi/verifyaccount';
$route['api/login']='user/Userapi/userLogin';
$route['api/forgotpassword']='user/Userapi/userForgotReq';
$route['api/resetpassword']='user/Userapi/setForgotPassword';
$route['api/updatepassword']='user/Userapi/changePassword';
$route['api/profiledetails']='user/Userapi/profileDetails';
$route['api/updateprofile']='user/Userapi/updateProfile';
$route['api/createaddress']='user/Userapi/createAddress';
$route['api/addresslist']='user/Userapi/userAddressList';
$route['api/addressdetails']='user/Userapi/addressDetails';
$route['api/updateaddress']='user/Userapi/updateAddress';
$route['api/deleteaddress']='user/Userapi/deleteAddress';


$route['products'] = 'home/Welcome/AllproductList';
$route['products/(:any)/(:any)'] = 'home/Welcome/productList';
$route['products/(:any)/(:any)/(:any)'] = 'home/Welcome/productDetails';
$route['catering-details/(:any)/(:any)'] = 'home/Welcome/cateringdescription';
$route['venue-details/(:any)/(:any)'] = 'home/Welcome/venuedescription';
$route['cart'] = 'home/Cart/cart';
$route['checkout']= 'home/Cart/checkout';
$route['sendsms']= 'home/Cart/sendsms';
$route['order-success/(:any)']= 'home/Cart/orderSuccess/$1';
$route['orderverificatoin']= 'home/Cart/orderVerification';
$route['verifyorderverification']='home/Cart/verifyOrderOtp';

/*CMS Module section routes code start */
$route['aboutus']='home/Cms/aboutus';
$route['contactus']='home/Cms/contactus';
$route['testimonials']='home/Cms/testimonials';
$route['terms-condition']='home/Cms/termscondition';
$route['faqs']='home/Cms/faqs';
$route['privacy']='home/Cms/privacy';
$route['payment']='home/Cms/payment';
$route['cancellation']='home/Cms/cancellation';
$route['blog']='home/Cms/blog';
$route['blog-detail']='home/Cms/blogDetail';
$route['faqs']='home/Cms/faqs';
/*CMS Module section routes code end*/

/*Vendor Module section routes code start */
$route['vendor-signup']='home/Vendor/signup';
$route['vendor']='vendor/Welcome/profile';
$route['vendor/dashboard']='vendor/Welcome/profile';
$route['vendor/logout']='vendor/Welcome/logout';
$route['vendor/changepassword']='vendor/Welcome/changepassword';
$route['vendor/ceremonies']='vendor/Catering/ceremoniesList';
$route['vendor/vendorceremonies']='vendor/Catering/vendorCeremoniesList';

//vendor Catering Routes section
$route['vendor/items']='vendor/Catering/itemList';
$route['vendor/vendoritems']='vendor/Catering/vendoritems';
$route['vendor/createmenu']='vendor/Catering/createmenu';
$route['vendor/menulist']='vendor/Catering/menuList';
$route['vendor/bookings']='vendor/Booking';
$route['vendor/transactions']='vendor/Booking/transactions';
//Vendor - Function hall module 
$route['vendor/venues']='vendor/Functionhall/venueList';
$route['vendor/createfunctionhall']='vendor/Functionhall/createFunctionHall';
$route['vendor/venuegallery/(:any)']='vendor/Functionhall/venueGallery';
$route['vendor/specifications']='vendor/Functionhall/specificationsList';
$route['vendor/venuespecifications/(:any)']='vendor/Functionhall/venuespecifications';
$route['vendor/assignedcaterers']='vendor/Functionhall/assingedCaterers';
/*Vendor - Function hall end*/
$route['search/(:any)']='home/Welcome/vendors';
$route['catering/veg']='home/Welcome/searchCateringMenus';
$route['catering/non-veg']='home/Welcome/searchCateringMenus';
$route['catering/all']='home/Welcome/searchCateringMenus';
$route['menu']='home/Welcome/cateringMenus';
$route['menu/nongveg']='home/Welcome/nonVegCateringMenus';
$route['menu/veg']='home/Welcome/vegCateringMenus';
//searchcaterers


/*>> Add to cart section module code start */
$route['itemaddtocart']='home/Cart/itemAddToCart';
$route['deletecartitem']='home/Cart/deletecartitem';
/*>> Add to cart section module code end*/

/*>> User realted module section */
$route['profile']='user/User/achari';
$route['orders']='user/User/myorders';
$route['signout']='user/User/signOut';
/*>> User realted module section end*/


$route['paymentfail']='home/Cart/paymentfail';
$route['paymentsuccess']='home/Cart/paymentsuccess';
