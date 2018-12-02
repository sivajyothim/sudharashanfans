<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_controller {

    public $profile_folder, $data, $adminid;

    function __construct() {
        parent::__construct();
        $this->load->model(array('AdminModel' => 'admin',
        ));
        $this->profile_folder = 'admin_profile/';
        $this->adminId = $this->session->userdata(ADMIN_SESS_CODE . 'adminid');
        $this->data = array();
    }

    public function index() {
        isAdminLogin();
        $this->data['main_title'] = 'Dashboard';
        $this->data['client_details'] = json_encode([CODE => 204]);
        $this->data['project_details'] = json_encode([CODE => 204]);
        $this->load->view('dashboard', $this->data);
    }

    public function login() {
        $this->load->view($this->profile_folder . "login");
    }

    public function adminLogin() {
        $response = array();
        $inputData = file_get_contents('php://input');
        // print_r($inputData).exit;
        if (isJson($inputData)) {
            $req_data = json_decode($inputData);
            $error = 0;
            $errorMsg = '';
            $logMail = $req_data->username;
            $logPassword = $req_data->userpassword;
            if ($logMail == '') {
                $error = 1;
                $errorMsg.='Email is missing,';
            }
            if ($logPassword == '') {
                $error = 1;
                $errorMsg.='password is missing,';
            }
            if ($error == 1) {
                $response[CODE] = VALIDATION_CODE;
                $response[MESSAGE] = 'Validation';
                $response[DESCRIPTION] = rtrim($errorMsg, ',');
            } else {
                $logParams = array(
                    'username' => $logMail,
                    'user_password' => $logPassword,
                );
                $loginSendReq = $this->admin->adminLogin($logParams);
                $loginReq = json_decode($loginSendReq);
                if ($loginReq->code == SUCCESS_CODE) {
                    $loginResult = $loginReq->login_result;
                    $adminid = $loginResult->adminid;
                    $adminname = $loginResult->name;
                    $mobile = $loginResult->mobile;
                    $email = $loginResult->email;
                    $profile_status = $loginResult->profile_status;
                    if ($profile_status == 1) {
                        $sess_array = array(
                            ADMIN_SESS_CODE . 'adminid' => $adminid,
                            ADMIN_SESS_CODE . 'username' => $adminname,
                            ADMIN_SESS_CODE . 'mobile' => $mobile,
                            ADMIN_SESS_CODE . 'email' => $email,
                            ADMIN_SESS_CODE . 'userstatus' => $profile_status,
                        );
                        // print_r($sess_array).exit;
                        $this->session->set_userdata($sess_array);
                        $response[CODE] = SUCCESS_CODE;
                        $response[MESSAGE] = 'Success';
                        $response[DESCRIPTION] = 'Login success.Please wait...';
                        $response['redirect_url'] = ADMIN_LINK;
                    } else {
                        $response[CODE] = FAIL_CODE;
                        $response[MESSAGE] = 'Fail';
                        $response[DESCRIPTION] = 'Profile blocked.Please contact to admin for more details';
                    }
                }
                echo $loginSendReq;
                exit;
            }
        } else {
            $response[CODE] = VALIDATION_CODE;
            $response[MESSAGE] = 'Validation';
            $response[DESCRIPTION] = 'Input data should be in JSON format onlys';
        }
        echo json_encode($response);
    }

    public function logout() {
        isAdminLogin();
        $this->session->sess_destroy();
        redirect(ADMIN_LINK . 'login');
    }

    // Active or in-active module section code start 
    public function changeStatus() {
        $table = strtolower(trim($this->input->post('tablename')));
        $updateidlist = $this->input->post('upldatelist');
        $activity = $this->input->post('activity');
        if ($table != '' && $updateidlist != '' && ($activity == 0 || $activity == 1)) {
            $tablename = '';
            $setcolumns = '';
            $wherecondition = '';
            $updatevalue = '';
            switch ($table) {
                case 'vendors':
                    $tablename = 'vendor_info';
                    $setcolumns = 'profile_status';
                    $updatevalue = $activity;
                    $wherecondition = "vendor_id IN  (" . $updateidlist . ")";
                    break;
                case 'quickenquiries':
                    $tablename = 'quick_enquires';
                    $setcolumns = 'flag_status';
                    $updatevalue = $activity;
                    $wherecondition = "enquirey_id IN  (" . $updateidlist . ")";
                    break;
                case 'functionhall':
                    $tablename = 'venues_tbl';
                    $setcolumns = 'flag_status';
                    $updatevalue = $activity;
                    $wherecondition = "venue_id IN  (" . $updateidlist . ")";
                    break;
                
            }
            $update = $this->crud->commonUpdateStatus($tablename, $setcolumns, $updatevalue, $wherecondition);
            echo $update;
            exit;
        } else {
            $response[CODE] = VALIDATION_CODE;
            $response[MESSAGE] = 'Validations';
            $response[DESCRIPTION] = 'Please enter manditory feilds';
        }
        echo json_encode($response);
    }

    public function dataActivationStatus() {
        $response = array();
        $input_req = file_get_contents('php://input');
        $input_response = json_decode($input_req);
        $input_table = strtolower(trim($input_response->table));
        $input_status = trim($input_response->status);
        $input_data = $input_response->inputdata;
        $error = 0;
        $errror_message = '';
        if ($input_table == '') {
            $error = 1;
            $errror_message.='* Table name missing.';
        }
        if ($input_status > 5) {
            $error = 1;
            $errror_message.='* Status is missing.';
        }
        if ($input_data == '') {
            $error = 1;
            $errror_message.='* Input data is missing.';
        }
        
        if ($error == 0) {
            
            $tablename = $setcols = $condition =$updatevalue = '';
            switch ($input_table) 
            {
                case 'slider':/* slider */
                    $tablename = 'master_sliders';
                    $setcolumns = 'flag_status';
                    $updatevalue = $input_status;
                    $wherecondition = "slider_id IN  (" . $input_data . ")";
                    break;
                    case 'product':/* Product */
                    $tablename = 'product_tbl';
                    $setcolumns = 'flag_status';
                    $updatevalue = $input_status;
                    $wherecondition = "product_id IN  (" . $input_data . ")";
                    break;
                    case 'product_feature':/* Product */
                    $tablename = 'product_tbl';
                    $setcolumns = 'featured_status';
                    $updatevalue = $input_status;
                    $wherecondition = "product_id IN  (" . $input_data . ")";
                    break;
                    case 'order':/* order */
                    $tablename = 'orders_tbl';
                    $setcolumns = 'order_status';
                    $updatevalue = $input_status;
                    $wherecondition = "order_id IN  (" . $input_data . ")";
                    break;
                    
            }
            
            if ($tablename != '' && $setcolumns != '' && $wherecondition != '') 
            {
                $update = $this->crud->commonUpdateStatus($tablename, $setcolumns, $updatevalue, $wherecondition);
                echo $update;
                exit;
            } 
            else 
            {
                $response[CODE] = VALIDATION_CODE;
                $response[MESSAGE] = 'Validation error';
                $response[DESCRIPTION] = $errror_message;
            }
        } 
        else 
        {
            $response[CODE] = VALIDATION_CODE;
            $response[MESSAGE] = 'Validation error';
            $response[DESCRIPTION] = $errror_message;
        }
        echo json_encode($response);
    }

}
