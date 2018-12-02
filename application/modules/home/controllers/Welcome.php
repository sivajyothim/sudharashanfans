<?php 
defined('BASEPATH') or die('Some thing error occured');

class Welcome extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['HomeModel'=>'home','ProductModel'=>'product','CartModel'=>'cart']);
        $this->data=[];$params=[];
        $params['cart_session']=$this->session->userdata('cartsession');
         $this->data['product_menu_details']=$this->product->all_fanTypeList();
          $this->data['cartList'] = $this->cart->cartList($params);
          $this->data['cartStatistics'] = $this->cart->cartStatistics($params);
    }
    
    public function index()
    {
        $this->data['product_list']=$this->product->productList();
        $this->data['product_menu_details']=$this->product->all_fanTypeList();
        $this->load->view('home',$this->data);
    }
    public function AllproductList()
    {
        $this->data['catName']="ceiling fans";
        $this->data['product_list']=$this->product->productListByid(1);
        
        $this->load->view('product-list',$this->data);
    }
    public function productList()
    {
        $this->data['catName']=$this->uri->segment(2);
        $catid=$this->uri->segment(3);
        $this->data['product_list']=$this->product->productListByid($catid);
        
        $this->load->view('product-list',$this->data);
    }
    public function productDetails()
    {
        $productid=$this->uri->segment(4);
        $this->data['product_details']=$this->product->productDetails($productid);
        $this->data['related_products']=$this->product->realtedProducts($productid);
        $this->load->view('product-detail',$this->data);

    }
    public function homesearch()
    {
        $params=[];
        //print_r($_POST);exit;
        $module_name = $this->input->post('category');
        $search_keyword = $this->input->post('keyword');
        $params['search_module']=strtolower($module_name);
        $params['search_keyword']=fetch_ucfirst($search_keyword);
        $this->session->set_userdata($params);
        //print_r($params);exit;
        redirect(base_url().'search/'.$module_name);
    }

    public function vendors()
    {   
        $this->data['cateting_details']=json_encode([CODE=>FAIL_CODE]);
        $this->data['functionhall_details']=json_encode([CODE=>FAIL_CODE]);
        $params=[];
        $module=strtolower($this->session->userdata('search_module'));
        $keyword=strtolower($this->session->userdata('search_keyword'));
        $params['search_module']=$module;
        $params['search_keyword']=$keyword;
        if($module=='catering' || $module=='all')
        {
            $this->data['cateting_details']=$this->catering->cateringList($params);
        }
        if($module=='functionhall' || $module=='all')
        {
            $this->data['functionhall_details']=$this->catering->functionHallList($params);
        }
        //print_r( $this->data['functionhall_details']);exit;
        $this->load->view('vendor-listing/vendor_listing',$this->data);
    }

    public function cateringdescription()
    {   
        $vendor_id = $this->uri->segment(3);
        $params=[];
        $params['vendor_id']=$vendor_id;
        $this->data['breadcrumb_title']=$this->uri->segment(2);
        $this->data['cateting_details']=$this->catering->cateringVendorDetails($params);
        $this->data['menu_details']=$this->catering->vendorRelatedMenuList($params);
        $this->load->view('catering/catering_description',$this->data);
    }

    public function venuedescription()
    {   
        $venue_id = $this->uri->segment(3);
        $params=[];
        $params['venue_id']=$venue_id;
        $this->data['breadcrumb_title']=$this->uri->segment(2);
        $this->data['venue_details']=$this->catering->singleVenueDetails($params);
        $this->data['related_venues']=$this->catering->relatedVenues($params);
        $this->data['venue_gallery_details']=$this->catering->venueGallery($params);
        $this->data['venue_specifications']=$this->catering->venueSpecificationList($params);
        $this->load->view('venue/venue_description',$this->data);
    }

    public function insertQuickEnquiry()
    {  
        $response = array();    
        $error_message = ''; $error=0;
        $req_input = file_get_contents('php://input');
        if (!isJson($req_input)) 
        {
            $response[CODE]=VALIDATION_CODE;
            $response[MESSAGE]='Validation';
            $response[DESCRIPTION]='Input data should be in JSON format only';
        }
        else
        {
            $req_response = json_decode($req_input);
            $q_username = (isset($req_response->q_username)) ? input_data($req_response->q_username) : '';
            $q_useremail = (isset($req_response->q_useremail)) ? input_data($req_response->q_useremail) : '';
            $q_usermobile = (isset($req_response->q_usermobile)) ? input_data($req_response->q_usermobile) : '';
            $q_message = (isset($req_response->q_message)) ? input_data($req_response->q_message) : '';
            
            /*Validatio Section */
            
            if ($q_username == '') {$error_message.='user name is missing ,'; $error = 1;}
            if ($q_usermobile == '') {$error_message.='mobile is missing ,'; $error = 1;}
            if ($q_useremail == '') {$error_message.='email is missing ,'; $error = 1;}
            if ($q_message == '') {$error_message.='message is missing ,'; $error = 1;}
            
            if(!mobile_check($q_usermobile)){$error_message.='invalid mobile number ,'; $error = 1;}
            if(!email_check($q_useremail)){$error_message.='invalid email id ,'; $error = 1;}
            /*Validation Section ends here*/
            if($error==1)
            {
                $response[CODE] = VALIDATION_CODE;
                $response[MESSAGE] = 'Validation';
                $response[DESCRIPTION] =rtrim($error_message,',');
            }
            else
            {
               //No errors we can proceeed
               $reqData=[
                            'user_name'=>$q_username,
                            'user_email'=>$q_useremail,
                            'user_mobile'=>$q_usermobile,
                            'message'=>$q_message,
                            'created_on'=>DATE,
                        ];
               $insertdata=  $this->home->insertQuickEnquiry($reqData);
               echo $insertdata;exit;
               
            }
        }
        echo json_encode($response);
    }

    //listing the our specilals
    public function ourspecialsList()
    {
        $our_res = $this->home->ourSpecialList();
        echo $our_res;
    }
    
    
    public function searchCateringMenus()
    {   
        $this->data['catering_details']=json_encode([CODE=>FAIL_CODE]);
        $this->data['functionhall_details']=json_encode([CODE=>FAIL_CODE]);
        $params=[];
        $module=strtolower($this->session->userdata('search_module'));
        $keyword=strtolower($this->session->userdata('search_keyword'));
        $params['search_module']=$module;
        $params['search_keyword']=$keyword;
        $this->data['cateting_details']=$this->catering->cateringList($params);
        $this->load->view('vendor-listing/vendor_listing',$this->data);
    }
    
    //Menus 
    public function cateringMenus()
    {   
        $params=[];
        $params['veg_type']='';
        $this->data['veg_type']='';
        $this->data['menu_details']=$this->catering->cateringMenuList($params);
        $this->load->view('catering/catering_menu_list',$this->data);
    }
    //Not Veg catering Menus
    public function nonVegCateringMenus()
    {   
        $params=[];
        $params['veg_type']='nonveg';
        $this->data['veg_type']='Non-veg';
        $this->data['redirect_link']=base_url().'menu/nonveg';
        $this->data['menu_details']=$this->catering->cateringMenuList($params);
        $this->load->view('catering/catering_menu_list',$this->data);
    }
    //Veg catering Menus
    public function vegCateringMenus()
    {   
        $params=[];
        $params['veg_type']='veg';
        $this->data['veg_type']='Veg';
        $this->data['redirect_link']=base_url().'menu/veg';
        $this->data['menu_details']=$this->catering->cateringMenuList($params);
        $this->load->view('catering/catering_menu_list',$this->data);
    }
    
    

}