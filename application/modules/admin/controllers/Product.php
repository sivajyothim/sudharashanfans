<?php

defined('BASEPATH') or die('Some thing error occured');

class Product extends CI_Controller {

    public $product_folder, $data, $adminid;

    public function __construct() {
        parent::__construct();
        $this->product_folder = 'product/';
        $this->adminid = $this->session->userdata(ADMIN_SESS_CODE . 'adminid');
        $this->data = array();
        $this->load->model(array('Product_model' => 'product'));
    }

    /* >> Fan Type Module section code start */

    public function fantype() {
        $this->data['main_title'] = "Manage Fan Type";
        $this->data['form_details'] = [
            'form_id' => 'fantype_form',
            'title_placeholder' => 'Fan Type Title',
            'title_code_placeholder' => 'Fan Type Code',
            'redirection_link' => ADMIN_LINK . 'product/fantype',
        ];
        $this->data['fantype_details'] = $this->product->all_fanTypeList();
//          echo $this->data['fantype_details'];exit;
        $this->load->view($this->product_folder . "fantype/view_fantype", $this->data);
    }

    public function insertFanType() {
        $response = array();
        // print_r($_POST);exit;

        $table_sno = $this->input->post('table_sno');
        $title = $this->input->post('title');
        $title_code = $this->input->post('title_code');
        $error = 0;
        $error_msg = '';

        if (!is_array($title)) {
            $error = 1;
            $error_msg .= 'Title are missing,';
        }
        if (!is_array($title_code)) {
            $error = 1;
            $error_msg .= 'Title Codes  missing,';
        }
        if ($error == 1) {
            $error_msg = rtrim($error_msg, ',');
            $response[CODE] = VALIDATION_CODE;
            $response[MESSAGE] = 'Validation';
            $response[DESCRIPTION] = $error_msg;
        } elseif ($error == 0) {
            $table_count = count($table_sno);
            $bulkData = [
                'created_by' => $this->adminid,
                'total_count' => $table_count,
                'title' => $title,
                'title_code' => $title_code,
            ];
            $insert = $this->product->insertBulkFanType($bulkData);
            echo $insert;
            exit;
        }
        echo json_encode($response);
    }

    /* >> fan Type Module section code end */

    public function allfans() {
        isAdminLogin();
        $this->data['main_title'] = "List of All Fans";
        $this->data['form_details'] = [
            'form_id' => 'fantype_form',
            'title_placeholder' => 'Fan Type Title',
            'title_code_placeholder' => 'Fan Type Code',
            'redirection_link' => ADMIN_LINK . 'product/allfans',
        ];
        $this->data['fantype_details'] = $this->product->all_fanTypeList();
        $this->data['product_list'] = $this->product->productList();
        $this->data['colors_list'] = $this->product->colorList();
        $this->load->view($this->product_folder . "fans/view_fans", $this->data);
    }
    public function sideimages($productId)
    {
        echo $this->product->sideImagesList($productId);
    }
    

    public function insertFan() {

        $response = array();
        $error_message = '';
        $error = 0;
        $req_input = file_get_contents('php://input');
//        print_r($req_input).exit;
        if (!isJson($req_input)) {
            $response[CODE] = VALIDATION_CODE;
            $response[MESSAGE] = 'Validation';
            $response[DESCRIPTION] = 'Input data should be in JSON format only';
        } else {
            $req_response = json_decode($req_input);
            $fan_type = (isset($req_response->fan_type)) ? input_data($req_response->fan_type) : '';
            $product_title = (isset($req_response->product_title)) ? input_data($req_response->product_title) : '';
            $remote_check = (isset($req_response->remote_check)) ? input_data($req_response->remote_check) : '';
            $mrp = (isset($req_response->mrp)) ? input_data($req_response->mrp) : '';
            $selling_price = (isset($req_response->selling_price)) ? input_data($req_response->selling_price) : '';
            $discount = (isset($req_response->discount)) ? input_data($req_response->discount) : '';
            $color = (isset($req_response->color)) ? $req_response->color : '';
            if($color!='')
            {
                $color = (is_array($color)) ?$color : [$color];    
            }
            $default_color = (isset($req_response->default_color)) ? $req_response->default_color : '';
            $wattage = (isset($req_response->wattage)) ? input_data($req_response->wattage) : '';
            $air_delivery = (isset($req_response->air_delivery)) ? input_data($req_response->air_delivery) : '';
            $rpm = (isset($req_response->rpm)) ? input_data($req_response->rpm) : '';
            $sweep = (isset($req_response->sweep)) ? input_data($req_response->sweep) : '';
            $service_value = (isset($req_response->service_value)) ? input_data($req_response->service_value) : '';
            $phase = (isset($req_response->phase)) ? input_data($req_response->phase) : '';
            $frequency = (isset($req_response->frequency)) ? input_data($req_response->frequency) : '';
            $no_of_blades = (isset($req_response->no_of_blades)) ? input_data($req_response->no_of_blades) : '';
            $body_type = (isset($req_response->body_type)) ? input_data($req_response->body_type) : '';
            $seller_rating = (isset($req_response->seller_rating)) ? input_data($req_response->seller_rating) : '';
            $bearings = (isset($req_response->bearings)) ? input_data($req_response->bearings) : '';
            $warrenty = (isset($req_response->warrenty)) ? input_data($req_response->warrenty) : '';
            $winding = (isset($req_response->winding)) ? input_data($req_response->winding) : '';
            $description = (isset($req_response->description)) ? input_data($req_response->description) : '';
            $app = (isset($req_response->app)) ? input_data($req_response->app) : '';

            /* Validation Section */

            if ($fan_type == '') {$error_message.='fan type  is missing ,'; $error = 1;}
            if ($product_title == '') {$error_message.='product title  is missing ,'; $error = 1;}
            if ($remote_check == '') {$error_message.='remote check  is missing ,'; $error = 1;}
            if ($mrp == '') {$error_message.='mrp  is missing ,'; $error = 1;}
            if ($selling_price == '') {$error_message.='selling price  is missing ,'; $error = 1;}
            if ($discount == '') {$error_message.='disount  is missing ,'; $error = 1;}
            if ($default_color == '') {$error_message.='cloor is missing ,'; $error = 1;}
            if ($wattage == '') {$error_message.='wattage  is missing ,'; $error = 1;}
            if ($air_delivery == '') {$error_message.='air delivery  is missing ,'; $error = 1;}
            if ($rpm == '') {$error_message.='rpm  is missing ,'; $error = 1;}
            if ($sweep == '') {$error_message.='sweep type  is missing ,'; $error = 1;}
            if ($service_value == '') {$error_message.='service value is missing ,'; $error = 1;}
            if ($phase == '') {$error_message.='phase  is missing ,'; $error = 1;}
            if ($frequency == '') {$error_message.='frequency  is missing ,'; $error = 1;}
            if ($no_of_blades == '') {$error_message.='no of blades  is missing ,'; $error = 1;}
            if ($body_type == '') {$error_message.='body type  is missing ,'; $error = 1;}
            if ($seller_rating == '') {$error_message.='seler rating  is missing ,'; $error = 1;}
            if ($bearings == '') {$error_message.='bearings  is missing ,'; $error = 1;}
            if ($winding == '') {$error_message.='winiding  is missing ,'; $error = 1;}
            if ($description == '') {$error_message.='descriptions  is missing ,'; $error = 1;}
            if ($warrenty == '') {$error_message.='warrenty  is missing ,'; $error = 1;}



            /* Validation Section ends here */
            if ($error == 1) {
                $response[CODE] = VALIDATION_CODE;
                $response[MESSAGE] = 'Validation';
                $response[DESCRIPTION] = rtrim($error_message, ',');
            } else {
                $color_string = implode(",", $color);
//                print_r($color_string).exit;
                //No errors we can proceeed
                $reqData = [
                    'product_title' => $product_title,
                    'fan_type' => $fan_type,
                    'mrp_price' => $mrp,
                    'selling_price' => $selling_price,
                    'discount' => $discount,
                    'remote_control' => $remote_check,
                    'default_color'=>$default_color,
                    'color' => $color_string,
                    'wattage' => $wattage,
                    'air_delivery' => $air_delivery,
                    'rpm' => $rpm,
                    'sweep' => $sweep,
                    'service_value' => $service_value,
                    'phase' => $phase,
                    'frequency' => $frequency,
                    'no_of_blades' => $no_of_blades,
                    'body_type' => $body_type,
                    'seller_rating' => $seller_rating,
                    'bearings' => $bearings,
                    'warrenty' => $warrenty,
                    'winding' => $winding,
                    'description' => $description,
                    'created_device' => $app,
                    'display_pic'=>PRODUCT_DUMMY_PIC,
                    'created_by' => $this->adminid,
                    'created_on' => DATE, 'flag_status' => 1,
                ];
                $addProduct = $this->product->createProduct($reqData);
                echo $addProduct;
                exit;
            }
        }
        echo json_encode($response);
    }
  
    
    public  function uploadProductImage()
    {
       
        $pic_product_id = $this->input->post('pic_product_id');
         $picture  = $_FILES['display_pic']['name'];
        $image_input_tempath=$_FILES['display_pic']['tmp_name'];
        $image_input_size=$_FILES['display_pic']['size'];
         $this->load->library('Project_image');
                    $params=[
                                    'filename'=>$picture,
                                    'filepath'=>$image_input_tempath,
                                    'uploadpath'=>'uploads/products/',
                                    'extension_name'=>'product_'.mt_rand(0000,9999).'_'.time(),
                                    'width'=>'720',
                                    'height'=>'960',
                           ];
                    $product_pic=$this->project_image->crop($params);
           $updatedata = ['display_pic'=>base_url().'uploads/products/'.$product_pic];  
           $updateWhere = ['product_id'=>$pic_product_id];
           $updateProductPic = $this->db->update('product_tbl',$updatedata,$updateWhere);
           $update = $this->db->affected_rows();
           
           $response[CODE]=($update)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($update)?'succes':'fail';
            $response[DESCRIPTION]=($update)?'Product image uploaded successfully':'Some thing went wrong.';
           echo json_encode($response);
    }
     public  function uploadProductsideImage()
    {
         
         $pic_product_id = $this->input->post('product_id');
         $picture  = $_FILES['side_pic']['name'];
        $image_input_tempath=$_FILES['side_pic']['tmp_name'];
        $image_input_size=$_FILES['side_pic']['size'];
         $this->load->library('Project_image');
                    $params=[
                                    'filename'=>$picture,
                                    'filepath'=>$image_input_tempath,
                                    'uploadpath'=>'uploads/products/',
                                    'extension_name'=>'product_'.mt_rand(0000,9999).'_'.time(),
                                    'width'=>'720',
                                    'height'=>'960',
                           ];
                    $product_pic=$this->project_image->crop($params);
           $updatedata = [
               'product_id'=>$pic_product_id,
               'title'=>base_url().'uploads/products/'.$product_pic,
               'created_on'=>DATE,
               'created_by'=>1,
                   ];
           $updateWhere = ['product_id'=>$pic_product_id];
           $updateProductPic = $this->db->insert('product_side_images',$updatedata,$updateWhere);
           $update = $this->db->affected_rows();
           
           $response[CODE]=($update)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($update)?'succes':'fail';
            $response[DESCRIPTION]=($update)?'Product side image uploaded successfully':'Some thing went wrong.';
           echo json_encode($response);
    }

    //Delete Product

    public function deleteproduct($productid)
    {
        $where=['product_id'=>$productid];
        $delete = $this->db->delete('product_tbl',$where);
        $deleteStatus = $this->db->affected_rows();
        redirect(ADMIN_LINK.'Product/allfans');
    }

    public function editfan($fanid) {
        isAdminLogin();
        $this->data['main_title'] = "Edit Fan";
        $this->data['form_details'] = [
            'form_id' => 'fantype_form',
            'title_placeholder' => 'Fan Type Title',
            'title_code_placeholder' => 'Fan Type Code',
            'redirection_link' => ADMIN_LINK . 'product/allfans',
        ];
        $this->data['fantype_details'] = $this->product->all_fanTypeList();
        $this->data['colors_list'] = $this->product->colorList();
        $this->data['product_details']=$this->product->productDetails($fanid);
        $this->load->view($this->product_folder . "fans/edit_fan", $this->data);
    }

    public function updateFan() {

        $response = array();
        $error_message = '';
        $error = 0;
        $req_input = file_get_contents('php://input');
//        print_r($req_input).exit;
        if (!isJson($req_input)) {
            $response[CODE] = VALIDATION_CODE;
            $response[MESSAGE] = 'Validation';
            $response[DESCRIPTION] = 'Input data should be in JSON format only';
        } else {
            $req_response = json_decode($req_input);
            $fanid = $req_response->productid;
            $fan_type = (isset($req_response->fan_type)) ? input_data($req_response->fan_type) : '';
            $product_title = (isset($req_response->product_title)) ? input_data($req_response->product_title) : '';
            $remote_check = (isset($req_response->remote_check)) ? input_data($req_response->remote_check) : '';
            $mrp = (isset($req_response->mrp)) ? input_data($req_response->mrp) : '';
            $selling_price = (isset($req_response->selling_price)) ? input_data($req_response->selling_price) : '';
            $discount = (isset($req_response->discount)) ? input_data($req_response->discount) : '';
            $color = (isset($req_response->color)) ? $req_response->color : '';
            if($color!='')
            {
                $color = (is_array($color)) ?$color : [$color];    
            }
            $default_color = (isset($req_response->default_color)) ? $req_response->default_color : '';
            $wattage = (isset($req_response->wattage)) ? input_data($req_response->wattage) : '';
            $air_delivery = (isset($req_response->air_delivery)) ? input_data($req_response->air_delivery) : '';
            $rpm = (isset($req_response->rpm)) ? input_data($req_response->rpm) : '';
            $sweep = (isset($req_response->sweep)) ? input_data($req_response->sweep) : '';
            $service_value = (isset($req_response->service_value)) ? input_data($req_response->service_value) : '';
            $phase = (isset($req_response->phase)) ? input_data($req_response->phase) : '';
            $frequency = (isset($req_response->frequency)) ? input_data($req_response->frequency) : '';
            $no_of_blades = (isset($req_response->no_of_blades)) ? input_data($req_response->no_of_blades) : '';
            $body_type = (isset($req_response->body_type)) ? input_data($req_response->body_type) : '';
            $seller_rating = (isset($req_response->seller_rating)) ? input_data($req_response->seller_rating) : '';
            $bearings = (isset($req_response->bearings)) ? input_data($req_response->bearings) : '';
            $warrenty = (isset($req_response->warrenty)) ? input_data($req_response->warrenty) : '';
            $winding = (isset($req_response->winding)) ? input_data($req_response->winding) : '';
            $description = (isset($req_response->description)) ? input_data($req_response->description) : '';
            $app = (isset($req_response->app)) ? input_data($req_response->app) : '';

            /* Validation Section */

            if ($fan_type == '') {$error_message.='fan type  is missing ,'; $error = 1;}
            if ($product_title == '') {$error_message.='product title  is missing ,'; $error = 1;}
            if ($remote_check == '') {$error_message.='remote check  is missing ,'; $error = 1;}
            if ($mrp == '') {$error_message.='mrp  is missing ,'; $error = 1;}
            if ($selling_price == '') {$error_message.='selling price  is missing ,'; $error = 1;}
            if ($discount == '') {$error_message.='disount  is missing ,'; $error = 1;}
            if ($default_color == '') {$error_message.='cloor is missing ,'; $error = 1;}
            if ($wattage == '') {$error_message.='wattage  is missing ,'; $error = 1;}
            if ($air_delivery == '') {$error_message.='air delivery  is missing ,'; $error = 1;}
            if ($rpm == '') {$error_message.='rpm  is missing ,'; $error = 1;}
            if ($sweep == '') {$error_message.='sweep type  is missing ,'; $error = 1;}
            if ($service_value == '') {$error_message.='service value is missing ,'; $error = 1;}
            if ($phase == '') {$error_message.='phase  is missing ,'; $error = 1;}
            if ($frequency == '') {$error_message.='frequency  is missing ,'; $error = 1;}
            if ($no_of_blades == '') {$error_message.='no of blades  is missing ,'; $error = 1;}
            if ($body_type == '') {$error_message.='body type  is missing ,'; $error = 1;}
            if ($seller_rating == '') {$error_message.='seler rating  is missing ,'; $error = 1;}
            if ($bearings == '') {$error_message.='bearings  is missing ,'; $error = 1;}
            if ($winding == '') {$error_message.='winiding  is missing ,'; $error = 1;}
            if ($description == '') {$error_message.='descriptions  is missing ,'; $error = 1;}
            if ($warrenty == '') {$error_message.='warrenty  is missing ,'; $error = 1;}



            /* Validation Section ends here */
            if ($error == 1) {
                $response[CODE] = VALIDATION_CODE;
                $response[MESSAGE] = 'Validation';
                $response[DESCRIPTION] = rtrim($error_message, ',');
            } else {
                $color_string='';
                if($color!='')
                {
                    $color_string = implode(",", $color);
                }
                
//                print_r($color_string).exit;
                //No errors we can proceeed
                $updateData = [
                    'product_title' => $product_title,
                    'fan_type' => $fan_type,
                    'mrp_price' => $mrp,
                    'selling_price' => $selling_price,
                    'discount' => $discount,
                    'remote_control' => $remote_check,
                    'default_color'=>$default_color,
                    'color' => $color_string,
                    'wattage' => $wattage,
                    'air_delivery' => $air_delivery,
                    'rpm' => $rpm,
                    'sweep' => $sweep,
                    'service_value' => $service_value,
                    'phase' => $phase,
                    'frequency' => $frequency,
                    'no_of_blades' => $no_of_blades,
                    'body_type' => $body_type,
                    'seller_rating' => $seller_rating,
                    'bearings' => $bearings,
                    'warrenty' => $warrenty,
                    'winding' => $winding,
                    'description' => $description,
                    'pic_updated_on'=>DATE,
                ];
                $updateCondition =['product_id'=>$fanid];
                $updateProduct = $this->db->update('product_tbl',$updateData,$updateCondition);
                $update = $this->db->affected_rows();
                $response[CODE]=($update > 0)?SUCCESS_CODE:FAIL_CODE;
                $response[MESSAGE]=($update > 0)?'success':'fail';
                $response[DESCRIPTION]=($update > 0)?'Product details updated successfully':'Unable to update or data not modified';
            }
        }
        echo json_encode($response);
    }
}
